<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Register
 *
 * @author a00906732
 */
class Register extends Application{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url','security'));
        $this->load->library('form_validation', 'session');
        $this->load->database();
    }
    
    function index()
    {
       //$this->load->view('user_registration_view');
       $this->data['title'] = "Stock Ticker Agent";
       $this->data['pagebody'] = 'user_registration_view';
       $this->data['menubody'] = 'menucontent_login';
       $this->render();
    }

    function register()
    {
        //set validation rules
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]|md5');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // fails
            $this->data['title'] = "Register";
            $this->data['pagebody'] = 'user_registration_view';
            $this->data['menubody'] = 'menucontent_login';
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
            $this->render();
        }
        else
        {
            //insert the user registration details into database
            $data = array(
                'Player' => $this->input->post('fname'),
                'password' => $this->input->post('password'),
                'Cash'  => 1000,
            );
            
            // insert form data into database
            if ($this->player->insertUser($data))
            {
                // successfully registered
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered!</div>');
                redirect('/Register');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('/Register');
            }
        }
    }
}

?>
