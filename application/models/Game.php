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
}
