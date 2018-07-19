<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {

  }

  function genre(){
    $this->load->model(array('Genre_model'));
    $datagenre=$this->Genre_model->get_all();//panggil ke modell
    $json=json_encode($datagenre);
    echo $json;
  }

  function genrebyfilm($id){
    $this->load->model(array('Genre_model'));
    $datagenre=$this->Genre_model->genrebyfilm($id);//panggil ke modell
    $arr=[];
    foreach ($datagenre as $d) {
      array_push($arr,$d->id_genre);
    }
    print_r($arr);
    // print_r($datagenre);
  }

}
