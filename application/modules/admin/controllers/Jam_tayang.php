<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jam_tayang extends MY_Controller
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
        $this->load->model('Jam_tayang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $datajam_tayang=$this->Jam_tayang_model->get_all();//panggil ke modell
      $datafield=$this->Jam_tayang_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'admin/jam_tayang/jam_tayang_list',
        'sidebar'=>'admin/sidebar',
        'css'=>'admin/crudassets/css',
        'script'=>'admin/crudassets/script',
        'datajam_tayang'=>$datajam_tayang,
        'datafield'=>$datafield,
        'module'=>'admin'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'admin/jam_tayang/jam_tayang_form',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/jam_tayang/create_action'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Jam_tayang_model->get_by_id($id);
      $data = array(
        'contain_view' => 'admin/jam_tayang/jam_tayang_edit',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/jam_tayang/update_action',
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
		'jam_tayang' => $this->input->post('jam_tayang',TRUE),
	    );

            $this->Jam_tayang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/jam_tayang'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jam_tayang', TRUE));
        } else {
            $data = array(
		'jam_tayang' => $this->input->post('jam_tayang',TRUE),
	    );

            $this->Jam_tayang_model->update($this->input->post('id_jam_tayang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/jam_tayang'));
        }
    }

    public function delete($id)
    {
        $row = $this->Jam_tayang_model->get_by_id($id);

        if ($row) {
            $this->Jam_tayang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/jam_tayang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/jam_tayang'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('jam_tayang', 'jam tayang', 'trim|required');

	$this->form_validation->set_rules('id_jam_tayang', 'id_jam_tayang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
