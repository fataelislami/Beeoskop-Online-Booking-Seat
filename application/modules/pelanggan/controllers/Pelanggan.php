<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data = array(
    'contain_view' => 'pelanggan/home_v',
    'sidebar'=>'pelanggan/sidebar',//Ini buat menu yang ditampilkan di module pelanggan {DIKIRIM KE TEMPLATE}
    'css'=>'pelanggan/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
    'script'=>'pelanggan/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
    'nama'=>'pelanggan',//ngirim variable ke view yang ada di module pelanggan {DIKIRIM KE VIEW pelanggan}
   );
  // $this->load->view('home_v', $data);
  $this->template->load($data);

  }

}
