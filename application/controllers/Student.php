<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('isLogIn')==false)
        redirect('Login');

        $this->load->model('General_model');
        $this->load->library('Fileupload');

    }
    public function list()
    {  
       $data['list']=$this->General_model->list('tbl_students');

       $this->load->view("layouts/header");
       $this->load->view("layouts/sidebar");
       $this->load->view("student/list",$data);
       $this->load->view("layouts/footer");

    }

    public function add()
    { 
        if($this->input->post()){
            $picture = $this->fileupload->do_upload('uploads/','image');

            
        if (!empty($_FILES['image']['name'])){
            if($_FILES['image']['name']> 1900000){
                echo "image size less should be less than 2 mb";
            }else{
            $configResize = array(
                        'source_image' => $picture,
                        'width' => 238,
                        'height' => 100,
                        'maintain_ratio' => TRUE
            );

            $this->load->library('image_lib',$configResize);
            $this->image_lib->resize();
        }
        }

        if(empty($this->input->post('id'))){
            // add
            
            $data=(object)$postData=[

                'name'=>$this->input->post('name'),
                'cource'=>$this->input->post('cource'),
                'email'=>$this->input->post('email'),
                'phone'=>$this->input->post('phone'),
                'image'    => (!empty($picture)?$picture:$this->input->post('old_picture')),
                
            ];
           }else{
            
               $id= $this->input->post('id');
               $data=(object)$postData=[

                'name'=>$this->input->post('name'),
                'cource'=>$this->input->post('cource'),
                'email'=>$this->input->post('email'),
                'phone'=>$this->input->post('phone'),
                'image'    => (!empty($picture)?$picture:$this->input->post('old_picture')),
            ];
           }
        
               if(empty($id)){

                $this->General_model->add($postData,'tbl_students');
                $this->session->set_flashdata('message',"Add Successfully");

               }else{
                $this->General_model->update($postData,'tbl_students',$id);
                $this->session->set_flashdata('message',"Update Successfully");
               }
               redirect('Student/list');
           }else{
      
                $this->load->view("layouts/header");
                $this->load->view("layouts/sidebar");
                $this->load->view("student/add");
                $this->load->view("layouts/footer");
           }

    }

    public function edit($id){

        $data['editData']=$this->General_model->edit('tbl_students',$id);


                $this->load->view("layouts/header");
                $this->load->view("layouts/sidebar");
                $this->load->view("student/add",$data);
                $this->load->view("layouts/footer");
    }

    public function delete($id){

        $this->General_model->delete($id,'tbl_students');

        redirect('Student/list');
    }


}
?>