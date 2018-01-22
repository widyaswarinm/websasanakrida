<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  
   function __construct()

    {
        parent::__construct();
		$this->load->model('Dashboard_model');
    }
  
 public function index()
 {	
	if($this->session->userdata('islogin')) {
		$data['_view'] = 'layouts/home';
		$this->load->view('layouts/main',$data);
	} else {
            $this->load->view('layouts/login');
    }
 }
 
 function login_proccess()
 {   
	$this->load->library('form_validation');

	$username = $this->input->post('username');
	$password = $this->input->post('password');
  

	$login = $this->Dashboard_model->login($username);

	if($this->encrypt->decode($login['password']) == $password) {

		$this->session->set_userdata('username',$username); // set session username
		
		$this->session->set_userdata('islogin', true); 
		
		redirect(site_url('dashboard'));
				   
	} else {
		//login gagal
		$this->session->set_flashdata('message','Username atau password salah');
		redirect('dashboard');
	}

} 

public function logout(){
	$this->session->sess_destroy();
	redirect('dashboard');
}	
}