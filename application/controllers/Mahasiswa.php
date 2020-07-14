<?php 

class Mahasiswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Mahasiswa_model');
	}

	public function index()
	{
		$data = [
			'judul' => "Daftar Mahasiswa",
			'mahasiswa' => $this->Mahasiswa_model->getAllMahasiswa()
		];
		if ($this->input->post('keyword')) {
			$data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('mahasiswa/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		$data['judul'] = "Tambah Data Mahasiswa";
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nrp', 'Nrp', 'required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('mahasiswa/tambah');
			$this->load->view('templates/footer');
		} else {
			$this->Mahasiswa_model->tambahDataMahasiswa();
			$this->session->set_flashdata('pesan', 'Ditambahkan');
			redirect('mahasiswa');
		}
	}

	public function hapus($id)
	{
		$this->Mahasiswa_model->hapusDataMahasiswa($id);
		$this->session->set_flashdata('pesan', 'Dihapus');
		redirect('mahasiswa');
	}

	public function detail($id)
	{
		$data = [
			'judul' => "Detail Mahasiswa",
			'mahasiswa' => $this->Mahasiswa_model->getMahaSiswaById($id)
		];
		$this->load->view('templates/header', $data);
		$this->load->view('mahasiswa/detail', $data);
		$this->load->view('templates/footer');
	}

	public function ubah($id)
	{
		$data = [
			'judul' => "Ubah Data Mahasiswa",
			'mahasiswa' => $this->Mahasiswa_model->getMahaSiswaById($id),
			'jurusan' => [
				'Teknik Informatika',
				'Teknik Industri',
				'Teknik Pangan',
				'Teknik Mesin',
				'Teknik Planologi',
				'Teknik Lingkungan'
			]
		];
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nrp', 'Nrp', 'required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('mahasiswa/ubah', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Mahasiswa_model->ubahDataMahasiswa();
			$this->session->set_flashdata('pesan', 'Diubah');
			redirect('mahasiswa');
		}
	}
}