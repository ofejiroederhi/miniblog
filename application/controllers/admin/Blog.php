<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	/**
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

		if(isset($_SESSION['user_id'])){
			$this->load->model('admin_model');
			$query=$this->admin_model->blogsresult();
			$data['result']= $query->result_array();
			$this->load->view('admin_panel/viewblog', $data);
			// print_r($data);
		}
		else{
			redirect('admin/login');
		}


	}
    public function addblog(){
		if(isset($_SESSION['failedinsert'])){
			$this->load->view('admin_panel/addblog',$error);
        }else{
			$this->load->view('admin_panel/addblog');
		}
        
    }
    public function addblog_post(){
        // print_r($_POST);die();
        $this->load->model('admin_model');


		if($_FILES){
				$upload_path = realpath(APPPATH . '/views/assets/uploads/');
                $config['upload_path']          = 'assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('blog_img'))
                {
                        $error = array('error' => $this->upload->display_errors());
						// $error = $error[]
						$this->session->set_flashdata('failedinsert', 'yes');
						// echo "<pre>";
						// print_r($error);die();
						$this->load->view('admin_panel/addblog',$error);
							// redirect('admin/blog/addblog/');
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

						$blog_title=$_POST['blog_title']; 
						$blog_desc=$_POST['blog_desc'];
						$fileurl="assets/uploads/".$data['upload_data']['file_name'];
						// $query= $this->admin_model->blog_post();
						$query = $this->db->query("INSERT INTO `miniblog`.`article` (`blog_title`, `blog_desc`, `blog_img`) VALUES ('$blog_title', '$blog_desc', '$fileurl');");
						echo "<pre>";
						// print_r($fileurl); die();
						
						if($query){
							$this->session->set_flashdata('inserted', 'yes');

							redirect('admin/blog/addblog');
						}
                        
                }
			}else{
				// Upload not passed
			}

    }


	public  function edit($blog_id){
		// print_r($blog_id);
		$this->load->model('admin_model');
		$query= $this->admin_model->editblog($blog_id);
		$data['result']= $query->result_array();
		$this->load->view('admin_panel/editblog',$data);


	}

	public function editblog_post(){
			// print_r($_POST);die();
			$this->load->model('admin_model');
	
	
			if($_FILES){
					$upload_path = realpath(APPPATH . '/views/assets/uploads/');
					$config['upload_path']          = 'assets/uploads/';
					$config['allowed_types']        = 'gif|jpg|png|jpeg';
					// $config['max_size']             = 100;
					// $config['max_width']            = 1024;
					// $config['max_height']           = 768;
	
					$this->load->library('upload', $config);
	
					if ( ! $this->upload->do_upload('blog_img'))
					{
							$error = array('error' => $this->upload->display_errors());
							// $error = $error[]
							$this->session->set_flashdata('failedinsert', 'yes');
							// echo "<pre>";
							// print_r($error);die();
							$this->load->view('admin_panel/viewblog',$error);
								// redirect('admin/blog/addblog/');
					}
					else
					{
							$data = array('upload_data' => $this->upload->data());

							// print_r($data);
							$query= $this->admin_model->updateblog($data);
							// print_r($query); die();
							// $query = $this->db->query("INSERT INTO `miniblog`.`article` (`blog_title`, `blog_desc`, `blog_img`) VALUES ('$blog_title', '$blog_desc', '$fileurl');");
							// echo "<pre>";
							// print_r($fileurl); die();
							
							if($query){
								$this->session->set_flashdata('inserted', 'yes');
	
								redirect('admin/blog');
							}
							
					}
				}else{
					// Upload not passed
				}
	}

	public function delete(){
		print_r($blog_id);
	}
}
