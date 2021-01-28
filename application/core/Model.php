<?php

namespace application\core;

use application\lib\Db;

abstract class Model {

	public $db;
	
	public function __construct() {
		$this->db = new Db;
	}

    public function newUser($userName) {
        $sql = "INSERT INTO users (user_name) VALUES ('$userName')";
        $this->db->query($sql);
        $id = $this->db->column("SELECT id FROM users WHERE user_name = '$userName'");
        return $id;
    }

    public function getUserId($userName) {
        $id = $this->db->column("SELECT id FROM users WHERE user_name = '$userName'");
        return $id;
    }

}