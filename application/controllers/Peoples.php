<?php 

class Peoples extends CI_Controller
{

	public function index()
	{
		$this->load->model('Peoples_model', 'peoples');
		$this->load->library('pagination');

		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		$this->db->like('name', $data['keyword']);
		$this->db->like('email', $data['keyword']);
		$this->db->like('address', $data['keyword']);
		$this->db->from('peoples');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 7;

		$data['judul'] = "List Of Peoples";
		$data['start'] = $this->uri->segment(3);

		$this->pagination->initialize($config);

		$data['peoples'] = $this->peoples->getPeoples($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('templates/header', $data);
		$this->load->view('peoples/index', $data);
		$this->load->view('templates/footer');
	}
}