<?php
class mysql {
    private $conn;
    private $server = 'localhost';
    private $user = '';
    private $password = '';
    private $database = '';
    public function connect() {
        $this->server = get_config('db_host');
        $this->user = get_config('db_username');
        $this->password = get_config('db_password');
        $this->database = get_config('db_database');

        if(isset($this->conn)) return $this->conn;
        $this->conn = @mysql_connect($this->server,$this->user,$this->password, true) or die ("Unable connect to mysql.");
        @mysql_select_db($this->database, $this->conn) or die("Unable to select your default database name.");
    }
    public function disconnect(){
        if(isset($this->conn)) @mysql_close($this->conn);
    }
    public function query($sql){
        $result = @mysql_query($sql, $this->conn);
        if (!$result) die (mysql_error());
        return $result;
    }
    public function results($query, $type = 'object'){
        $result = $this->query($query);
        $return = array();
        while ($row = @mysql_fetch_object($result)) {
            if($type == 'array')
                $return[] = (array) $row;
            else
                $return[] = $row;
        }
        @mysql_free_result($result);
        return @$return;
    }
}//end class