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
        $movResult = $this->movement->all();
        $transResult = $this->transaction->all();
        
        $this->data['title'] = "History";
        $this->data['pagebody'] = 'history_page';
        $this->data['transactions'] = $transResult;
        $this->data['movements'] = $movResult;
        $this->render();
    }
    
}
