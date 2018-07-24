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
    $datafilmcoming=$this->Film_model->get_film_comingsoon();
    $data = array(
      'datafilm' => $datafilm,
      'datafilmcoming' => $datafilmcoming);
    $this->load->view('Fullpage',$data);
  }

  function profile(){
    echo "ini homepage";
  }

  function movies()
  {
    $this->load->view('Movies');
  }

  function details($id){
    $datafilm=$this->Film_model->get_by_id($id);
    $datasemuafilm=$this->Film_model->get_all();
    $data = array(
      'datafilm' => $datafilm,
      'datasemuafilm' => $datasemuafilm,
    );
    $this->load->view('Details', $data);

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
