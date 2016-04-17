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
class Transaction extends MY_Model {
    // constructor
    function __construct() {
        parent::__construct('transactions','dateTime');
    }
    
    public function recordTransaction($player,$code,$quantity,$trans){
        $data = array(
            'DateTime' => getdate(),
            'Player' => $player,
            'Stock'  => $code,
            'Trans'  => $trans,
            'Quantity'  => $quantity,
        );
        $this->db->insert('transactions', $data);
    
        if($affected_rows <= 1){
            return true;
        }
        else{
            return false;
        }
    }
}