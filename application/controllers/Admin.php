<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin extends Application {

    function __construct() {
        parent::__construct();
        $this->load->model('Player');
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
    
    function edit($player){
        $result = $this->Player->getUser($player);
        
        foreach($result as $row){
            $this->data['player'] = $row->Player;
            $this->data['cash'] = $row->Cash;
            $this->data['role'] = $row->role;
        }
        
        $this->data['title'] = "Stock Ticker Agent";
        $session_data = $this->session->userdata('logged_in');
        $this->data['user'] = $session_data['name'];
        $this->data['menubody'] = 'menucontent_admin';
        $this->data['pagebody'] = 'edit_user';
        $this->data['avatar'] = '/uploads/' . $session_data['name'] . '.gif';
        
        $this->render();
    }
    
    function delete($player){
        $this->Player->deleteUser($player);
        redirect('/Admin');
    }
    
    function saveUser($player){
        //update db
        $username = $this->input->post('player');
        $cash = $this->input->post('cash');
        $role = $this->input->post('role');
        
        $data = array(
            'Player' => $username,
            'Cash' => $cash,
            'role' => $role
        );
        
       //redirect to index
        if($this->Player->updateUser($player, $data)){
            //change name of picture
            rename(FCPATH . 'uploads/' . $player . '.gif', FCPATH . 'uploads/' . $username . '.gif');
            redirect('/Admin');
        }else{
            redirect('/Admin/edit/' . $player);
        }
    }
}
