<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()

	{
		$this->load->view('home/includes/clean_header_view');
		$this->load->view('home/login_view');
		//$this->load->view('home/includes/footer_view');
	}

	public function user_registration()

	{
		$this->load->view('home/includes/clean_header_view');
		$this->load->view('home/user_registration_view');
		//$this->load->view('home/includes/footer_view');
	}

	public function send()

	{
		$this->load->view('home/includes/clean_header_view');
		$this->load->view('home/send_view');
		//$this->load->view('home/includes/footer_view');
	}

	

}