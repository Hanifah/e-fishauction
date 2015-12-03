<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auction extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library("Ion_auth");
        $this->id = $this->ion_auth->get_user_id();
        $this->isAdmin = $this->ion_auth->is_admin($this->id);
        $this->login = false;
        if($this->ion_auth->logged_in())
        {
            $this->login = true;
        }
        $this->load->model('auction_model');
        $this->load->helper('date');
    }

	public function detail($id)
	{
		if($this->ion_auth->logged_in())
        {
			$data['detail'] = $this->auction_model->get_auction_by_id($id);
			$data['viewmodel'] = $this->auction_model->bid_model($id, $this->id);
			$data['winnername'] = '';
			$data['dealamount'] = '';
			$winnerId = $this->auction_model->get_auction_by_id($id)->winner;
			if (strlen($winnerId) > 0) {
				$data['winnername'] = $this->auction_model->get_username($winnerId);
				$data['dealamount'] = $this->auction_model->get_auction_by_id($id)->deal_amount;
			}
			$menu['isAdmin'] = $this->isAdmin;
			$menu['login'] = $this->login;
			$view = array(
			      	'content' => $this->load->view('auction/detail', $data, TRUE),
			      	'menu' => $this->load->view('menu', $menu, TRUE)
		    		);
		    $this->load->view('master',$view);
		}
		else{
			redirect('auth/login');
		}
	}

	public function bid()
	{
		if($this->ion_auth->logged_in())
        {
			if ($this->input->post('amount') == '' ||  $this->input->post('amount') == 'NaN') {
				redirect('auction/detail/'.$this->input->post('auction_id'));
			}
			else{
				$currentprice = $this->auction_model->check_current_price($this->input->post('auction_id'));
				if ($currentprice > $this->input->post('amount')) {
					$data['status'] = 'Price must be higher.';
				}
				else{
					$bid = $this->auction_model->bid_now();
					$data['status'] = 'Success.';
					if ($bid == 'closed') {
						
						$data['status'] = 'Sorry, auction is closed.';
						
					}
					else if($bid == 'next'){
						$data['status'] = 'Sorry, auction unopened.';
					}
				}
				
				$menu['isAdmin'] = $this->isAdmin;
				$menu['login'] = $this->login;
				$view = array(
					      	'content' => $this->load->view('auction/auction_notif', $data, TRUE),
					      	'menu' => $this->load->view('menu', $menu, TRUE)
				    		);
				$this->load->view('master',$view);
			}
		}
		else{
			redirect('auth/login');
		}
	}

}
