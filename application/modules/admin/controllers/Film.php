<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Film extends MY_Controller{
// test
  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Film_model','Genre_model','Film_genre'));
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
    $datafilm=$this->Film_model->get_all();//panggil ke model
    $data = array(
      'contain_view' => 'admin/film/vTable',
      'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
      'css'=>'admin/film/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
      'script'=>'admin/film/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
      'datafilm'=>$datafilm,//ngirim variable ke view yang ada di module admin {DIKIRIM KE VIEW ADMIN}
      'module'=>'admin'
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

  function edit($id){
    $datafilm=$this->Film_model->get_by_id($id);
    $datagenre=$this->Film_genre->genrebyfilm($id);//panggil ke modell
    $arr=[];
    foreach ($datagenre as $d) {
      array_push($arr,$d->id_genre);
    }//panggil ke modell
    $data = array(
      'contain_view' => 'admin/film/vEdit',
      'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
      'css'=>'admin/film/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
      'script'=>'admin/film/assets/scriptEdit',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
      'nama'=>'ADMIN',
      'datafilm'=>$datafilm,
      'datagenre'=>$arr//ngirim variable ke view yang ada di module admin {DIKIRIM KE VIEW ADMIN}
     );
    // $this->load->view('home_v', $data);
    $this->template->load($data);
  }

  public function delete($id)
  {
      $row = $this->Film_model->get_by_id($id);

      if ($row) {
          $this->Film_model->delete($id);
          $this->session->set_flashdata('flashMessage', 'Data telah berhasil dihapus');
          redirect(site_url('admin/film'));
      } else {
          $this->session->set_flashdata('message', 'Record Not Found');
          redirect(site_url('admin/film'));
      }
  }

  public function create_action()
  {

      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
          $this->tambah();
      } else {
        $foto=$this->upload_foto();
          $data = array(
  'id_film' => $this->input->post('id_film',TRUE),
  'judul_film' => $this->input->post('judul_film',TRUE),
  'tahun_produksi' => $this->input->post('tahun_produksi',TRUE),
  'sinopsis' => $this->input->post('sinopsis',TRUE),
  'durasi' => $this->input->post('durasi',TRUE),
  'tanggal_mulai' => $this->input->post('tanggal_mulai',TRUE),
  'tanggal_selesai' => $this->input->post('tanggal_selesai',TRUE),
  'url_gambar' =>$foto['file_name'],
    );

          $this->Film_model->insert($data);

          if(isset($_POST['genre'])){
            $genre=$_POST['genre'];
            foreach ($genre as $k) {
              $data=array(
                'id_film'=>$this->input->post('id_film',TRUE),
                'id_genre'=>$k
              );
              $this->Film_genre->insert($data);
              # code...
            }
          }
          $this->session->set_flashdata('flashMessage', 'Data telah berhasil ditambahkan');
          redirect(site_url('admin/film'));
      }
  }

  public function update_action()
  {

      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
          $this->edit($this->input->post('id_film', TRUE));
      } else {
        $foto=$this->upload_foto();
          $data = array(
  'judul_film' => $this->input->post('judul_film',TRUE),
  'tahun_produksi' => $this->input->post('tahun_produksi',TRUE),
  'sinopsis' => $this->input->post('sinopsis',TRUE),
  'durasi' => $this->input->post('durasi',TRUE),
  'tanggal_mulai' => $this->input->post('tanggal_mulai',TRUE),
  'tanggal_selesai' => $this->input->post('tanggal_selesai',TRUE),
  'url_gambar' =>$foto['file_name'],
    );

          $this->Film_model->update($this->input->post('id_film', TRUE), $data);
          //Delete Film Genre Berdasarkan Checkbox
          if(isset($_POST['genre'])){
            foreach ($_POST['genre'] as $k) {
              $data=array(
                'id_film'=>$_POST['id_film'],
                'id_genre'=>$k
              );
              $sql=$this->Film_genre->insert($data);
              if($sql){
                echo "sukses";
              }else{
                echo "gagal";
              }
            }
            //FUNGSI UNTUK DELETE FILM YANG ID FILM DAN ID GENRE DILUAR DATA ARRAY
            $this->Film_genre->delete($_POST['id_film'],$_POST['genre']);

          }else{
            //KALO CHEKBOX TIDAK DICEK SEMUA DELETE ALL
            $this->Film_genre->deleteAll($_POST['id_film']);
          }
          //Delete Film Genre Berdasarkan Checkbox
          $this->session->set_flashdata('flashMessage', 'Data telah berhasil diupdate');
          redirect(site_url('admin/film'));
      }
  }



  public function upload_foto(){
  $config['upload_path']          = './assets/film-image';
  $config['allowed_types']        = 'gif|jpg|png|jpeg';
  $config['encrypt_name'] = TRUE;
  //$config['max_size']             = 100;
  //$config['max_width']            = 1024;
  //$config['max_height']           = 768;
  $this->load->library('upload', $config);
  $this->upload->do_upload('url_gambar');
  return $this->upload->data();
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

$this->form_validation->set_rules('id_film', 'id_film', 'trim');
$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

}
