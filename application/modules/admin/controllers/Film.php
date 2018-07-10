<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Film extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Film_model'));
    if($this->session->userdata('status')!='login'){
      redirect(base_url('login'));
    }
    if($this->session->userdata('role')!=1){
      redirect(redirect($_SERVER['HTTP_REFERER']));
    }
    $this->load->library('form_validation');
  }

  function index()
  {
    $datafilm=$this->Film_model->get_all();//panggil ke modell
    $data = array(
      'contain_view' => 'admin/film/vTable',
      'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
      'css'=>'admin/film/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
      'script'=>'admin/film/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
      'datafilm'=>$datafilm,//ngirim variable ke view yang ada di module admin {DIKIRIM KE VIEW ADMIN}
     );
    // $this->load->view('home_v', $data);
    $this->template->load($data);
  }

  function tambah(){
    $data = array(
      'contain_view' => 'admin/film/vCreate',
      'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
      'css'=>'admin/film/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
      'script'=>'admin/film/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
      'nama'=>'ADMIN',//ngirim variable ke view yang ada di module admin {DIKIRIM KE VIEW ADMIN}
     );
    // $this->load->view('home_v', $data);
    $this->template->load($data);
  }

  public function create_action()
  {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
          $this->create();
      } else {
          $data = array(
  'id_film' => $this->input->post('id_film',TRUE),
  'judul_film' => $this->input->post('judul_film',TRUE),
  'tahun_produksi' => $this->input->post('tahun_produksi',TRUE),
  'sinopsis' => $this->input->post('sinopsis',TRUE),
  'durasi' => $this->input->post('durasi',TRUE),
  'tanggal_mulai' => $this->input->post('tanggal_mulai',TRUE),
  'tanggal_selesai' => $this->input->post('tanggal_selesai',TRUE),
  'url_gambar' => $this->input->post('url_gambar',TRUE),
    );

          $this->Film_model->insert($data);
          $this->session->set_flashdata('message', 'Create Record Success');
          redirect(site_url('admin/film'));
      }
  }


function cekdb(){
  // $datafilm=$this->Film_model->get_all();//panggil ke modell
  // var_dump($datafilm);
}

  //VALIDASI
  public function _rules()
  {
$this->form_validation->set_rules('judul_film', 'judul film', 'trim|required');
$this->form_validation->set_rules('tahun_produksi', 'tahun produksi', 'trim|required');
$this->form_validation->set_rules('sinopsis', 'sinopsis', 'trim|required');
$this->form_validation->set_rules('durasi', 'durasi', 'trim|required');
$this->form_validation->set_rules('tanggal_mulai', 'tanggal mulai', 'trim|required');
$this->form_validation->set_rules('tanggal_selesai', 'tanggal selesai', 'trim|required');
$this->form_validation->set_rules('url_gambar', 'url gambar', 'trim|required');

$this->form_validation->set_rules('id_film', 'id_film', 'trim');
$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

}
