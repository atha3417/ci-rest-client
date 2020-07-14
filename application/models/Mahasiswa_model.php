<?php 

use GuzzleHttp\Client;

class Mahasiswa_model extends CI_Model
{
	private $_CLIENT;

	public function __construct()
	{
		$this->_CLIENT = new Client([
			'base_uri' => 'http://localhost/atha-app/belajar/belajar-rest-api/wpu-rest-server/api/',
			'auth' => ['admin', 'htmlcssjsphp']
		]);
	}

	public function getAllMahasiswa()
	{
		$response = $this->_CLIENT->request('GET', 'mahasiswa', [
			'query' => [
				'WPU-key' => 'wpu123'
			]
		]);
		$result = json_decode($response->getBody()->getContents(), true);
		return $result['data'];
	}

	public function getMahaSiswaById($id)
	{
		$response = $this->_CLIENT->request('GET', 'mahasiswa', [
			'query' => [
				'WPU-key' => 'wpu123',
				'id' => $id
			]
		]);
		$result = json_decode($response->getBody()->getContents(), true);
		return $result['data'][0];
	}

	public function tambahDataMahasiswa()
	{
		$data = [
			'nama' => $this->input->post('nama', true),
			'nrp' => $this->input->post('nrp', true),
			'email' => $this->input->post('email', true),
			'jurusan' => $this->input->post('jurusan', true),
			'WPU-key' => 'wpu123'
		];
		$response = $this->_CLIENT->request('POST', 'mahasiswa', [
			'form_params' => $data
		]);
		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
	}

	public function hapusDataMahasiswa($id)
	{
		$response = $this->_CLIENT->request('DELETE', 'mahasiswa', [
			'form_params' => [
				'id' => $id,
				'WPU-key' => 'wpu123'
			]
		]);
		return $result;
	}

	public function ubahDataMahasiswa()
	{
		$data = [
			'nama' => $this->input->post('nama', true),
			'nrp' => $this->input->post('nrp', true),
			'email' => $this->input->post('email', true),
			'jurusan' => $this->input->post('jurusan', true),
			'id' => $this->input->post('id'),
			'WPU-key' => 'wpu123'
		];
		$response = $this->_CLIENT->request('PUT', 'mahasiswa', [
			'form_params' => $data
		]);
		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
	}

	public function cariDataMahasiswa()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->or_like('nama', $keyword);
		$this->db->or_like('nrp', $keyword);
		$this->db->or_like('email', $keyword);
		$this->db->or_like('jurusan', $keyword);
		return $this->db->get('mahasiswa')->result_array();
	}
}