<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belajar extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Biodata_model'));
  }

  function index()
  {
    $this->load->view('belajar/home');
  }


  function getData(){
    $data=$this->Biodata_model->get_all("ASC");
    $json=json_encode($data);
    echo $json;
  }
  public function create_action()
  {

          $data = array(
  'nama' => $this->input->post('nama',TRUE),
  'alamat' => $this->input->post('alamat',TRUE),
  'umur' => $this->input->post('umur',TRUE),
    );

          $this->Biodata_model->insert($data);
          echo "SUKSES";
  }
  public function delete($id)
  {
      $row = $this->Biodata_model->get_by_id($id);

      if ($row) {
          $this->Biodata_model->delete($id);
          $this->session->set_flashdata('message', 'Delete Record Success');
          redirect(site_url('belajar'));
      } else {
          $this->session->set_flashdata('message', 'Record Not Found');
          redirect(site_url('belajar'));
      }
  }




  //VALIDASI


}
