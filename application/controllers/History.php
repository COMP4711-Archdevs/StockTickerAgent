<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class History extends Application {

    function __construct() {
        parent::__construct();
    }
    
    function index(){
        
        
        
        $this->data['title'] = "History";
        $this->data['pagebody'] = 'history_page';
        $this->getMovements();
        $this->getTransactions();
        
        $this->render();
    }
    
    function getTransactions(){
        $transResult = $this->transaction->all();
        $this->data['transactions'] = $transResult;
    }
    
    function getMovements(){
        $movResult = $this->movement->all();
        $this->data['movements'] = $movResult;
    }
    
}
