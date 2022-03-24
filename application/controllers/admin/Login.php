<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/*
     *
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data=[];
		if(isset($_SESSION['error'])){
			// $data['error'] = '';
			// die($_SESSION['error']);
			$data['error']= $_SESSION['error'];
			$this->load->view('admin_panel/login',$data);
		}else{
			$data['error']= "NO_ERROR";
			$this->load->view('admin_panel/login',$data);
		}
	}

    public function login_post(){

        // echo "<pre>";
        // print_r($_POST);
        if(isset($_POST)){
            $email= $_POST['email'];
            $password = $_POST['password'];
            $this->load->model('admin_model');
			$query=$this->admin_model->login();
            if($query->num_rows()){
				$result =  $query->result_array();

				// echo "<pre>";
				// print_r($query->result_array()); die();
				$this->load->library('session');
				
				$this->session->set_userdata('user_id', $result[0]['UserId']);
				redirect('admin/dashboard');


            }else{
                // invalid credentials

				$this->session->set_flashdata('error','invalid credentials');
				redirect('admin/login');
                // $data['warning'] = "invalid credentials";
				// $this->load->view('admin_panel/login',$data);
            }

        }else{
            die("invalid login credentials");
        }
    }
	public function logout(){
		session_destroy();
		redirect('admin/login');
	}
}
