<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User_model extends CI_Model {


	public function registerUser($data){

		$this->db->insert('login', $data);
		return $this->db->insert_id();
	}//End function registerUser

	public function verify_email($verification_key){


		$this->db->where('verification_key', $verification_key);
		$this->db->where('is_email_verified', 'no');
		$query = $this->db->get('login');
		//SELECT * FROM login WHERE verification_key = $verification_key AND is_email_verified = 'no';
		//Ta certo isso aqui?

		if($query->num_rows() > 0 ) {

			$data = array(

				'is_email_verified'  => 'yes'
			);
			$this->db->where('verification_key', $verification_key);
			$this->db->update('login', $data);	
			//UPDATE login set is_email_verified = 'yes' where verificatin_key = $verification_key; 	
			return true;	

		}
		 else {

		 	return false;
		 }




	}//End function verify_email

	public function login($email, $passwd) {

		$this->db->where('email', $email);//Checa se o email existe
		$query = $this->db->get('login');
		//SELECT email FROM login;

		if ($query->num_rows() > 0) {//Verifica se existe um registro

			foreach($query->result() as $row ) {

				if($row->is_email_verified == 'yes') {

					$store_passwd = $this->encrypt->decode($row->passwd);

						if ($passwd == $store_passwd) {

							$this->session->set_userdata('id', $row->id);
						}
						 else {

						 	return 'Wrong Email/Password';
						 }


				}
				 else {

				 	return 'You need to verify your email address first!';

				 }

			}


		}
		 else {

		 	return 'Wrong Email/Password';

		 }

	}//End public function login

	
}//end User_model CI_Model