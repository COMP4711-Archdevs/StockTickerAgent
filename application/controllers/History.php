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
        $target = "";
        if(isset($_POST['stocks'])){
            // set to display content of selected stock
            $target = $_POST['stocks'];
        } else {
            // set to display most recently traded stock
//            $this->db->select('Name')->from('Stocks')->join('Transactions', "Stocks.Code = Transactions.Stock");
//            $this->db->order_by('DateTime');
//            $result = $this->db->get()->row();
//            foreach($result as $stock){
//                foreach($stock as $s){
//                    $target = $s;
//                    break;
//                }
//                break;
//            }
            $target = "BOND";
        }
        $this->data['title'] = "History";

        $results2 = $this->player->all();
        $this->data['players'] = $results2;

        $this->data['pagebody'] = 'history_page';
//        
//        $session_data = $this->session->userdata('logged_in');
//        $this->data['user'] = $session_data['name'];
//        $this->data['menubody'] = 'menucontent';

        if($this->session->userdata('logged_in')){
             $session_data = $this->session->userdata('logged_in');
             $this->data['user'] = $session_data['name'];
             $this->data['menubody'] = 'menucontent';
        }
        else{
            $this->data['menubody'] = 'menucontent_login';
        }
        
        $this->get_movements($target);
        $this->get_transactions($target);
        $this->create_dropdown($target);
        
        $this->render();
    }
    
    function display($stock){
        $target = $stock;
        $this->data['title'] = "History";

        $results2 = $this->player->all();
        $this->data['players'] = $results2;

        $this->data['pagebody'] = 'history_page';
        if($this->session->userdata('logged_in')){
             $session_data = $this->session->userdata('logged_in');
             $this->data['user'] = $session_data['name'];
             $this->data['menubody'] = 'menucontent';
        }
        else{
            $this->data['menubody'] = 'menucontent_login';
        }
        
        $this->get_movements($target);
        $this->get_transactions($target);
        $this->create_dropdown($target);
        
        $this->render();
    }
    
    function get_transactions($target){
        $transResult = $this->transaction->some("Stock", $target);
        $this->data['transactions'] = $transResult;
    }
    
    function get_movements($target){
        $movResult = $this->movement->some("Code", $target);
        $this->data['movements'] = $movResult;
    }
    
    function create_dropdown($target){
        // parse the list of stock names into an array
        $this->db->select('Code')->from('Stocks');
        $result = $this->db->get()->result_array();
        $stocks = array();
        foreach($result as $stock){
            foreach($stock as $s){
                $stocks[$s] = $s;
            }
        }
        // allow each option to pass a post value
        $option = "onchange='this.form.submit()'";
        // create a select field consisting of the stock names
        $this->data['historydropdown'] = form_dropdown("stocks", $stocks, $target, $option);
    }
    
}
