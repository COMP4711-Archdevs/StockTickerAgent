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

        //Check user login, display menubar
        if($this->session->userdata('logged_in')){
             $session_data = $this->session->userdata('logged_in');
             $this->data['user'] = $session_data['name'];
             $this->data['menubody'] = 'menucontent';
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