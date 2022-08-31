<?php
class Database {

    private $host;
    private $name;
    private $user;
    private $pass;
    public $conn;

    function __construct()
    {
        $this->load_credentials();
        $this->init_DB();
    }

    private function init_DB() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);
    }

    private function load_credentials() {
        if(defined('DB_STATUS')) {
            if(DB_STATUS == 'STAGE') {
                $this->host = SDB_HOST;
                $this->name = SDB_NAME;
                $this->user = SDB_USER;
                $this->pass = SDB_PASS;
            }

            if(DB_STATUS == 'PROD') {
                $this->host = DB_HOST;
                $this->name = DB_NAME;
                $this->user = DB_USER;
                $this->pass = DB_PASS;
            }
        } else {
            $this->host = SDB_HOST;
            $this->name = SDB_NAME;
            $this->user = SDB_USER;
            $this->pass = SDB_PASS;
        }
    }

}