<?php


class Portfolio extends Application {

    function __construct() {
        parent::__construct();
    }

    function detail($player){
    	
        if(isset($_POST['players'])){
            $player = $_POST['players'];
        }
        
    	$this->data['details'] = $this->transaction->some('player',$player);

    	$this->data['title'] = "Portfolio page";
        
    	$results2 = $this->player->all();
        $this->data['players'] = $results2;
        
        $this->data['pagebody'] = 'portfolio_page';
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
        $this->db->select('Player')->from('Players');
        $result = $this->db->get()->result_array();
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
    