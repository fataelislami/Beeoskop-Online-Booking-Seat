<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Film_model'));
  }

  function index()
  {
    $datafilm=$this->Film_model->get_all();//panggil ke modell
    $data = array('datafilm' => $datafilm, );
    $this->load->view('Fullpage',$data);
  }

  function profile(){
    echo "ini homepage";
  }

  function transaksi(){
    if(isset($_GET['submit'])){
      echo $_GET['movie'];
      echo $_GET['studio'];
      echo $_GET['tanggal'];
      echo $_GET['waktu'];
    }
  }

}
