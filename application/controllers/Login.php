<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author a00906732
 */
class Login extends Application {
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->database();
    }
    
    function index(){
       $this->data['title'] = "Stock Ticker Agent";
       $this->data['pagebody'] = 'login_view';
       $this->data['menubody'] = 'menucontent_login';
       $this->render();
    }
    
     function login()
    {
      //This method will have the credentials validation

      $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

      if($this->form_validation->run() == FALSE)
      {
        //Field validation failed.  User redirected to login page
        $this->data['title'] = "Stock Ticker Agent";
        $this->data['pagebody'] = 'login_view';
        $this->data['menubody'] = 'menucontent_login';
        $this->render();
      }
      else
      {
          redirect('home', 'refresh');
      }

    }
 
 function check_database($password)
    {
      //Field validation succeeded.  Validate against database
      $username = $this->input->post('username');

      //query the database
      $result = $this->player->login($username, $password);

      if($result)
      {
        $sess_array = array();
        foreach($result as $row)
        {
          $sess_array = array(
            'id'    => 1,
            'name' => $username,
            'isloggedin'=> 1
        );
          $this->session->set_userdata('logged_in', $sess_array);
        }
        return TRUE;
      }
      else
      {
        //$this->data['errormsg'] = 'Invalid username or password';
        //$this->form_validation->set_message('check_database', 'Invalid username or password');
        return false;
      }
    }
}
