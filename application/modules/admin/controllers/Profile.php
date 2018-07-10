<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Dbs'));
    if($this->session->userdata('status')!='login'){
      redirect(base_url('login'));
    }
    if($this->session->userdata('role')!=1){
      redirect(redirect($_SERVER['HTTP_REFERER']));
    }
  }

  function index()
  {
    $username=$this->session->userdata('username');

    $getProfile=$this->Dbs->getwhere('username',$username,'users')->result();
    $data = array(
      'contain_view' => 'admin/profile/vProfile',
      'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
      'css'=>'admin/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
      'script'=>'admin/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
      'nama'=>'Kang Ify!',
      'getProfile'=>$getProfile//ngirim variable ke view yang ada di module admin {DIKIRIM KE VIEW ADMIN}
     );
    // $this->load->view('home_v', $data);
    $this->template->load($data);
  }

  function updateaction(){
    $username=$this->session->userdata('username');
    if(isset($_POST['submit'])){
      $name=$_POST['name'];
      $email=$_POST['email'];
      $address=$_POST['address'];
      if($_POST['password']!=''){
        $password=md5($_POST['password']);
        $data = array(
          'name' => $name,
          'email'=>$email,
          'password'=>$password,
          'address'=>$address
         );
      }else{
        $data = array(
          'name' => $name,
          'email'=>$email,
          'address'=>$address
         );
      }

       $sql=$this->Dbs->update($data,'users','username',$username);
       if($sql){
         redirect(base_url('admin/profile'));
       }
    }


  }

}
