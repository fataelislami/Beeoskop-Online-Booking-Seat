<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Genre extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Genre_model'));
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
    $datagenre=$this->Genre_model->get_all();//panggil ke modell
    $data = array(
      'contain_view' => 'admin/genre/vTable',
      'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
      'css'=>'admin/genre/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
      'script'=>'admin/genre/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
      'datagenre'=>$datagenre,//ngirim variable ke view yang ada di module admin {DIKIRIM KE VIEW ADMIN}
     );
    // $this->load->view('home_v', $data);
    $this->template->load($data);
  }

  function tambah(){
    $data = array(
      'contain_view' => 'admin/genre/vCreate',
      'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
      'css'=>'admin/genre/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
      'script'=>'admin/genre/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
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
  'nama_genre' => $this->input->post('nama_genre',TRUE),
    );

          $this->Genre_model->insert($data);
          $this->session->set_flashdata('message', 'Create Record Success');
          redirect(site_url('admin/genre'));
      }
  }


function cekdb(){
  // $datafilm=$this->Film_model->get_all();//panggil ke modell
  // var_dump($datafilm);
}

  //VALIDASI
  public function _rules()
  {
$this->form_validation->set_rules('nama_genre', 'nama genre', 'trim|required');

$this->form_validation->set_rules('id_genre', 'id_genre', 'trim');
$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

}
