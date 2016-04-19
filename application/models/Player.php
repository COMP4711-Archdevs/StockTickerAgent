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
    
    function deleteUser($name){
        $this->db->delete('players', array('Player' => $name));
    }
    
    function getUser($name){
        $query = $this->db->get_where('players', array('Player' => $name));
        return $query->result();
    }

    function updateUser($player, $data){
        if($this->db->update('players', $data, array('Player' => $player))){
            return true;
        }else{
            return false;
        }
    }
    
    function login($username, $password)
    {
      $this->db->select('player, password, role');
      $this->db->from('players');
      $this->db->where('player', $username);
      $this->db->where('password', MD5($password));
      $this->db->limit(1);

      $query = $this -> db -> get();

      if($query -> num_rows() == 1)
      {
        return $query->result();
      }
      else
      {
        return false;
      }
    }

    public function getFund($name){
        $sql = "SELECT Cash FROM players WHERE Player= '{$name}' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();

        return ($result->num_rows() === 1 && $row->Cash) ? $row->Cash : false;
    }

    public function updateFund($name,$money){
      $current = $this->getFund($name);
      $temp = $current + $money;
      $sql = "UPDATE players SET Cash = '{$temp}' WHERE Player = '{$name}' LIMIT 1";
      $result = $this->db->query($sql);
      $affected_rows = $this->db->affected_rows();
      
      if($affected_rows <= 1){
        return true;
      }
      else{
        return false;
      }
    }
}
