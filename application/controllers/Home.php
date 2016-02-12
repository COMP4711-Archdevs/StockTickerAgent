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
        
        /*$data = array(
            'title'  => "Home Page",
            'stocks' => $results,
            'players' => $results2
        );
        */
        //$this->load->library('template');
        //$this->template->load('default', 'display', $data);
        //$this->parser->parse('_template', $data);
        $this->data['title'] = "Home page";
        $this->data['pagebody'] = 'home_page';
        $this->data['stocks'] = $results;
        $this->data['players'] = $results2;
        $this->render();
    }
    
}
