<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kursi extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kursi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $datakursi=$this->Kursi_model->get_all();//panggil ke modell
      $datafield=$this->Kursi_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'admin/kursi/kursi_list',
        'sidebar'=>'admin/sidebar',
        'css'=>'admin/crudassets/css',
        'script'=>'admin/crudassets/script',
        'datakursi'=>$datakursi,
        'datafield'=>$datafield,
        'module'=>'admin'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'admin/kursi/kursi_form',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/kursi/create_action'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Kursi_model->get_by_id($id);
      $data = array(
        'contain_view' => 'admin/kursi/kursi_edit',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/kursi/update_action',
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
		'no_kursi' => $this->input->post('no_kursi',TRUE),
	    );

            $this->Kursi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/kursi'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kursi', TRUE));
        } else {
            $data = array(
		'no_kursi' => $this->input->post('no_kursi',TRUE),
	    );

            $this->Kursi_model->update($this->input->post('id_kursi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/kursi'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kursi_model->get_by_id($id);

        if ($row) {
            $this->Kursi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/kursi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/kursi'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('no_kursi', 'no kursi', 'trim|required');

	$this->form_validation->set_rules('id_kursi', 'id_kursi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
