<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $datatransaksi=$this->Transaksi_model->get_all();//panggil ke modell
      $datafield=$this->Transaksi_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'pelanggan/transaksi/transaksi_list',
        'sidebar'=>'pelanggan/sidebar',
        'css'=>'pelanggan/crudassets/css',
        'script'=>'pelanggan/crudassets/script',
        'datatransaksi'=>$datatransaksi,
        'datafield'=>$datafield,
        'module'=>'pelanggan'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'pelanggan/transaksi/transaksi_form',
        'sidebar'=>'pelanggan/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'pelanggan/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'pelanggan/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'pelanggan/transaksi/create_action'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Transaksi_model->get_by_id($id);
      $data = array(
        'contain_view' => 'pelanggan/transaksi/transaksi_edit',
        'sidebar'=>'pelanggan/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'pelanggan/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'pelanggan/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'pelanggan/transaksi/update_action',
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
		'tanggal_bayar' => $this->input->post('tanggal_bayar',TRUE),
		'total' => $this->input->post('total',TRUE),
		'jumlah_tiket' => $this->input->post('jumlah_tiket',TRUE),
		'status' => $this->input->post('status',TRUE),
		'username' => $this->input->post('username',TRUE),
	    );

            $this->Transaksi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pelanggan/transaksi'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaksi', TRUE));
        } else {
            $data = array(
		'tanggal_bayar' => $this->input->post('tanggal_bayar',TRUE),
		'total' => $this->input->post('total',TRUE),
		'jumlah_tiket' => $this->input->post('jumlah_tiket',TRUE),
		'status' => $this->input->post('status',TRUE),
		'username' => $this->input->post('username',TRUE),
	    );

            $this->Transaksi_model->update($this->input->post('id_transaksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pelanggan/transaksi'));
        }
    }

    public function delete($id)
    {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pelanggan/transaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelanggan/transaksi'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('tanggal_bayar', 'tanggal bayar', 'trim|required');
	$this->form_validation->set_rules('total', 'total', 'trim|required');
	$this->form_validation->set_rules('jumlah_tiket', 'jumlah tiket', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');

	$this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
