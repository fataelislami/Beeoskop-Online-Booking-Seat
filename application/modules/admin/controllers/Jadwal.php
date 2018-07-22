<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jadwal extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $datajadwal=$this->Jadwal_model->getJoin()->result();//panggil ke modell
      $datafield=$this->Jadwal_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'admin/jadwal/jadwal_list',
        'sidebar'=>'admin/sidebar',
        'css'=>'admin/jadwal/assets/css',
        'script'=>'admin/jadwal/assets/script',
        'datajadwal'=>$datajadwal,
        'datafield'=>$datafield,
        'module'=>'admin'
       );
      $this->template->load($data);
    }

    public function create(){
      $data = array(
        'contain_view' => 'admin/jadwal/jadwal_form',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/jadwal/assets/css',
        'script'=>'admin/jadwal/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/jadwal/create_action'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Jadwal_model->get_by_id($id);
      $data = array(
        'contain_view' => 'admin/jadwal/jadwal_edit',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/jadwal/update_action',
        'dataedit'=>$dataedit
       );
      $this->template->load($data);
    }


    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_studio' => $this->input->post('id_studio',TRUE),
		'id_film' => $this->input->post('id_film',TRUE),
		'id_jam_tayang' => $this->input->post('id_jam_tayang',TRUE),
	    );

            $this->Jadwal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/jadwal'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jadwal', TRUE));
        } else {
            $data = array(
		'id_studio' => $this->input->post('id_studio',TRUE),
		'id_film' => $this->input->post('id_film',TRUE),
		'id_jam_tayang' => $this->input->post('id_jam_tayang',TRUE),
	    );

            $this->Jadwal_model->update($this->input->post('id_jadwal', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/jadwal'));
        }
    }

    public function delete($id)
    {
        $row = $this->Jadwal_model->get_by_id($id);

        if ($row) {
            $this->Jadwal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/jadwal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/jadwal'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_studio', 'id studio', 'trim|required');
	$this->form_validation->set_rules('id_film', 'id film', 'trim|required');
	$this->form_validation->set_rules('id_jam_tayang', 'id jam tayang', 'trim|required');

	$this->form_validation->set_rules('id_jadwal', 'id_jadwal', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
