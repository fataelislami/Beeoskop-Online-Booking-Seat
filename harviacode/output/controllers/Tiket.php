<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tiket extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tiket_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $datatiket=$this->Tiket_model->get_all();//panggil ke modell
      $datafield=$this->Tiket_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => '{namamodule}/tiket/tiket_list',
        'sidebar'=>'{namamodule}/sidebar',
        'css'=>'{namamodule}/crudassets/css',
        'script'=>'{namamodule}/crudassets/script',
        'datatiket'=>$datatiket,
        'datafield'=>$datafield,
        'module'=>'{namamodule}'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => '{namamodule}/tiket/tiket_form',
        'sidebar'=>'{namamodule}/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'{namamodule}/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'{namamodule}/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'{namamodule}/tiket/create_action'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Tiket_model->get_by_id($id);
      $data = array(
        'contain_view' => '{namamodule}/tiket/tiket_edit',
        'sidebar'=>'{namamodule}/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'{namamodule}/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'{namamodule}/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'{namamodule}/tiket/update_action',
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
		'id_transaksi' => $this->input->post('id_transaksi',TRUE),
		'id_jadwal' => $this->input->post('id_jadwal',TRUE),
		'id_kursi' => $this->input->post('id_kursi',TRUE),
		'tanggal_tayang' => $this->input->post('tanggal_tayang',TRUE),
		'username' => $this->input->post('username',TRUE),
		'date_create' => $this->input->post('date_create',TRUE),
	    );

            $this->Tiket_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('{namamodule}/tiket'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tiket', TRUE));
        } else {
            $data = array(
		'id_transaksi' => $this->input->post('id_transaksi',TRUE),
		'id_jadwal' => $this->input->post('id_jadwal',TRUE),
		'id_kursi' => $this->input->post('id_kursi',TRUE),
		'tanggal_tayang' => $this->input->post('tanggal_tayang',TRUE),
		'username' => $this->input->post('username',TRUE),
		'date_create' => $this->input->post('date_create',TRUE),
	    );

            $this->Tiket_model->update($this->input->post('id_tiket', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('{namamodule}/tiket'));
        }
    }

    public function delete($id)
    {
        $row = $this->Tiket_model->get_by_id($id);

        if ($row) {
            $this->Tiket_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('{namamodule}/tiket'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('{namamodule}/tiket'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_transaksi', 'id transaksi', 'trim|required');
	$this->form_validation->set_rules('id_jadwal', 'id jadwal', 'trim|required');
	$this->form_validation->set_rules('id_kursi', 'id kursi', 'trim|required');
	$this->form_validation->set_rules('tanggal_tayang', 'tanggal tayang', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('date_create', 'date create', 'trim|required');

	$this->form_validation->set_rules('id_tiket', 'id_tiket', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}