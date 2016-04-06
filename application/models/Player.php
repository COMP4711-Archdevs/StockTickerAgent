<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Player
 *
 * @author a00906732
 */
class Player extends MY_Model {
    // constructor
    function __construct() {
        parent::__construct('players','cash');
    }
    
    //insert into user table
    function insertUser($data)
    {
        return $this->db->insert('players', $data);
    }
    
    public function isDuplicate($name)
    {     
        $this->db->get_where('players', array('player' => $name), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;         
    }

}
