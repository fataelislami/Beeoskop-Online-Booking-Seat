<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konfirmasi extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Konfirmasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $datakonfirmasi=$this->Konfirmasi_model->get_all();//panggil ke modell
      $datafield=$this->Konfirmasi_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => '{namamodule}/konfirmasi/konfirmasi_list',
        'sidebar'=>'{namamodule}/sidebar',
        'css'=>'{namamodule}/crudassets/css',
        'script'=>'{namamodule}/crudassets/script',
        'datakonfirmasi'=>$datakonfirmasi,
        'datafield'=>$datafield,
        'module'=>'{namamodule}'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => '{namamodule}/konfirmasi/konfirmasi_form',
        'sidebar'=>'{namamodule}/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'{namamodule}/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'{namamodule}/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'{namamodule}/konfirmasi/create_action'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Konfirmasi_model->get_by_id($id);
      $data = array(
        'contain_view' => '{namamodule}/konfirmasi/konfirmasi_edit',
        'sidebar'=>'{namamodule}/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'{namamodule}/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'{namamodule}/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'{namamodule}/konfirmasi/update_action',
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
		'username' => $this->input->post('username',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'jumlah_pembayaran' => $this->input->post('jumlah_pembayaran',TRUE),
		'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran',TRUE),
		'bank_asal' => $this->input->post('bank_asal',TRUE),
		'no_rekening' => $this->input->post('no_rekening',TRUE),
		'atas_nama' => $this->input->post('atas_nama',TRUE),
		'bank_tujuan' => $this->input->post('bank_tujuan',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'foto' => $this->input->post('foto',TRUE),
	    );

            $this->Konfirmasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('{namamodule}/konfirmasi'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_konfirmasi', TRUE));
        } else {
            $data = array(
		'id_transaksi' => $this->input->post('id_transaksi',TRUE),
		'username' => $this->input->post('username',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'jumlah_pembayaran' => $this->input->post('jumlah_pembayaran',TRUE),
		'tanggal_pembayaran' => $this->input->post('tanggal_pembayaran',TRUE),
		'bank_asal' => $this->input->post('bank_asal',TRUE),
		'no_rekening' => $this->input->post('no_rekening',TRUE),
		'atas_nama' => $this->input->post('atas_nama',TRUE),
		'bank_tujuan' => $this->input->post('bank_tujuan',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'foto' => $this->input->post('foto',TRUE),
	    );

            $this->Konfirmasi_model->update($this->input->post('id_konfirmasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('{namamodule}/konfirmasi'));
        }
    }

    public function delete($id)
    {
        $row = $this->Konfirmasi_model->get_by_id($id);

        if ($row) {
            $this->Konfirmasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('{namamodule}/konfirmasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('{namamodule}/konfirmasi'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_transaksi', 'id transaksi', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('jumlah_pembayaran', 'jumlah pembayaran', 'trim|required');
	$this->form_validation->set_rules('tanggal_pembayaran', 'tanggal pembayaran', 'trim|required');
	$this->form_validation->set_rules('bank_asal', 'bank asal', 'trim|required');
	$this->form_validation->set_rules('no_rekening', 'no rekening', 'trim|required');
	$this->form_validation->set_rules('atas_nama', 'atas nama', 'trim|required');
	$this->form_validation->set_rules('bank_tujuan', 'bank tujuan', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');

	$this->form_validation->set_rules('id_konfirmasi', 'id_konfirmasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}