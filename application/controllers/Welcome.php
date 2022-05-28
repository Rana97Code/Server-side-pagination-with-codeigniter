<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hscode_model');
		
	}

	
	public function index()
	{
		
		
		$this->load->view('welcome_message');
	}
	public function hsdetails(){
		$alldata = $this->Hscode_model->make_datatables();
		
    	$data=array();
		 $no =$_POST['start'];
		foreach($alldata as $result){
			$row = array();
			$row[] = ++$no;
			$row[] = $result->hs_code;
			$row[] = $result->description;
			$row[] = $result->calculate_year;
			$data[] = $row;
		}
		$output = array(
			// "draw" =>intval($_POST["draw"]),
			"recordsTotal" =>$this->Hscode_model->get_all_data(),
			"recordsFiltered" =>$this->Hscode_model->get_filtered_data(),
			"data" =>$data,
		);
		
		echo json_encode($output);
		//$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
}
