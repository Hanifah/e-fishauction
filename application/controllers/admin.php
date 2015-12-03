<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('auction_model');
        $this->load->library("Ion_auth");
        $this->id = $this->ion_auth->get_user_id();
        $this->isAdmin = $this->ion_auth->is_admin($this->id);
        $this->load->library('pagination');
        $this->login = false;
        if(!$this->ion_auth->logged_in())
        {
            redirect("auth/login");  
        }
        else{
        	$this->login = true;
        	if (!$this->isAdmin) {
        		redirect("error/not_authorized");  
        	}
        }
    }
	public function index()
	{
        $limit = 10; 
        $auction = $this->auction_model->get_all_auction();
             //pagination configuration
        $config = array();
        $config["base_url"] = base_url() . "index.php/admin/index";
        $total_row = count($auction);
        $config["total_rows"] = $total_row;
        $config["per_page"] = $limit;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '&nbsp;<a class="current">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);
        if($this->uri->segment(3)){
            $page = ($this->uri->segment(3)) ;
        }
        else{
        $page = 1;
        }
        $page = ($page-1) * $limit;
        $data["auctions"] = $this->auction_model->get_auction_page($config["per_page"], $page);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );
            //get the posts data
		$menu['isAdmin'] = $this->isAdmin;
		$menu['login'] = $this->login;
		$view = array(
		      	'content' => $this->load->view('admin/index',$data, TRUE),
		      	'menu' => $this->load->view('menu', $menu, TRUE)
	    		);
	    $this->load->view('master',$view);
	}

	public function post_auction()
	{
		$this->form_validation->set_rules('fish_name', 'Fish Name', 'required');
        $this->form_validation->set_rules('qty', 'Qty', 'required|decimal');
        $this->form_validation->set_rules('amount', 'Price', 'required|decimal');
        $this->form_validation->set_rules('open_bid', 'Open Bid Date', 'required');
        $this->form_validation->set_rules('close_bid', 'Closed Bid Date', 'required');
        $this->form_validation->set_rules('descriptions', 'Description', 'required');
        $this->form_validation->set_rules('file_name', 'Image File', 'required');
        $data['error_upload'] = '';
        if ($this->input->post()) {
            if ($this->form_validation->run() == TRUE) {
				$insert = $this->auction_model->insert_auction();
				if ($insert != 'success')
				{
					$data['error_upload'] = $insert;
				}
				else
				{
					redirect('admin/index');
                    return false;
				}   
            }
        }

		$data['viewmodel'] = $this->auction_model->create_auction_model();
		$menu['isAdmin'] = $this->isAdmin;
		$menu['login'] = $this->login;
		$view = array(
		      	'content' => $this->load->view('admin/post_auction', $data, TRUE),
		      	'menu' => $this->load->view('menu', $menu, TRUE)
	    		);
	    $this->load->view('master',$view);
	}

	public function edit_auction($id)
	{
		$this->form_validation->set_rules('fish_name', 'Fish Name', 'required');
        $this->form_validation->set_rules('qty', 'Qty', 'required|decimal');
        $this->form_validation->set_rules('amount', 'Price', 'required|decimal');
        $this->form_validation->set_rules('open_bid', 'Open Bid Date', 'required');
        $this->form_validation->set_rules('close_bid', 'Closed Bid Date', 'required');
        $this->form_validation->set_rules('descriptions', 'Description', 'required');
        $this->form_validation->set_rules('file_name', 'Image File', 'required');
        $data['error_upload'] = '';
        if ($this->input->post()) {
            if ($this->form_validation->run() == TRUE) {
				$insert = $this->auction_model->save_auction($id);
				if ($insert != 'success')
				{
					$data['error_upload'] = $insert;
				}
				else
				{
					redirect('admin/index');
                    return false;
				}   
            }
        }
        $data['auction_id'] = $id;
		$data['viewmodel'] = $this->auction_model->edit_auction_model($id);
		$menu['isAdmin'] = $this->isAdmin;
		$menu['login'] = $this->login;
		$view = array(
		      	'content' => $this->load->view('admin/edit_auction', $data, TRUE),
		      	'menu' => $this->load->view('menu', $menu, TRUE)
	    		);
	    $this->load->view('master',$view);
	}

    public function delete_auction($id)
    {
        $filename = $this->auction_model->get_filename($id);
        if (!empty($filename)) {
                unlink('./uploads/'.$filename);
                $this->auction_model->delete_auction($id);
            }
        redirect('admin/index');
    }

    public function payment()
       {
            $limit = 10; 
            $auction = $this->auction_model->get_for_check_payment();
                 //pagination configuration
            $config = array();
            $config["base_url"] = base_url() . "index.php/admin/payment";
            $total_row = count($auction);
            $config["total_rows"] = $total_row;
            $config["per_page"] = $limit;
            $config['use_page_numbers'] = TRUE;
            $config['num_links'] = $total_row;
            $config['cur_tag_open'] = '&nbsp;<a class="current">';
            $config['cur_tag_close'] = '</a>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Previous';

            $this->pagination->initialize($config);
            if($this->uri->segment(3)){
            $page = ($this->uri->segment(3)) ;
            }
            else{
            $page = 1;
            }
            $page = ($page-1) * $limit;
            $data["auctions"] = $this->auction_model->get_for_check_payment_page($config["per_page"], $page);
            $str_links = $this->pagination->create_links();
            $data["links"] = explode('&nbsp;',$str_links );
                //get the posts data
            $menu['isAdmin'] = $this->isAdmin;
            $menu['login'] = $this->login;
            $view = array(
                    'content' => $this->load->view('admin/payment',$data, TRUE),
                    'menu' => $this->load->view('menu', $menu, TRUE)
                    );
            $this->load->view('master',$view);
       }

    public function confirm_payment($id)
    {
        if ($this->auction_model->checktrackingdb($id) == 0) {
            $this->auction_model->update_payment($id);
        $resi = $this->auction_model->gettrackingnumber($id);

        $this->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";   
        $config['smtp_user'] = ""; 
        $config['smtp_pass'] = "";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";

        $this->email->initialize($config);
        $emailwinner = $this->auction_model->get_winner_email($id);
        $this->email->from('blablabla@gmail.com', 'Blabla');
        $this->email->to($emailwinner);
        $this->email->subject('E-Fishauction Confirmation Payment');
        $this->email->message('Congratulation you have done the transaction!! Check your tracking status on Tracking Page, your AWB Number is '.$resi);
        $this->email->send();
        $menu['isAdmin'] = $this->isAdmin;
        $menu['login'] = $this->login;
        $data['status'] = 'Email have been sent to '.$emailwinner. ' update tracking with AWB.No '.$resi;
        $view = array(
           'content' => $this->load->view('auction/auction_notif', $data, TRUE),
           'menu' => $this->load->view('menu', $menu, TRUE)
                            );
        $this->load->view('master',$view);
        }
    }

    public function tracking()
    {
        $limit = 10; 
        $auction = $this->auction_model->get_for_check_tracking();
                 //pagination configuration
            $config = array();
            $config["base_url"] = base_url() . "index.php/admin/tracking";
            $total_row = count($auction);
            $config["total_rows"] = $total_row;
            $config["per_page"] = $limit;
            $config['use_page_numbers'] = TRUE;
            $config['num_links'] = $total_row;
            $config['cur_tag_open'] = '&nbsp;<a class="current">';
            $config['cur_tag_close'] = '</a>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Previous';

            $this->pagination->initialize($config);
            if($this->uri->segment(3)){
            $page = ($this->uri->segment(3)) ;
            }
            else{
            $page = 1;
            }
            $page = ($page-1) * $limit;
            $data["auctions"] = $this->auction_model->get_for_check_tracking_page($config["per_page"], $page);
            $str_links = $this->pagination->create_links();
            $data["links"] = explode('&nbsp;',$str_links );
                //get the posts data
            $menu['isAdmin'] = $this->isAdmin;
            $menu['login'] = $this->login;
            $view = array(
                    'content' => $this->load->view('admin/tracking',$data, TRUE),
                    'menu' => $this->load->view('menu', $menu, TRUE)
                    );
            $this->load->view('master',$view);
    }

    public function tracking_update($id)
    {
        if ($this->input->post()) {  
            $insert = $this->auction_model->tracking_update($this->input->post('tracking_id'));  
            redirect('admin/tracking');      
        }
        $data['auction_id'] = $id;
        $data['viewmodel'] = $this->auction_model->tracking_model($id);
        $menu['isAdmin'] = $this->isAdmin;
        $menu['login'] = $this->login;
        $view = array(
                'content' => $this->load->view('admin/tracking_update', $data, TRUE),
                'menu' => $this->load->view('menu', $menu, TRUE)
                );
        $this->load->view('master',$view);
    }   
}
