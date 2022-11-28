<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue_book extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('isLogIn')==false)
        redirect('Login');

        $this->load->model('General_model');
        // $this->load->library('Fileupload');

    }

    public function list(){

        $data['issue_list']=$this->General_model->list_issue('tbl_issue_books','tbl_students','tbl_books');

        $this->load->view("layouts/header");
        $this->load->view("layouts/sidebar");
        $this->load->view("issue_book/list",$data);
        $this->load->view("layouts/footer");
    }

    public function add(){

        $data['students']=$this->General_model->list('tbl_students');
        $data['books']=$this->General_model->list_book_hand('tbl_books');

        if($this->input->post()){
            
        if(empty($this->input->post('id'))){
            // add
            $date=date("Y-m-d");
            $data=(object)$postData=[

                'student'=>$this->input->post('student'),
                'book'=>$this->input->post('book'),
                'day'=>$this->input->post('day'),
                'issue_date'=>$date,
                
            ];
            $data1=(object)$postData1=[
                'stock' =>'0'
            ];
           }else{
            
               $id= $this->input->post('id');
               $data=(object)$postData=[

                'student'=>$this->input->post('student'),
                'book'=>$this->input->post('book'),
                'day'=>$this->input->post('day'),
                'cstatus'=>$this->input->post('cstatus')
                
            ];
           }
           
           $book_id=$this->input->post('book');

               if(empty($id)){

                $this->General_model->add($postData,'tbl_issue_books');
                $this->General_model->update($postData1,'tbl_books',$book_id);
                $this->session->set_flashdata('message',"Add Successfully");

               }else{
                $return=$this->input->post('cstatus');
                if($return==1){
                    $data2=(object)$postData2=[
                        'stock' =>'1'
                    ];

                    $this->General_model->update($postData1,'tbl_books',$book_id);
                }
                $this->General_model->update($postData,'tbl_issue_books',$id);
                $this->session->set_flashdata('message',"Update Successfully");
               }
               redirect('Issue_book/list');
           }else{

            $this->load->view("layouts/header");
            $this->load->view("layouts/sidebar");
            $this->load->view("issue_book/add",$data);
            $this->load->view("layouts/footer");

           }
    }

    public function edit($id){

        $data['editData']=$this->General_model->edit('tbl_issue_books',$id);
        $data['students']=$this->General_model->list('tbl_students');
        $data['books']=$this->General_model->list('tbl_books');


                $this->load->view("layouts/header");
                $this->load->view("layouts/sidebar");
                $this->load->view("issue_book/add",$data);
                $this->load->view("layouts/footer");
    }

    public function delete($id){

        $this->General_model->delete($id,'tbl_issue_books');

        redirect('Issue_book/list');
    }
}
?>