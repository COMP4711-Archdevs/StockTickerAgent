<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gameplay
 *
 * @author Clyde
 */
class Gameplay extends Application {
    //put your code here
    function __construct() {
        parent::__construct();
        // load models and helpers
        // ex. $this->load->helper('form');
    }
    
    function index(){
        
        $this->data['title'] = "History";

        // user must be logged in to play
        $session_data = $this->session->userdata('logged_in');
        
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
        
        // $this->do_stuff();
        
        $this->render();
    }
    
    // register to bsx server
    function register(){
        // check game state = ready or open
        if(1){
            // send post request to bsx/register
            $fields = array(
                "team" => "S10",
                "name" => "ArchDevs",
                "password" => "tuesday",
            );
            $response = $this->sendPost("serverUrl", $fields);
            // parse the response and do something with it ex. save token
            
            
        }
    }
    
    // buying a stock of quantity x
    function buy($stock, $quantity){
        // check if current player has enough funds to buy
        // ex. player fund > stock price * quantity
        if(1){
            // check game state = ready or open
            if(1){
                $fields = array(
                    "team" => "S10",
                    "token" => 123, // update these
                    "player" => 123,
                    "stock" => $stock,
                    "quantity" => $quantity,
                );
                $response = $this->sendPost("serverUrl"."buy", $fields);
                // parse the response and do something with it ex. save token

                return 1;
            }
        }
        return 0;
    }
    
    // selling x amount of a stock
    function sell($stock, $quantity){
        // check if player has enough of the stock
        if(1){
            // check game state = ready or open
            if(1){
                $fields = array(
                    "team" => 'S10',
                    "token" => 123, // update these
                    "player" => 123,
                    "stock" => $stock,
                    "quantity" => $quantity,
                    "certificate" => 123,
                );
                $response = $this->sendPost("serverUrl"."sell", $fields);
                // parse the response and do something with it

                return 1;
            }
        }
        return 0;
    }
    
    // send post requests - could move to model
    function sendPost($url, $fields){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec ($ch);
        curl_close ($ch);
        return $response;
    }
    
    
}
