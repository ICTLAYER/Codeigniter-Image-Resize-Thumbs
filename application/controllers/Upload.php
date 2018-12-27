<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->library('upload');
        }

        public function index()
        {
                $this->load->view('upload_form', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $config=array();
                $config['upload_path']          = 'upload/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 20000;
                $config['file_name']            = date('d/m/y').'-'.time();

                $this->upload->initialize( $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {

                        $data = $this->upload->data();
                        $this->load->library('image_lib');
                        $config=array();
                        $config['image_library']  = 'GD2';
                        $config['source_image']   = 'upload/'.$data['file_name'];
                        $config['create_thumb']   = false;
                        $config['maintain_ratio'] = true;
                        $config['quality']        = 90;
                        $config['width']          = 500;

                        $this->image_lib->initialize($config);
                        $thumb_image = $this->image_lib->resize();
                        $this->load->model('upload_model');
                        $this->upload_model->insert_data($config);
                        if ($thumb_image) {
                                $this->load->library('image_lib');
                                $config=array();
                                $config['image_library']  = 'GD2';
                                $config['source_image']   = 'upload/'.$data['file_name'];
                                $config['create_thumb']   = true;
                                $config['maintain_ratio'] = true;
                                $config['quality']        = 90;
                                $config['new_image']      = 'thumbs/';
                                $config['width']          = 200;
                                $this->image_lib->initialize($config);
                                $this->image_lib->resize();
                        }
                        
                        $this->session->set_flashdata('msg', 'Image Upload Success');
                        $error = array('error' => 'Image Upload successfull!');
                        $this->load->view('upload_form',$error);
                        
                }
                
        }
        public function show_image()
        {
                $this->load->model('upload_model');
                $data['images'] = $this->upload_model->view_image();
                $this->load->view('upload_success',$data);
        }
}
?>