<?php


class Portfolio extends Application {

    function __construct() {
        parent::__construct();
    }

    function detail($player){
    	
    	$this->data['details'] = $this->transaction->some('player',$player);

    	$this->data['title'] = "Portfolio page";
        
        $this->data['pagebody'] = 'portfolio_page';
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
}
    