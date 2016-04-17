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
        
        $this->data['title'] = "Game Play";

        $this->data['pagebody'] = 'game_play';

        // user must be logged in to play
        $session_data = $this->session->userdata('logged_in');
        
        if($this->session->userdata('logged_in')){
            if($session_data['role'] == 'admin'){
                $session_data = $this->session->userdata('logged_in');
                $this->data['user'] = $session_data['name'];
                $this->data['menubody'] = 'menucontent_admin';
                 $this->data['avatar'] = '/uploads/' . $session_data['name'] . '.gif';
            }else{
                $session_data = $this->session->userdata('logged_in');
                $this->data['user'] = $session_data['name'];
                $this->data['info'] = $this->player->getUser($session_data['name']);

                $this->data['menubody'] = 'menucontent';
                  $this->data['avatar'] = '/uploads/' . $session_data['name'] . '.gif'; 
            }
        }
        else{
            $this->data['menubody'] = 'menucontent_login';
        }
        
        $this->getStatus();
        $this->getHoldingStock($session_data['name']);
        $this->data['stocks'] =  $this->stock->getAllStocksFromServer();
        $this->data['recentMove'] = $this->stock->getRecentMovements();

        //this is example to get quantity of 1 stock belong to 1 player
        //$quantity = $this->game->getStockQuantityBelongToPlayer($session_data['name'],'CCC');
        
        //update quantity stock belong
        //$this->game->updateStockQuantityBelongToPlayer($session_data['name'],'CCC',-10);
        
        //get fund
        //$fund =  $this->player->getFund($session_data['name']);

        //update fund
        //$this->player->updateFund($session_data['name'],-1000);

        $this->render();
    }

    public function getStatus() {
        $xml = simplexml_load_file('http://bsx.jlparry.com/status');
        $this->data['round']= $xml->round;
        $this->data['state'] = $xml->state;
        $this->data['countdown'] = $xml->countdown;
        if($xml->state == 0) {
            $this->data['message'] =  "Not running";
        } elseif($xml->state == 1) {
            $this->data['message'] =  "Setting Up";
        } elseif($xml->state == 2) {
            $this->data['message'] = "Ready";
        } elseif($xml->state == 3) {
            $this->data['message'] = "Active";
        } else {
            $this->data['message'] = "Round Over";
        }
    }

    public function getHoldingStock($name){
        $this->data['holdings'] = $this->game->some('username',$name);
    }
    
    // register to bsx server
    function register(){
        // check game state = ready or open
        $status = $this->getStatus();
        if($status->state == 2 || $status->state == 3){
            // send post request to bsx/register
            $fields = array(
                "team" => "S10",
                "name" => "ArchDevs",
                "password" => "tuesday",
            );
            $response = $this->sendPost("http://bsx.jlparry.com", $fields);
            // save the token returned in response !!!
            
            
        }
    }
    
    // buying a stock of quantity x
    function buy($stock, $quantity){
        // check if current player has enough funds to buy
        $fund =  $this->player->getFund($session_data['name']);
        $cost = $this->game->getStockCost($stock); // get cost of single stock
        $cost *= $quantity;
        if($fund > $cost){
            // check game state = ready or open
            $status = $this->getStatus();
            if($status->state == 2 || $status->state == 3){
                $fields = array(
                    "team" => "S10",
                    "token" => 123, // update these !!!
                    "player" => 123,
                    "stock" => $stock,
                    "quantity" => $quantity,
                );
                $response = $this->sendPost("http://bsx.jlparry.com/buy", $fields);
                // subtract cost from player's fund and update !!!
                $this->player->updateFund($session_data['name'],-$cost);
                // add stock to player
                $this->game->updateStockQuantityBelongToPlayer($session_data['name'],$stock,$quantity);
                // save transaction into db !!!

                return 1;
            }
        }
        return 0;
    }
    
    // selling x amount of a stock
    function sell($stock, $quantity){
        // check if player has enough of the stock
        $holding = $this->game->getStockQuantityBelongToPlayer($session_data['name'],$stock);
        if($holding >= $quantity){
            // check game state = ready or open
            $status = $this->getStatus();
            if($status->state == 2 || $status->state == 3){
                $fields = array(
                    "team" => 'S10',
                    "token" => 123, // update these
                    "player" => 123,
                    "stock" => $stock,
                    "quantity" => $quantity,
                    "certificate" => 123,
                );
                $response = $this->sendPost("http://bsx.jlparry.com/sell", $fields);
                // add sold amount to player's fund
                $price = $this->game->getStockCost($stock); // get cost of single stock
                $price *= $quantity;
                $this->player->updateFund($session_data['name'],$price);
                // update user holding for this stock
                $this->game->updateStockQuantityBelongToPlayer($session_data['name'],$stock,-$quantity);
                // save transaction into db !!!
                
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
