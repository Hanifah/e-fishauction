<?php
class Auction_model extends CI_Model {

	public function __construct()
		{
			$this->load->library('session');
			$this->load->helper('date');
		}

		function create_auction_model(){
			$data['image_file']   = array(
										'name'=>'image_file',
										'id'=>'image_file',
										'type' => 'file',
										'accept' => 'image/*',
										'class' => 'text',
										'onchange' => 'get_filename(this);'
										);
			$data['file_name']	= array(
										'name'=>'file_name',
										'id'=>'file_name',
										'type' => 'hidden',
										);

			$data['fish_name']   = array(
										'name'=>'fish_name',
										'id'=>'fish_name',
										'type' => 'text',
										'class' => 'text'
										);

			$data['qty']   = array(
										'name'=>'qty',
										'id'=>'qty',
										'type' => 'text',
										'class' => 'text numeric',
										);

			$data['amount']   = array(
										'name'=>'amount',
										'id'=>'amount',
										'type' => 'text',
										'class' => 'text numeric'
										);

			$data['open_bid']   = array(
										'name'=>'open_bid',
										'id'=>'open_bid',
										'type' => 'date',
										'class' => 'text dp'
										);
			$data['open_bid_time']   = array(
										'name'=>'open_bid_time',
										'id'=>'open_bid_time',
										'type' => 'text',
										'class' => 'text tp'
										);

			$data['close_bid']   = array(
										'name'=>'close_bid',
										'id'=>'close_bid',
										'type' => 'date',
										'class' => 'text dp'
										);

			$data['close_bid_time']   = array(
										'name'=>'close_bid_time',
										'id'=>'close_bid',
										'type' => 'text',
										'class' => 'text tp'
										);
			$data['descriptions']   = array(
										'name'=>'descriptions',
										'id'=>'descriptions',
										'class' => 'text',
										'rows' => 20,
										'cols' => 30
										);
			return $data;
		}

	function edit_auction_model($id){
		$auction = $this->get_auction_by_id($id);

			$data['image_file']   = array(
										'name'=>'image_file',
										'id'=>'image_file',
										'type' => 'file',
										'accept' => 'image/*',
										'class' => 'text',
										'onchange' => 'get_filename(this);'
										);
			$data['file_name']	= array(
										'name'=>'file_name',
										'id'=>'file_name',
										'type' => 'hidden',
										'value' => $auction->image_path
										);

			$data['fish_name']   = array(
										'name'=>'fish_name',
										'id'=>'fish_name',
										'type' => 'text',
										'class' => 'text',
										'value' => $auction->fish_name
										);

			$data['qty']   = array(
										'name'=>'qty',
										'id'=>'qty',
										'type' => 'text',
										'class' => 'text numeric',
										'value' => $auction->qty
										);

			$data['amount']   = array(
										'name'=>'amount',
										'id'=>'amount',
										'type' => 'text',
										'class' => 'text numeric',
										'value' => $auction->amount
										);

			$data['open_bid']   = array(
										'name'=>'open_bid',
										'id'=>'open_bid',
										'type' => 'date',
										'class' => 'text',
										'value' => date('Y-m-d', strtotime($auction->open_bid))
										);

			$data['open_bid_time']   = array(
										'name'=>'open_bid_time',
										'id'=>'open_bid_time',
										'type' => 'text',
										'class' => 'text tp',
										'value' => date('H:i:d', strtotime($auction->open_bid))
										);

			$data['close_bid']   = array(
										'name'=>'close_bid',
										'id'=>'close_bid',
										'type' => 'date',
										'class' => 'text',
										'value' => date('Y-m-d', strtotime($auction->close_bid))
										);

			$data['close_bid_time']   = array(
										'name'=>'close_bid_time',
										'id'=>'close_bid_time',
										'type' => 'text',
										'class' => 'text tp',
										'value' => date('H:i:d', strtotime($auction->close_bid))
										);

			$data['descriptions']   = array(
										'name'=>'descriptions',
										'id'=>'descriptions',
										'class' => 'text',
										'rows' => 20,
										'cols' => 30,
										'value' => $auction->description
										);
			$data['image_name'] = $auction->image_name;
			return $data;
		}

		function bid_model($id, $userId)
		{
			$auction = $this->get_auction_by_id($id);

			$data['amount']   = array(
										'name'=>'amount',
										'id'=>'amount',
										'type' => 'text',
										'class' => 'text numeric',
										'style' => 'display:inline;width:20%'
										);
			$data['user_id']	= array(
										'name'=>'user_id',
										'id'=>'user_id',
										'type' => 'hidden',
										'value' => $userId
										);
			$data['auction_id']	= array(
										'name'=>'auction_id',
										'id'=>'auction_id',
										'type' => 'hidden',
										'value' => $auction->auction_id
										);
			$data['close_bid']	= array(
										'name'=>'close_bid',
										'id'=>'close_bid',
										'type' => 'hidden',
										'value' => $auction->close_bid
										);
			$data['open_bid']	= array(
										'name'=>'open_bid',
										'id'=>'open_bid',
										'type' => 'hidden',
										'value' => $auction->open_bid
										);
			return $data;
		}

	function tracking_model($id)
		{
			$tracking = $this->get_tracking($id);

			$data['awb_number']   = array(
										'name'=>'amount',
										'id'=>'amount',
										'type' => 'text',
										'class' => 'text',
										'value' => $tracking->awb_number,
										'readonly' => 'readonly'
										);
			$data['origin']	= array(
										'name'=>'origin',
										'id'=>'origin',
										'type' => 'text',
										'class' => 'text',
										'value' => $tracking->origin,
										);
			$data['destination']	= array(
										'name'=>'destination',
										'id'=>'destination',
										'class' => 'text',
										'type' => 'text',
										'value' => $tracking->destination,
										);
			$data['date_of_shipment']	= array(
										'name'=>'date_of_shipment',
										'id'=>'date_of_shipment',
										'type' => 'date',
										'class' => 'text',
										'value' => date('Y-m-d', strtotime($tracking->date_of_shipment))
										);
			$data['status']	= array(
										'name'=>'status',
										'id'=>'status',
										'type' => 'text',
										'class' => 'text',
										'value' => $tracking->status,
										);
			$data['tracking_id']	= array(
										'name'=>'tracking_id',
										'id'=>'tracking_id',
										'type' => 'hidden',
										'class' => 'text',
										'value' => $tracking->tracking_id,
										);
			return $data;
		}

	function get_tracking($id)
	{
		$this->db->where('auction_id',$id);
		return $this->db->get('tracking')->result()[0];
	}

	function insert_auction()
	{
		$array = explode("\\",$this->input->post("file_name"));
		$image_name = $array[2];
		$image_remove_space = str_replace(' ', '-', $image_name); // Replaces all spaces with hyphens.
		$config['file_name'] = $image_remove_space;
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if(!$this->upload->do_upload('image_file'))
			{
				return $this->upload->display_errors();
			}
		else
			{
				$status = 'open';
				$open_bid = strtotime($this->input->post('open_bid'));
				$close_bid = strtotime($this->input->post('close_bid'));
				$open_bid_combine = $this->input->post('open_bid').' '.$this->input->post('open_bid_time');
				$close_bid_combine = $this->input->post('close_bid').' '.$this->input->post('close_bid_time');
				$open_bid_date = strtotime($open_bid_combine);
				$close_bid_date = strtotime($close_bid_combine);
	
				if (now() >= $close_bid_date) {
					$status = 'closed';
				}
				$image_upload = $this->upload->data('image_file');

				$data_file= array(
							'image_name' => $image_remove_space,
							'image_path' => $this->upload->data()['full_path'],
							'fish_name' => $this->input->post('fish_name'),
							'amount' => $this->input->post('amount'),
							'open_bid' => date('Y-m-d H:i:s',$open_bid_date),
							'close_bid' => date('Y-m-d H:i:s',$close_bid_date),
							'description' => $this->input->post('descriptions'),
							'qty' => $this->input->post('qty'),
							'status' => $status
							);
				$this->db->insert('auction_data',$data_file);
				return 'success';
			}
	}

	function get_auction_by_id($id)
	{
		$this->db->where('auction_id',$id);
		$query = $this->db->get('auction_data');
		return $query->result()[0];
	}

	function get_image_auction($id)
	{
		$this->db->where('auction_id',$id);
		$query = $this->db->get('auction_data');
		return $query->result()[0]->image_path;
	}

	function save_auction($id)
	{
		$status = 'open';
		$open_bid = strtotime($this->input->post('open_bid'));
				$close_bid = strtotime($this->input->post('close_bid'));
		$open_bid_combine = $this->input->post('open_bid').' '.$this->input->post('open_bid_time');
		$close_bid_combine = $this->input->post('close_bid').' '.$this->input->post('close_bid_time');
		$open_bid_date = strtotime($open_bid_combine);
		$close_bid_date = strtotime($close_bid_combine);
	
		if (now() >= $close_bid_date) {
				$status = 'closed';
			}

		if ($this->input->post('file_name') != $this->get_image_auction($id)) {
			$array = explode("\\",$this->input->post("file_name"));
			$image_name = $array[2];
			$image_remove_space = str_replace(' ', '-', $image_name); // Replaces all spaces with hyphens.
			$config['file_name'] = $image_remove_space;
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			
			if(!$this->upload->do_upload('image_file'))
			{
				return $this->upload->display_errors();
			}
			else
			{
				$image_upload = $this->upload->data('image_file');
				$data_file= array(
							'image_name' => $image_name,
							'image_path' => $this->upload->data()['full_path'],
							'fish_name' => $this->input->post('fish_name'),
							'amount' => $this->input->post('amount'),
							'open_bid' => date('Y-m-d H:i:s',$open_bid_date),
							'close_bid' => date('Y-m-d H:i:s',$close_bid_date),
							'description' => $this->input->post('descriptions'),
							'qty' => $this->input->post('qty'),
							'status' => $status
							);
				$this->db->where('auction_id',$id);
				$this->db->update('auction_data',$data_file);
				return 'success';
			}
		}
		else{
			$data_file= array(
							'fish_name' => $this->input->post('fish_name'),
							'amount' => $this->input->post('amount'),
							'open_bid' => date('Y-m-d H:i:s',$open_bid_date),
							'close_bid' => date('Y-m-d H:i:s',$close_bid_date),
							'description' => $this->input->post('descriptions'),
							'qty' => $this->input->post('qty'),
							'status' => $status
							);
			$this->db->where('auction_id',$id);
			$this->db->update('auction_data',$data_file);
			return 'success';
		}
	}

	function get_all_auction()
        {
        	$query = $this->db->get('auction_data');
        	$this->db->order_by('open_bid', 'desc');
        	return $query->result();
        }

    function get_closed_auction()
        {
        	$this->db->where('status','closed');
        	$this->db->order_by('open_bid', 'desc');
        	$this->db->join('users', 'users.id = auction_data.winner');
        	$query = $this->db->get('auction_data',5,0);
        	return $query->result();
        }

    function bid_now()
	   {
	   	if (now() >= strtotime($this->input->post('close_bid'))) {
				$this->db->set('status', 'closed');
				$this->db->where('auction_id', $this->input->post('auction_id'));
				$this->db->update('auction_data');
				return 'closed';
			}
		else if (now() < strtotime($this->input->post('open_bid'))) {
				return 'next';
			}
		else{
				$this->db->set('winner', $this->input->post('user_id'));
				$this->db->set('deal_amount', $this->input->post('amount'));
				$this->db->where('auction_id', $this->input->post('auction_id'));
				$this->db->update('auction_data');
				return 'success';
			}
		}
	   		
	function get_username($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('users')->result()[0]->username;
	}

	function get_filename($id)
	{
		$this->db->where('auction_id',$id);
		return $this->db->get('auction_data')->result()[0]->image_name;
	}

	function get_open_auction()
    {
      	$this->db->where('status', 'open');
       	$this->db->order_by('open_bid', 'desc');
       	$query = $this->db->get('auction_data');
       	return $query->result();
    }

    function get_auction_page($limit,$offset)
    {
    	$this->db->order_by('open_bid', 'desc');
    	$this->db->limit($limit,$offset);
    	$query = $this->db->get('auction_data');
       	return $query->result();
    }

    function delete_auction($id)
    {
    	$this->db->where('auction_id', $id);
		$this->db->delete('auction_data');
    }

    function get_for_check_payment()
    {
       	$this->db->order_by('open_bid', 'desc');
       	$this->db->where('status', 'closed');
       	$this->db->where('status_payment', 0);
       	$this->db->join('users', 'users.id = auction_data.winner');
      	$query = $this->db->get('auction_data');
       	return $query->result();
    }

    function get_for_check_payment_page($limit, $offset)
    {
       	$this->db->order_by('open_bid', 'desc');
       	$this->db->where('status', 'closed');
       	$this->db->where('status_payment', 0);
       	$this->db->join('users', 'users.id = auction_data.winner');
       	$this->db->limit($limit,$offset);
      	$query = $this->db->get('auction_data');
       	return $query->result();
    }

    function update_payment($id)
    {
    	$this->db->where('auction_id', $id);
    	$this->db->set('status_payment', 1);
		$this->db->update('auction_data');
    }

    function gettrackingnumber($id)
    {
    	$resi = now().$id.rand();
    	$data_file= array(
							'awb_number' => $resi,
							'auction_id' => $id
							);
		$this->db->insert('tracking',$data_file);
		return $resi;
    }

    function get_winner_email($id)
	{
		$this->db->where('auction_id',$id);
		$this->db->join('users', 'users.id = auction_data.winner');
		return $this->db->get('auction_data')->result()[0]->email;
	}

	function checktrackingdb($id)
	{
		$this->db->where('auction_id',$id);
		return count($this->db->get('auction_data')->result());
	}

	function get_for_check_tracking()
    {
       	$this->db->order_by('open_bid', 'desc');
       	$this->db->where('status', 'closed');
       	$this->db->where('status_payment', 1);
       	$this->db->join('users', 'users.id = auction_data.winner');
      	$query = $this->db->get('auction_data');
       	return $query->result();
    }

    function get_for_check_tracking_page($limit, $offset)
    {
       	$this->db->order_by('open_bid', 'desc');
       	$this->db->where('status', 'closed');
       	$this->db->where('status_payment', 1);
       	$this->db->join('users', 'users.id = auction_data.winner');
       	$this->db->limit($limit,$offset);
      	$query = $this->db->get('auction_data');
       	return $query->result();
    }

    function tracking_update($id)
    {
    	$data_file= array(
							'origin' => $this->input->post('origin'),
							'destination' => $this->input->post('destination'),
							'date_of_shipment' => $this->input->post('date_of_shipment'),
							'status' => $this->input->post('status'),
							);
    	$this->db->where('tracking_id',$id);
		$this->db->update('tracking',$data_file);
    }

    function tracking_search($id)
    {
    	$this->db->where('awb_number',$id);
    	return $this->db->get('tracking')->result()[0];
    }

    function get_auction_top_four()
    {
    	$this->db->order_by('open_bid', 'desc');
    	$this->db->where('status', 'open');
    	$this->db->limit(4,0);
    	$query = $this->db->get('auction_data');
       	return $query->result();	
    }

    function check_current_price($id)
    {
    	$this->db->where('auction_id',$id);
    	$query = $this->db->get('auction_data');
       	return $query->result()[0]->deal_amount == '' ? 0 : $query->result()[0]->deal_amount;	
    }
  	
}