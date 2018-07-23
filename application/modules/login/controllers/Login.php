<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Dbs'));
  }

  function index()
  {
    $this->load->view('vLogin');
  }

  function auth(){//Proses pengecekan login
    $username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$sql = $this->Dbs->check("user",$where);
    $check=$sql->num_rows();
		if($check > 0){
      $getdatauser=$sql->result();
      $role=$getdatauser[0]->id_level;//Mengambil role dari table user
      $name=$getdatauser[0]->username;
      if($role==1){
        $level='admin';
      }
      if($role==2){
        $level='pelanggan';
      }

			$data_session = array(//Data yang akan disimpan kedalam session
				'username' => $username,
        'name'=>$name,
				'status' => "login",
        'role'=> $role,
        'level'=>$level
				);

			$this->session->set_userdata($data_session);

      if($role==1){
        redirect(base_url("admin"));
      }else if($role==2){
        redirect(base_url("pelanggan"));
      }else{
        redirect(base_url());
      }

		}else{
      $this->session->set_flashdata('flashMessage', 'Username dan Password Salah');
      redirect(base_url('login'));
		}
  }


  function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}
