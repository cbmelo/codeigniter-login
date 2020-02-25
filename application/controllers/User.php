<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User extends CI_Controller {

	public function __construct() {

			parent::__construct(); 
			$this->load->library('form_validation');
			$this->load->library('encrypt');
			$this->load->model('user_model');
			
		}

	public function registration () {

		$this->form_validation->set_rules('first_name', 'First Name','required|alpha|max_length[10]');
		$this->form_validation->set_rules('last_name',  'Last Name','required|alpha|max_length[20]');
		$this->form_validation->set_rules('email', 'Email Address','required|valid_email|trim|is_unique[login.email]');
		$this->form_validation->set_rules('passwd', 'Password', 'required|min_length[6]|max_length[16]|matches[conf_passwd]');
		$this->form_validation->set_rules('conf_passwd', 'Confirm Password', 'required|min_length[6]|max_length[16]');


		
	if ($this->form_validation->run() == FALSE) {

        $this->load->view('home/includes/clean_header_view');
		$this->load->view('home/home_view');
		
       
       }
		 else {

		 	$verification_key = md5(rand());
		 	$encrypted_passwd = $this->encrypt->encode($this->input->post('passwd'));

		 	$data = array(

		 		'first_name' => $this->input->post('first_name'),
		 		'last_name'  => $this->input->post('last_name'),
		 		'email'      => $this->input->post('email'),
		 		'passwd'     => $encrypted_passwd,
		 		'verification_key' => $verification_key
		 	);

		 	$id = $this->user_model->registerUser($data);

		 	if ($id > 0) {
		 				 		
		 		$to       = $this->input->post('email');
				$subject  = "Please verify your email for login.";;
				$message  = "<p>Hi " . $this->input->post('first_name'). "</p>
				<p>This is email verification from Wish Birhtday Club system. For Complete registration process and login into system.<br>
				First you need to verify your email by click this <a href='".base_url()."user/verify_email/".$verification_key."'>Link</a>
				</p>
				<p>Once you click this link your email will be verified and you can login into system.</p>
				<p>Thank you<br><br>
				Team Wish Birhtday Club</p>
		 		";
				$headers  = 'From: noreply@gringoshopper.com' . "\r\n" .
				            'MIME-Version: 1.0' . "\r\n" .
				            'Content-type: text/html; charset=utf-8';
				if(mail($to, $subject, $message, $headers)) {

				    $this->session->set_flashdata('message', 'Check your email for verification email');
				    $this->load->view('home/includes/clean_header_view');
					$this->load->view('home/home_view');
				}
				else
				    echo "Email sending failed";



		 	}
		}		 	 
	}//End function registration

	public function verify_email(){

		if ($this->uri->segment(3)) {

			$verification_key = $this->uri->segment(3);
			

			if ($this->user_model->verify_email($verification_key)) {

				$data['message'] = '<h1 class="text-center">Your Email has been successfully verified, now you can login, click here <a href="'.base_url().'user/login"></a></h1>';

			}
			 else {

			 		$data['message'] = '<h1 class="text-center">Invalid link</h1>';

			 }

			 $this->load->view('home/email_verification', $data);

		}
	}//End function verify_email


	public function login () {
		
		$this->form_validation->set_rules('email', 'Email Address','required|trim|valid_email');
		$this->form_validation->set_rules('passwd', 'Password', 'required');
		
	if ($this->form_validation->run() == FALSE) {

        $this->load->view('home/includes/clean_header_view');
		$this->load->view('home/login_view');	

       }
		 else {

		 $result = $this->user_model->login($this->input->post('email'), $this->input->post('passwd'));

		 	if ($result =='') {

		 		redirect('Admin_dashboard');
		 	}
		 	 else {

		 	 	$this->session->set_flashdata('message', $result);
		 	 	redirect('home/index');
		 	 }

	}



	}//End public function login

}//End User CI_Controller
