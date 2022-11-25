<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Login_model'));
    }

    public function index(){

        // redirect to dashboard home page
        // if($this->session->userdata('adminlog')) 
        // redirect('/');
        
        $this->form_validation->set_rules('username', 'username','required');
        $this->form_validation->set_rules('password', 'password','required');

        
        if($this->form_validation->run()===true){

            $data=(object)$postdata=[
                'username'=>$this->input->post('username'),
                'password'=>($this->input->post('password'))
            ];
// print_r($data);exit;
            $check_user=$this->Login_model->check_user($postdata,'tbl_users');
// print_r($check_user->row());exit;
            if($check_user->num_rows()===1)
            {
                $this->session->set_userdata([
                    'isLogIn'   => true,'adminlog'   => true,'name'   => 'Admin',
                    'username' => $check_user->row()->username
                ]);

                redirect(base_url());
            }else{

               
                $this->load->view('login/loginView');
            }
            }else{
            $this->load->view('login/loginView');
        }

    }

    public function list(){


        if($this->session->userdata('isLogIn')==false)
        redirect('Login');

        $data['lists']=$this->Login_model->list_admin('tbl_users');

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('login/loginList',$data);
        $this->load->view('layouts/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy('isLogIn');
        redirect(base_url());
    }

    public function updateList($id){

        $data['admin_data']=$this->Login_model->update_list('tbl_users',$id);

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('login/loginUpdate',$data);
        $this->load->view('layouts/footer');


    }
    public function update(){

        $data=(object)$postdata=[
            'id'=>$this->input->post('eid'),
            'username'=>$this->input->post('username'),
            'password'=>($this->input->post('password'))
        ];

        $this->Login_model->update('tbl_users',$postdata);
        redirect(base_url('loginList'));

    }


}
?>