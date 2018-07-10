<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Film extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Film_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'film/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'film/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'film/index.html';
            $config['first_url'] = base_url() . 'film/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Film_model->total_rows($q);
        $film = $this->Film_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'film_data' => $film,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('film/film_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Film_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_film' => $row->id_film,
		'judul_film' => $row->judul_film,
		'tahun_produksi' => $row->tahun_produksi,
		'sinopsis' => $row->sinopsis,
		'durasi' => $row->durasi,
		'tanggal_mulai' => $row->tanggal_mulai,
		'tanggal_selesai' => $row->tanggal_selesai,
		'url_gambar' => $row->url_gambar,
	    );
            $this->load->view('film/film_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('film'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('film/create_action'),
	    'id_film' => set_value('id_film'),
	    'judul_film' => set_value('judul_film'),
	    'tahun_produksi' => set_value('tahun_produksi'),
	    'sinopsis' => set_value('sinopsis'),
	    'durasi' => set_value('durasi'),
	    'tanggal_mulai' => set_value('tanggal_mulai'),
	    'tanggal_selesai' => set_value('tanggal_selesai'),
	    'url_gambar' => set_value('url_gambar'),
	);
        $this->load->view('film/film_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'judul_film' => $this->input->post('judul_film',TRUE),
		'tahun_produksi' => $this->input->post('tahun_produksi',TRUE),
		'sinopsis' => $this->input->post('sinopsis',TRUE),
		'durasi' => $this->input->post('durasi',TRUE),
		'tanggal_mulai' => $this->input->post('tanggal_mulai',TRUE),
		'tanggal_selesai' => $this->input->post('tanggal_selesai',TRUE),
		'url_gambar' => $this->input->post('url_gambar',TRUE),
	    );

            $this->Film_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('film'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Film_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('film/update_action'),
		'id_film' => set_value('id_film', $row->id_film),
		'judul_film' => set_value('judul_film', $row->judul_film),
		'tahun_produksi' => set_value('tahun_produksi', $row->tahun_produksi),
		'sinopsis' => set_value('sinopsis', $row->sinopsis),
		'durasi' => set_value('durasi', $row->durasi),
		'tanggal_mulai' => set_value('tanggal_mulai', $row->tanggal_mulai),
		'tanggal_selesai' => set_value('tanggal_selesai', $row->tanggal_selesai),
		'url_gambar' => set_value('url_gambar', $row->url_gambar),
	    );
            $this->load->view('film/film_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('film'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_film', TRUE));
        } else {
            $data = array(
		'judul_film' => $this->input->post('judul_film',TRUE),
		'tahun_produksi' => $this->input->post('tahun_produksi',TRUE),
		'sinopsis' => $this->input->post('sinopsis',TRUE),
		'durasi' => $this->input->post('durasi',TRUE),
		'tanggal_mulai' => $this->input->post('tanggal_mulai',TRUE),
		'tanggal_selesai' => $this->input->post('tanggal_selesai',TRUE),
		'url_gambar' => $this->input->post('url_gambar',TRUE),
	    );

            $this->Film_model->update($this->input->post('id_film', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('film'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Film_model->get_by_id($id);

        if ($row) {
            $this->Film_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('film'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('film'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul_film', 'judul film', 'trim|required');
	$this->form_validation->set_rules('tahun_produksi', 'tahun produksi', 'trim|required');
	$this->form_validation->set_rules('sinopsis', 'sinopsis', 'trim|required');
	$this->form_validation->set_rules('durasi', 'durasi', 'trim|required');
	$this->form_validation->set_rules('tanggal_mulai', 'tanggal mulai', 'trim|required');
	$this->form_validation->set_rules('tanggal_selesai', 'tanggal selesai', 'trim|required');
	$this->form_validation->set_rules('url_gambar', 'url gambar', 'trim|required');

	$this->form_validation->set_rules('id_film', 'id_film', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Film.php */
/* Location: ./application/controllers/Film.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-10 22:05:15 */
/* http://harviacode.com */