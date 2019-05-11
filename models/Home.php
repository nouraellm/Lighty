<?php

namespace Models;

use \App\Model as Model;

/**
 * Home Class 
 */
class Home extends Model
{
    /**
     * Constructor
     *
     * @return $this
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Transform query results to data array
     * 
     * @param  string $query takes an sql query as an argument
     * @param  string $type  takes ARRAY_CON || OBJECT_CON as arguments
     * @return array|string  data array or 'Invalid Parameters' string on failure
     */
    private function transform($query, $type)
    {
        $arr = array();
        if ($type == 'ARRAY_CON') {
            while ( $data = $query->fetch_array(MYSQLI_ASSOC) ) {
                $arr[] = $data;
            }
        }
        else if ($type == 'OBJECT_CON') {
            while ( $data = $query->fetch_object() ) {
                $arr[] = $data;
            }
        }
        else {
            $arr = 'Invalid Parameters'; // TODO: throw an exception instead of returning a string
        }
        return $arr;
    }

    /**
     * Insert data into a table
     * 
     * @param  string  $table
     * @param  array   $data
     * @return integer inserted row id
     */
    public function insert($table, $data)
    {
        foreach( array_keys($data) as $key )
        {
            $fields[] = "`$key`";
            $values[] = "'" .$data[$key] . "'";
        }
        $fields = implode(",", $fields);
        $values = implode(",", $values);
        $sql = "INSERT INTO `$table`($fields) VALUES ($values)";
        $this->db->set_charset("utf8"); // UTF8 settings
        $this->db->query($sql);
        return $this->db->insert_id;
    }

    /**
     * Update data into a table
     * 
     * @param  array  $options Ex: ['table' => 'test', 'column' => 'id', 'value' => 1]
     * @param  array  $data    Ex: ['name' = > 'Lighty Framework v.1.0']
     * @param  string $cookie  cookie constant, default = 'CN'
     */
    public function update($options, $data, $cookie = 'CN')
    {
        $sql = "UPDATE ".$options['table']." SET ";
        foreach($data as $key => $value)
        {
            $sql .= $key."='". $value."', ";
        }
        $sql = rtrim($sql, ", ");
        $sql.= " WHERE `".$options['column']."` = '".$options['value']."' ";
        $this->db->query($sql);
    }

    /**
     * Delete data from a table
     *
     * @param  array  $options Ex: ['table' => 'test', 'column' => 'id', 'value' => 1]
     */
    public function delete($options)
    {
        $sql = "DELETE FROM ".$options['table'];
        $sql.= " WHERE `".$options['column']."` = '".$options['value']."' ";
        $this->db->query($sql);
    }

    /**
     * Fetch data from a table
     * 
     * @param  string $table
     * @param  string $type  default = 'OBJECT_CON'
     * @return array         array of data
     */
    public function fetchAll($table, $type = 'OBJECT_CON')
    {
        $sql = "SELECT * FROM `$table`";
        $query = $this->db->query($sql);
        $arr = $this->transform($query, $type);
        return $arr;
    }

    /**
     * Fetch first row from a table
     * 
     * @param  array $data  Ex: ['table' => 'test', 'type' => 'type | object', 'conditions' => ['column' => 'value', 'column 1' => 'value 2', ...], ]
     * @return object data object
     */
    public function first($data)
    {
        $sql = "SELECT * FROM " . $this->buildQuery($data['conditions']);
        $query = $this->db->query($sql);
        if ($data['type'] == 'array') {
            $data_obj = $query->fetch_array(MYSQLI_ASSOC);
        }
        else if ($data['type'] == 'object') {
            $data_obj = $query->fetch_object();
        }
        else {
            $data_obj = 'Invalid parameters!';
        }
        // TODO: this part of code seems repeated, need to find a workaround
        return $data_obj;
    }

    /**
     * Any other queries go here
     */
}
