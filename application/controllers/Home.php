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
        $this->data['pagebody'] = 'home_page';

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
    
    function stocks(){
        $results = $this->stock->all();
        $this->data['stocks'] = $results;
        //$this->data['stockcontent'] = '_stockpanel';
    }
    
    function players(){
        $results2 = $this->player->all();
        $this->data['players'] = $results2;
        //$this->data['playercontent'] = '_playerpanel';
    }

    function login(){
        $username = $this->input->post('username');

        $sess_array = array(
            'id'    => 1,
            'name' => $username,
            'isloggedin'=> 1
        );
        $this->session->set_userdata('logged_in', $sess_array);
        redirect('home', 'refresh');
    }

    function logout(){
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
    }
    
}
