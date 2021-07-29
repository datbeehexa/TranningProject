<?php
class About {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAbout(){
        $this->db->query('SELECT * FROM abouts LIMIT 1');

        $row = $this->db->single();
        return $row;
    }
}