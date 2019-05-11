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
     * @param  string  $query      takes an sql query as an argument
     * @param  string  $type       takes 'array' || 'object' as arguments
     * @param  boolean $only_once  should transform data only once (like on first() method)
     * @return array|string        data array or 'Invalid Parameters' string on failure
     */
    private function transform($query, $type, $only_once = false)
    {
        $arr = array();
        if ($type == 'array') {
            while ( $data = $query->fetch_array(MYSQLI_ASSOC) ) {
                $arr[] = $data;
                if ($only_once) {
                    break;
                }
            }
        }
        else if ($type == 'object') {
            while ( $data = $query->fetch_object() ) {
                $arr[] = $data;
                if ($only_once) {
                    break;
                }
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
     * @param  array  $options Ex: ['table' => 'test', 'conditions' => ['column' => 'value', 'column 2' => 'value 2', ...], ]
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
        $sql.= $this->setQueryConditions($options['conditions']);
        $this->db->query($sql);
    }

    /**
     * Delete data from a table
     *
     * @param  array  $options Ex: ['table' => 'test', 'conditions' => ['column' => 'value', 'column 2' => 'value 2', ...], ]
     */
    public function delete($options)
    {
        $sql = "DELETE FROM ".$options['table'];
        $sql.= $this->setQueryConditions($options['conditions']);
        $this->db->query($sql);
    }

    /**
     * Fetch data from a table
     * 
     * @param  string $table
     * @param  string $type  default = 'object'
     * @return array         array of data
     */
    public function fetchAll($table, $type = 'object')
    {
        $sql = "SELECT * FROM `$table`";
        $query = $this->db->query($sql);
        $arr = $this->transform($query, $type);
        return $arr;
    }

    /**
     * Fetch first row from a table
     * 
     * @param  array $data  Ex: ['table' => 'test', 'type' => 'array | object', 'conditions' => ['column' => 'value', 'column 2' => 'value 2', ...], ]
     * @return array|object data array or object
     */
    public function first($data)
    {
        $sql = "SELECT * FROM " . $this->setQueryConditions($data['conditions']);
        $query = $this->db->query($sql);
        return $this->transform($query, $data['type'], true);
    }

    /**
     * Any other queries go here
     */
}
