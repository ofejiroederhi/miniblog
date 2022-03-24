<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    function login(){
    $email= $_POST['email'];
    $password = $_POST['password'];
    return $query = $this->db->query("SELECT * FROM `backenduser` WHERE `Username` = '$email' AND `Password` = '$password' ");



    }

    function blog_post(){
    // echo "<pre>";
    // print_r($_FILES); die();
    return $query = $this->db->query("INSERT INTO `miniblog`.`article` (`blog_title`, `blog_desc`, `blog_img`) VALUES ('$blog_title', '$blog_desc', '$fileurl');");
    }

    function blogsresult(){

        return $query =$this->db->query("SELECT * FROM `article` ORDER BY `blog_id` DESC LIMIT 1000; ");
	    // return $data['result']= $query->result_array();
		// echo"<pre>";
		// print_r($data);
        // die();
    }

    function editblog($blog_id){
        
        return $this->db->query("SELECT * FROM `article` WHERE `blog_id` = '$blog_id' ");
    }


    function updateblog($filepath){

        $data=$filepath;
        $blog_id=$_POST['blog_id'];
        $blog_title=$_POST['blog_title']; 
		$blog_desc=$_POST['blog_desc'];
		$fileurl="assets/uploads/".$data['upload_data']['file_name'];
        // print_r($_POST); die();
        return $this->db->query("UPDATE `miniblog`.`article` SET `blog_desc`='$blog_desc', `blog_title`='$blog_title', `blog_img`='$fileurl' WHERE  `blog_id`='$blog_id';");
    }
}

?>