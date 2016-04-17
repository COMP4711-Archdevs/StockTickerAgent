<?php


class Portfolio extends Application {

    function __construct() {
        parent::__construct();
    }

    /*
        Get data from transaction model and load pagebody with its data
    */
    function detail($player){
    	
        if(isset($_POST['players'])){
            $player = $_POST['players'];
        }
        
        //Get all data from transaction table base on player name
    	$this->data['details'] = $this->transaction->some('player',$player);

        //Set title
    	$this->data['title'] = "Portfolio";
        
        //Get list of player for dropdown menu
    	$results2 = $this->player->all();
        $this->data['players'] = $results2;

        //Load page body
        $this->data['pagebody'] = 'portfolio_page';

        //Check user login, display menubar
        if($this->session->userdata('logged_in')){
             $session_data = $this->session->userdata('logged_in');
             $this->data['user'] = $session_data['name'];
             $this->data['menubody'] = 'menucontent';
        }
        else{
            $this->data['menubody'] = 'menucontent_login';
        }
        
        $this->create_dropdown($player);
        $this->render();
    }
    
    function create_dropdown($target){
        // parse the list of stock names into an array
        //$this->db->select('Player')->from('players');
        $result = $this->player->all();
        $players = array();
        foreach($result as $player){
            foreach($player as $s){
                $players[$s] = $s;
            }
        }
        // allow each option to pass a post value
        $option = "onchange='this.form.submit()'";
        // create a select field consisting of the stock names
        $this->data['playerdropdown'] = form_dropdown("players", $players, $target, $option);
    }
}
    