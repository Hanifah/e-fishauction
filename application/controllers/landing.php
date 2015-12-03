<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library("Ion_auth");
        $this->id = $this->ion_auth->get_user_id();
        $this->isAdmin = $this->ion_auth->is_admin($this->id);
        $this->login = false;
        if ($this->ion_auth->logged_in()){
        	$this->login = true;
        }
        $this->load->model('auction_model');
    }
	public function index()
	{
		$menu['isAdmin'] = $this->isAdmin;
		$menu['login'] = $this->login;
		$data['login'] = $this->login ? 1 : 0;
		$data['auction'] = $this->auction_model->get_closed_auction();
		$data['auctiontopfour'] = $this->auction_model->get_auction_top_four();
		$view = array(
		      	'content' => $this->load->view('landing/index', $data, TRUE),
		      	'menu' => $this->load->view('menu', $menu, TRUE)
	    		);
	    $this->load->view('master',$view);
	}

	public function contact_us()
	{
		$menu['isAdmin'] = $this->isAdmin;
		$menu['login'] = $this->login;
		$view = array(
		      	'content' => $this->load->view('landing/contact_us', '', TRUE),
		      	'menu' => $this->load->view('menu', $menu, TRUE)
	    		);
	    $this->load->view('master',$view);
	}

	public function live_auction()
	{
		$data['auction'] = $this->auction_model->get_open_auction();
		$menu['isAdmin'] = $this->isAdmin;
		$menu['login'] = $this->login;
		$data['login'] = $this->login ? 1 : 0;
		$view = array(
		      	'content' => $this->load->view('landing/live_auction', $data, TRUE),
		      	'menu' => $this->load->view('menu', $menu, TRUE)
	    		);
	    $this->load->view('master',$view);
	}

	public function tracking()
	{
		if ($this->input->post()) { 
			if ($this->input->post('awb_numbers') != '') {
			 	$data['search'] = $this->auction_model->tracking_search($this->input->post('awb_numbers'));  
	            $menu['isAdmin'] = $this->isAdmin;
				$menu['login'] = $this->login;
				$view = array(
					      	'content' => $this->load->view('landing/tracking_search', $data, TRUE),
					      	'menu' => $this->load->view('menu', $menu, TRUE)
				    		);
				$this->load->view('master',$view);    
			 } 
        }
		$menu['isAdmin'] = $this->isAdmin;
		$menu['login'] = $this->login;
		$view = array(
			      	'content' => $this->load->view('landing/tracking', '', TRUE),
			      	'menu' => $this->load->view('menu', $menu, TRUE)
		    		);
		$this->load->view('master',$view);
	}
}
