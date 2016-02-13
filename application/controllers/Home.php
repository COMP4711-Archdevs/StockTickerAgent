<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author a00906732
 */
class Home extends Application {

    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $results = $this->stock->all();
        $results2 = $this->player->all();
        
        $this->data['title'] = "Stock Ticker Agent";
        
        $this->stocks();
        $this->players();
        
        $this->render();
    }
    
    function stocks(){
        $results = $this->stock->all();
        $this->data['stocks'] = $results;
        $this->data['stockcontent'] = '_stockpanel';
    }
    
    function players(){
        $results2 = $this->player->all();
        $this->data['players'] = $results2;
        $this->data['playercontent'] = '_playerpanel';
    }
    
}
