<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('isLogIn')==false)
        redirect('Login');

        $this->load->model('General_model');

    }
    public function list(){

        $data['list']=$this->General_model->list('tbl_books');

        $this->load->view("layouts/header");
        $this->load->view("layouts/sidebar");
        $this->load->view("books/list",$data);
        $this->load->view("layouts/footer");
    }

    public function add(){
        if($this->input->post()){
            
        if(empty($this->input->post('id'))){
            // add
            
            $data=(object)$postData=[

                'name'=>$this->input->post('name'),
                'author'=>$this->input->post('author'),
                'edition'=>$this->input->post('edition'),
                'publisher'=>$this->input->post('publisher'),
                
            ];
           }else{
            
               $id= $this->input->post('id');
               $data=(object)$postData=[

                'name'=>$this->input->post('name'),
                'author'=>$this->input->post('author'),
                'edition'=>$this->input->post('edition'),
                'publisher'=>$this->input->post('publisher')

            ];
           }
        
               if(empty($id)){

                $this->General_model->add($postData,'tbl_books');
                $this->session->set_flashdata('message',"Add Successfully");

               }else{
                $this->General_model->update($postData,'tbl_books',$id);
                $this->session->set_flashdata('message',"Update Successfully");
               }
               redirect('Books/list');
           }else{

            $this->load->view("layouts/header");
            $this->load->view("layouts/sidebar");
            $this->load->view("books/add");
            $this->load->view("layouts/footer");

           }
    }

    public function edit($id){

        $data['editData']=$this->General_model->edit('tbl_books',$id);


                $this->load->view("layouts/header");
                $this->load->view("layouts/sidebar");
                $this->load->view("books/add",$data);
                $this->load->view("layouts/footer");
    }

    public function delete($id){

        $this->General_model->delete($id,'tbl_books');

        redirect('Books/list');
    }
}
?>