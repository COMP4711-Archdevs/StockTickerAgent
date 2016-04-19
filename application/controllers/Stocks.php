<?php

class Stocks extends Application {

    function __construct() {
        parent::__construct();
    }
    
    function index(){
        
        $this->data['title'] = "Stock Ticker Agent";
        
        // Get stock data
        $this->stocks();

        $this->data['pagebody'] = 'stock_page';

        $session_data = $this->session->userdata('logged_in');
 
        //Check user login, display menubar
        if($this->session->userdata('logged_in')){
            if($session_data['role'] == 'admin'){
                $session_data = $this->session->userdata('logged_in');
                $this->data['user'] = $session_data['name'];
                $this->data['menubody'] = 'menucontent_admin';
            }else{
                $session_data = $this->session->userdata('logged_in');
                $this->data['user'] = $session_data['name'];
                $this->data['menubody'] = 'menucontent';
            } 
        }
        else{
            $this->data['menubody'] = 'menucontent_login';
        }
        $this->render();
    }

     // Get data from stock model
    function stocks(){
        $results = $this->stock->getAllStocksFromServer();
        $this->data['stocks'] = $results;
    }

}