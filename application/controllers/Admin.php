<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin extends Application {

    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $results = $this->player->all();
        $this->data['players'] = $results;
        
        $this->data['title'] = "Stock Ticker Agent";
        $session_data = $this->session->userdata('logged_in');
        $this->data['user'] = $session_data['name'];
        $this->data['menubody'] = 'menucontent_admin';
        $this->data['pagebody'] = 'manage_users';
        $this->data['avatar'] = '/uploads/' . $session_data['name'] . '.gif';
        
        $this->render();
    }
}
