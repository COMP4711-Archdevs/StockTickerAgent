<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class History extends Application {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
    }
    
    function index(){
        $this->data['title'] = "History";
        $this->data['pagebody'] = 'history_page';
        $session_data = $this->session->userdata('logged_in');
        $this->data['user'] = $session_data['name'];
        $this->data['menubody'] = 'menucontent';
        $this->get_movements();
        $this->get_transactions();
        $this->create_dropdown();
        
        $this->render();
    }
    
    function get_transactions(){
        $transResult = $this->transaction->all();
        $this->data['transactions'] = $transResult;
    }
    
    function get_movements(){
        $movResult = $this->movement->all();
        $this->data['movements'] = $movResult;
    }
    
    function create_dropdown(){
        $this->db->select('Name')->from('Stocks');
        $result = $this->db->get()->result_array();
        $stocks = array();
        foreach($result as $stock){
            foreach($stock as $s){
                $stocks[$s] = $s;
            }
        }
        $this->data['historydropdown'] = form_dropdown("name", $stocks, null);
    }
    
}
