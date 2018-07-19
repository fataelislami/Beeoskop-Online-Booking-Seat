<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jam_tayang extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Jam_tayang_model'));
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
    $datajam=$this->Jam_tayang_model->get_all();//panggil ke modell
    $data = array(
      'contain_view' => 'admin/jam_tayang/vTable',
      'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
      'css'=>'admin/jam_tayang/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
      'script'=>'admin/jam_tayang/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
      'datajam'=>$datajam,//ngirim variable ke view yang ada di module admin {DIKIRIM KE VIEW ADMIN}
     );
    // $this->load->view('home_v', $data);
    $this->template->load($data);
  }

  function tambah(){
    $data = array(
      'contain_view' => 'admin/jam_tayang/vCreate',
      'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
      'css'=>'admin/jam_tayang/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
      'script'=>'admin/jam_tayang/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
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
  'jam_tayang' => $this->input->post('jam_tayang',TRUE),
    );

          $this->Jam_tayang_model->insert($data);
          $this->session->set_flashdata('message', 'Create Record Success');
          redirect(site_url('admin/jam_tayang'));
      }
  }

  public function update($id)
  {
      $row = $this->Jam_tayang_model->get_by_id($id);

      if ($row) {
          $data = array(
              'button' => 'Update',
              'action' => site_url('admin/jam_tayang/update_action'),
  'id_jam_tayang' => set_value('id_jam_tayang', $row->id_jam_tayang),
  'jam_tayang' => set_value('jam_tayang', $row->jam_tayang),
    );
          $this->load->view('jam_tayang/jam_tayang_form', $data);
      } else {
          $this->session->set_flashdata('message', 'Record Not Found');
          redirect(site_url('admin/jam_tayang'));
      }
  }

  public function update_action()
  {
      $this->_rules();

      if ($this->form_validation->run() == FALSE) {
          $this->update($this->input->post('id_jam_tayang', TRUE));
      } else {
          $data = array(
  'jam_tayang' => $this->input->post('jam_tayang',TRUE),
    );

          $this->Jam_tayang_model->update($this->input->post('id_jam_tayang', TRUE), $data);
          $this->session->set_flashdata('message', 'Update Record Success');
          redirect(site_url('jam_tayang'));
      }
  }

  public function delete($id)
  {
      $row = $this->Jam_tayang_model->get_by_id($id);

      if ($row) {
          $this->Jam_tayang_model->delete($id);
          $this->session->set_flashdata('message', 'Delete Record Success');
          redirect(site_url('jam_tayang'));
      } else {
          $this->session->set_flashdata('message', 'Record Not Found');
          redirect(site_url('jam_tayang'));
      }
  }

  public function _rules()
  {
$this->form_validation->set_rules('jam_tayang', 'jam tayang', 'trim|required');

$this->form_validation->set_rules('id_jam_tayang', 'id_jam_tayang', 'trim');
$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

}
