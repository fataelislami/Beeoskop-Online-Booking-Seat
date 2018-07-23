<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Studio extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Studio_model');
        $this->load->library('form_validation');
        if($this->session->userdata('status')!='login'){
          redirect(base_url('login'));
        }
        if($this->session->userdata('role')!=1){
          redirect(redirect($_SERVER['HTTP_REFERER']));
        }
    }

    public function index()
    {

      $datastudio=$this->Studio_model->get_all();//panggil ke modell
      $datafield=$this->Studio_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'admin/studio/studio_list',
        'sidebar'=>'admin/sidebar',
        'css'=>'admin/crudassets/css',
        'script'=>'admin/crudassets/script',
        'datastudio'=>$datastudio,
        'datafield'=>$datafield,
        'module'=>'admin'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'admin/studio/studio_form',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/studio/create_action'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Studio_model->get_by_id($id);
      $data = array(
        'contain_view' => 'admin/studio/studio_edit',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/studio/update_action',
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
		'nama_studio' => $this->input->post('nama_studio',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Studio_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/studio'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_studio', TRUE));
        } else {
            $data = array(
		'nama_studio' => $this->input->post('nama_studio',TRUE),
		'harga' => $this->input->post('harga',TRUE),
	    );

            $this->Studio_model->update($this->input->post('id_studio', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/studio'));
        }
    }

    public function delete($id)
    {
        $row = $this->Studio_model->get_by_id($id);

        if ($row) {
            $this->Studio_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/studio'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/studio'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama_studio', 'nama studio', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');

	$this->form_validation->set_rules('id_studio', 'id_studio', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
