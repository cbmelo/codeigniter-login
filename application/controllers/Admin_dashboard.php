<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Admin_dashboard extends CI_Controller {

	public function __construct() {

			parent::__construct(); 
			if (!$this->session->userdata('id')) {

				redirect('user/login');

			}
			
		}

	public function index () {

		echo 'Welcomer user';
		echo '<p  class="text-center"><a href="'.base_url()'admin_dashboard/logout"></a></p>';
	}//End public functin index

	public function logout(){

		$data = $this->session->all_userdata();
		foreach($data as $row => $rows_value) {

			$this->session->unset_userdata($row);
		}

		redirect('user/login');

	}



}//End User CI_Controller
