<?php


class Game extends MY_Model {
    // constructor
    public function __construct() {
        parent::__construct('holdingstock','username');
    }

    public function getStockQuantityBelongToPlayer($player,$code){
    	$sql = "SELECT quantity FROM holdingstock WHERE username = '{$player}' AND stockcode = '{$code}' LIMIT 1";
	$result = $this->db->query($sql);
	$row = $result->row();

	return ($result->num_rows() === 1 && $row->quantity) ? $row->quantity : false;
    }
    
    public function getStockCost($code){
        $sql = "SELECT value FROM stocks WHERE code = '{$code}' LIMIT 1";
        $result = $this->db->query($sql);
        $row = $result->row();
        
        return ($result->num_rows() === 1 && $row->value) ? $row->value : false;
    }

    public function updateStockQuantityBelongToPlayer($player,$code,$quantity){
        $current = $this->getStockQuantityBelongToPlayer($player,$code);
        $temp = $current + $quantity;
        $sql = "UPDATE holdingstock SET quantity = '{$temp}' WHERE username = '{$player}' AND stockcode = '{$code}' LIMIT 1";
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
