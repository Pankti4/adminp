<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pin_model');
	}

	public function index()
	{
		$this->load->view('user/pinview');
	}

	public function create()
	{
		$pincode = $this->input->post('pincode');
		$ls_cod = $this->input->post('ls_cod');

		$data = array(
			'pincode'	=> $pincode,
			'ls_cod' => $ls_code,
		);
		$insert = $this->pin_model->createData($data);
		echo json_encode($insert);
	}

	public function fetchDatafromDatabase()
	{
		$resultList = $this->pin_model->fetchAllData('*','pin',array());
		
		$result = array();
		$i = 1;
		foreach ($resultList as $key => $value) {

			$result['data'][] = array(
				$i++,
				$value['pincode'],
				$value['ls_cod'],
			);
		}
		echo json_encode($result);
	}
	
}