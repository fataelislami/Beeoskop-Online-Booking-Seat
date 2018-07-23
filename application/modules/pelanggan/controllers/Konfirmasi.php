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
        'contain_view' => 'pelanggan/konfirmasi/konfirmasi_list',
        'sidebar'=>'pelanggan/sidebar',
        'css'=>'pelanggan/crudassets/css',
        'script'=>'pelanggan/crudassets/script',
        'datakonfirmasi'=>$datakonfirmasi,
        'datafield'=>$datafield,
        'module'=>'pelanggan'
       );
      $this->template->load($data);
    }


    public function create($id_transaksi=null){
      $data = array(
        'contain_view' => 'pelanggan/konfirmasi/konfirmasi_form',
        'sidebar'=>'pelanggan/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'pelanggan/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'pelanggan/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'pelanggan/konfirmasi/create_action',
        'id_transaksi'=>$id_transaksi
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Konfirmasi_model->get_by_id($id);
      $data = array(
        'contain_view' => 'pelanggan/konfirmasi/konfirmasi_edit',
        'sidebar'=>'pelanggan/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'pelanggan/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'pelanggan/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'pelanggan/konfirmasi/update_action',
        'dataedit'=>$dataedit
       );
      $this->template->load($data);
    }



    public function create_action()
    {

          $foto=$this->upload_foto_konfirmasi();
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
		'foto' => $foto['file_name']
	    );

            $this->Konfirmasi_model->insert($data);
            $this->session->set_flashdata('flashMessage', 'Konfirmasi Terkirim');
            redirect(site_url('pelanggan/transaksi'));

    }

    public function upload_foto_konfirmasi(){
  $config['upload_path']          = './assets/bukti-pembayaran';
  $config['allowed_types']        = 'gif|jpg|png|jpeg';
  $config['encrypt_name'] = TRUE;
  //$config['max_size']             = 100;
  //$config['max_width']            = 1024;
  //$config['max_height']           = 768;
  $this->load->library('upload', $config);
  $this->upload->do_upload('foto');
  return $this->upload->data();
}

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_konfirmasi', TRUE));
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
		'foto' => $this->input->post('foto',TRUE),
	    );

            $this->Konfirmasi_model->update($this->input->post('id_konfirmasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pelanggan/konfirmasi'));
        }
    }

    public function delete($id)
    {
        $row = $this->Konfirmasi_model->get_by_id($id);

        if ($row) {
            $this->Konfirmasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pelanggan/konfirmasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelanggan/konfirmasi'));
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
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');

	$this->form_validation->set_rules('id_konfirmasi', 'id_konfirmasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
