<?php 

if ( ! function_exists('IP'))
{
    /**
     * Return IP informations
     *
     * @return string IP
     */
    function IP()
    {
        $HTTP_CLIENT_IP       = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : ':/:' ;       
        $HTTP_X_FORWARDED_FOR = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : ':/:';
        $REMOTE_ADDR          = $_SERVER['REMOTE_ADDR'];
        $string               = $HTTP_CLIENT_IP.' - '.$HTTP_X_FORWARDED_FOR.' - '.$REMOTE_ADDR;
        return $string;
    }
}

if ( ! function_exists('generate_random_alphanumeric_string'))
{
    /**
     * Generate a random alphanumeric string
     * 
     * @param  integer $length alphanumeric string length
     * @return string          alphanumeric string
     */
    function generate_random_alphanumeric_string($length = 6)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstivwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if( ! function_exists('_string_normalization'))
{
    /**
     * Normalize a string (remove weird characters)
     * 
     * @param  string $string    string to normalize
     * @param  string $delimiter delimiter
     * @return string            normalized string
     */
    function _string_normalization( $string, $delimiter )
    {
        $unwanted = array(
            'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y','Ğ'=>'G', 'İ'=>'I', 'Ş'=>'S', 'ğ'=>'g', 'ı'=>'i', 'ş'=>'s',
            'ü'=>'u',  'ă'=>'a', 'Ă'=>'A', 'ș'=>'s', 'Ș'=>'S', 'ț'=>'t', 'Ț'=>'T');
        $string = strtr( $string, $unwanted );
        $string = preg_replace('/[^A-Za-z0-9\-]/', $delimiter, $string); 
        return $string;
    }
}

if( ! function_exists('argon'))
{
    /**
     * Encrypt passwords using ARGON2I algorithm
     * 
     * @param  string $string password or string to hash
     * @return string         hash
     */
    function argon($string)
    {
        $options = ['memory_cost' => MEMORY_COST, 'time_cost' => TIME_COST, 'threads' => PARALLELISM_FACTOR];
        $encrypt = password_hash($string, PASSWORD_ARGON2I, $options);
        return $encrypt;
    }
}

if( ! function_exists('encrypt'))
{
    /**
     * Encrypt passwords using default algorithm
     * 
     * @param  string $string password or string to hash
     * @return string         hash
     */
    function encrypt($string)
    {
        $encrypt = password_hash($string, PASSWORD_DEFAULT);
        return $encrypt;
    }
}

if( ! function_exists('redirect'))
{
    /**
     * Redirect to a url
     * 
     * @param  string $url url string
     */
    function redirect($url)
    {
        header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        header('Pragma: no-cache');
        header('Location: ' . $url);
        exit;
    }
}

if( ! function_exists('create_cookie'))
{
    /**
     * Create a cookie
     * 
     * @param  array $arr cookie array as ['_name' => ..., '_value' => ..., '_duration' => ...]
     * @return boolean    true if cookie created, false if not
     */
    function create_cookie($arr)
    {
        return setcookie($arr['_name'], $arr['_value'], $arr['_duration'], "/");
    }
}

if( ! function_exists('destroy_cookie'))
{
    /**
     * Delete a cookie
     * 
     * @param  string $cookie_name cookie name
     * @return boolean             true if cookie deleted, false if not
     */
    function destroy_cookie($cookie_name)
    {
        return setcookie($cookie_name, '', time() - 3600, "/");
    }
}
