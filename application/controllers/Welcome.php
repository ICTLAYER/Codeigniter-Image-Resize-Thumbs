<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$this->load->view('welcome_message');
	}
	function do_upload(){
		$name = $_FILES["file"]["name"];
    $ext = end((explode(".", $name))); # extra () to prevent notice

    $config['upload_path']   = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']      = 20000;

    $this->load->library('upload', $config);

    if( ! $this->upload->do_upload()){
    	$error = array('error' => $this->upload->display_errors());

    	$this->load->view('upload_form', $error);
    }
    else{
    	$upload_data = $this->upload->data();

        #you can choose from
        /*
           Array(
                 [file_name]    => mypic.jpg
                 [file_type]    => image/jpeg
                 [file_path]    => /path/to/your/upload/
                 [full_path]    => /path/to/your/upload/jpg.jpg
                 [raw_name]     => mypic
                 [orig_name]    => mypic.jpg
                 [client_name]  => mypic.jpg
                 [file_ext]     => .jpg
                 [file_size]    => 22.2
                 [is_image]     => 1
                 [image_width]  => 800
                 [image_height] => 600
                 [image_type]   => jpeg
                 [image_size_str] => width="800" height="200"
          )
        */

          $this->model->insert_data($upoad_data['file_name'], $upoad_data['full_path']);

          $data = array('upload_data' => $this->upload->data());

          $this->load->view('upload_success', $data);
      }
  }
}
