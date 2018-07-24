<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Genre extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status')!='login'){
          redirect(base_url('login'));
        }
        if($this->session->userdata('role')!=1){
          redirect(redirect($_SERVER['HTTP_REFERER']));
        }
        $this->load->model('Genre_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $datagenre=$this->Genre_model->get_all();//panggil ke modell
      $datafield=$this->Genre_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'admin/genre/genre_list',
        'sidebar'=>'admin/sidebar',
        'css'=>'admin/crudassets/css',
        'script'=>'admin/crudassets/script',
        'datagenre'=>$datagenre,
        'datafield'=>$datafield,
        'module'=>'admin'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'admin/genre/genre_form',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/genre/create_action'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Genre_model->get_by_id($id);
      $data = array(
        'contain_view' => 'admin/genre/genre_edit',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/genre/update_action',
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
		'nama_genre' => $this->input->post('nama_genre',TRUE),
	    );

            $this->Genre_model->insert($data);
            $this->session->set_flashdata('flashMessage', 'Data telah berhasil ditambahkan');
            redirect(site_url('admin/genre'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_genre', TRUE));
        } else {
            $data = array(
		'nama_genre' => $this->input->post('nama_genre',TRUE),
	    );

            $this->Genre_model->update($this->input->post('id_genre', TRUE), $data);
            $this->session->set_flashdata('flashMessage', 'Data telah berhasil diupdate');
            redirect(site_url('admin/genre'));
        }
    }

    public function delete($id)
    {
        $row = $this->Genre_model->get_by_id($id);

        if ($row) {
            $this->Genre_model->delete($id);
            $this->session->set_flashdata('flashMessage', 'Data telah berhasil dihapus');
            redirect(site_url('admin/genre'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/genre'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama_genre', 'nama genre', 'trim|required');

	$this->form_validation->set_rules('id_genre', 'id_genre', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
