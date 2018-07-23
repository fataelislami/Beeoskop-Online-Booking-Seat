<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Tiket_model'));
  }

  function index()
  {

  }

  function getidjadwal($id_studio,$id_film,$id_jam_tayang){
    $id_jadwal=$this->Tiket_model->get_id_jadwal($id_studio,$id_film,$id_jam_tayang);
    $json=json_encode($id_jadwal);
    echo $json;
  }

  function get_kursi($id_jadwal,$tanggal_tayang){
    $datakursi=$this->Tiket_model->get_kursi($id_jadwal,$tanggal_tayang);
    $arrKosong=[];
    foreach ($datakursi as $d) {
      array_push($arrKosong,$d->no_kursi);
      # code...
    }


    $json=json_encode($arrKosong);
    echo $json;
  }

}
