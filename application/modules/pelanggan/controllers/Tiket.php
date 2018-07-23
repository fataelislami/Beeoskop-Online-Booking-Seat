<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tiket extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Tiket_model','Transaksi_model'));
        $this->load->library('form_validation');
        if($this->session->userdata('status')!='login'){
          redirect(base_url('login'));
        }
        if($this->session->userdata('role')!=2){
          redirect(redirect($_SERVER['HTTP_REFERER']));
        }
    }

    public function index()
    {

      $datatiket=$this->Tiket_model->get_all();//panggil ke modell
      $datafield=$this->Tiket_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'pelanggan/tiket/tiket_list',
        'sidebar'=>'pelanggan/sidebar',
        'css'=>'pelanggan/crudassets/css',
        'script'=>'pelanggan/crudassets/script',
        'datatiket'=>$datatiket,
        'datafield'=>$datafield,
        'module'=>'pelanggan'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'pelanggan/tiket/tiket_form',
        'sidebar'=>'pelanggan/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'pelanggan/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'pelanggan/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'pelanggan/tiket/create_action'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Tiket_model->get_by_id($id);
      $data = array(
        'contain_view' => 'pelanggan/tiket/tiket_edit',
        'sidebar'=>'pelanggan/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'pelanggan/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'pelanggan/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'pelanggan/tiket/update_action',
        'dataedit'=>$dataedit
       );
      $this->template->load($data);
    }

    //ADD TESTING
    function testing(){
      if(isset($_POST['submit'])){
        $id_studio=$_POST['studio'];
        $id_film=$_POST['movie'];
        $id_jam_tayang=$_POST['waktu'];
        $tanggal_tayang=$_POST['tanggal'];
        $id_jadwal=$this->Tiket_model->get_id_jadwal($id_studio,$id_film,$id_jam_tayang);
        $dataKursi=$_POST['kursi'];
        $username=$this->session->userdata('username');
        $jumlahTiket=count($dataKursi);
        //Data Transaksi
        $idTransaksi="TR-".$this->randomString();
        $totalHarga=$jumlahTiket*35000;

        //PROSES INSERT Transaksi
        $data=array(
          'id_transaksi'=>$idTransaksi,
          'total'=>$totalHarga,
          'jumlah_tiket'=>$jumlahTiket,
          'username'=>$username
        );
        $this->Transaksi_model->insert($data);
        //END PROSES

        //PROSES INSERT TIKET
        foreach ($dataKursi as $k) {
          $pecahKursi=explode("_",$k);
          $no_baris=$pecahKursi[0];
          $no_kursi=$pecahKursi[1];
          $getIdKursi=$this->Tiket_model->get_id_kursi($no_baris,$no_kursi);
          $id_kursi=$getIdKursi->id_kursi;
          $data=array(
            'id_transaksi'=>$idTransaksi,
            'id_jadwal'=>$id_jadwal->id_jadwal,
            'id_kursi'=>$id_kursi,
            'tanggal_tayang'=>$tanggal_tayang,
            'username'=>$username
          );
          $this->Tiket_model->insert($data);
          // echo "Id Kursi ".$id_kursi."<br>";
          // echo "No Kursi : ".$k."<br>";
          // echo "Id Transaksi : ".$idTransaksi."<br>";
          // echo "Id_Jadwal : ".$id_jadwal->id_jadwal."<br>";
          // echo "Tanggal_Tayang : ".$tanggal_tayang."<br>";
          // echo "Username  : ".$username."<br>-----<br>";
          echo "Sukses";
        }
        //PROSES INSERT TIKET

        // var_dump($dataKursi);
      }
    }
    //ADD TESTING

    function randomString($length = 3) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
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
	    );

            $this->Tiket_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pelanggan/tiket'));
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
	    );

            $this->Tiket_model->update($this->input->post('id_tiket', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pelanggan/tiket'));
        }
    }

    public function delete($id)
    {
        $row = $this->Tiket_model->get_by_id($id);

        if ($row) {
            $this->Tiket_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pelanggan/tiket'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelanggan/tiket'));
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
