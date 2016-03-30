<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author a00906732
 */
class User extends MY_Model {
    // constructor
    function __construct() {
        parent::__construct('user','id');
    }
    
    //insert into user table
    function insertUser($data)
    {
        return $this->db->insert('user', $data);
    }
}
