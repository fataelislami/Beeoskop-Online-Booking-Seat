<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
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

      $datauser=$this->User_model->get_all();//panggil ke modell
      $datafield=$this->User_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'admin/user/user_list',
        'sidebar'=>'admin/sidebar',
        'css'=>'admin/crudassets/css',
        'script'=>'admin/crudassets/script',
        'datauser'=>$datauser,
        'datafield'=>$datafield,
        'module'=>'admin'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'admin/user/user_form',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/user/create_action'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->User_model->get_by_id($id);
      $data = array(
        'contain_view' => 'admin/user/user_read',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/user/update_action',
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
              'username' => $this->input->post('username',TRUE),
		'password' => md5($this->input->post('password',TRUE)),
		'nama' => $this->input->post('nama',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'email' => $this->input->post('email',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'id_level' => $this->input->post('id_level',TRUE),
	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/user'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('username', TRUE));
        } else {
            $data = array(
		'password' => md5($this->input->post('password',TRUE)),
		'nama' => $this->input->post('nama',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'email' => $this->input->post('email',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'id_level' => $this->input->post('id_level',TRUE),
	    );

            $this->User_model->update($this->input->post('username', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/user'));
        }
    }

    public function delete($id)
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/user'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('id_level', 'id level', 'trim|required');

	$this->form_validation->set_rules('username', 'username', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
