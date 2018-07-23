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


  function studio(){
    $this->load->model(array('Studio_model'));
    $datastudio=$this->Studio_model->get_all();//panggil ke modell
    $json=json_encode($datastudio);
    echo $json;
  }

  function film(){
    $this->load->model(array('Film_model'));
    $datafilm=$this->Film_model->get_all();//panggil ke modell
    $json=json_encode($datafilm);
    echo $json;
  }
  function jam_tayang(){
    $this->load->model(array('Jam_tayang_model'));
    $datajam_tayang=$this->Jam_tayang_model->get_all();//panggil ke modell
    $json=json_encode($datajam_tayang);
    echo $json;
  }


//Jadwal
  function jadwal(){
    $this->load->model(array('Jadwal_model'));
    $datajadwal=$this->Jadwal_model->getJoin()->result();//panggil ke modell
    $json=json_encode($datajadwal);
    echo $json;
  }
  function getJudulFilm(){
    $this->load->model(array('Jadwal_model'));
    $datajadwal=$this->Jadwal_model->getJudulFilm()->result();//panggil ke modell
    $json=json_encode($datajadwal);
    echo $json;
  }

  function getJudulFilmbyId($id_film){
    $this->load->model(array('Jadwal_model'));
    $datajadwal=$this->Jadwal_model->getJudulFilmbyId($id_film)->result();//panggil ke modell
    $json=json_encode($datajadwal);
    echo $json;
  }
  function getJamFilm($id_film,$id_studio){
    $this->load->model(array('Jadwal_model'));
    $datajadwal=$this->Jadwal_model->getJamFilm($id_film,$id_studio)->result();//panggil ke modell
    $json=json_encode($datajadwal);
    echo $json;
  }
  function getStudiobyFilm($id_film){
    $this->load->model(array('Jadwal_model'));
    $dataStudio=$this->Jadwal_model->getStudiobyFilm($id_film)->result();//panggil ke modell
    $json=json_encode($dataStudio);
    echo $json;
  }
//Jadwal

  function genrebyfilm($id){
    $this->load->model(array('Film_genre'));
    $datagenre=$this->Film_genre->genrebyfilm($id);//panggil ke modell
    $arr=[];
    foreach ($datagenre as $d) {
      array_push($arr,$d->id_genre);
    }
    print_r($arr);
    // print_r($datagenre);
  }

}
