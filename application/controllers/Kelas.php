<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data['kelas'] = $this->db->get('tb_ruang_kelas');
		$this->load->view('header');
		$this->load->view('data-kelas', $data);
		$this->load->view('modal');
		$this->load->view('footer');
	}

	public function simpan()
	{
		$nama = $this->input->post('nama', TRUE);
		$lokasi = $this->input->post('lokasi', TRUE);
		$status = $this->input->post('status', TRUE);

		$data = [
			'nama_kelas' => htmlspecialchars($nama),
			'lokasi_kelas' => htmlspecialchars($lokasi),
			'status_kelas' => $status
		];
		$this->db->insert('tb_ruang_kelas', $data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message role="alert">
			Data berhasil ditambahkan!!.</div>');
		redirect(base_url('Kelas'));
	}
	public function showKelas()
	{
		$id = $this->uri->segment(3);
		$kelas = $this->db->get_where('tb_ruang_kelas', array('id_kelas', $id));
		$this->db->where('id_kelas', $id);
		$kelas = $this->db->get('tb_ruang_kelas')->row_array();
		// var_dump($id);
		header('Content-Type: application/json');
		echo json_encode($kelas);
	}

	public function updateKelas()
	{
		$id = $this->input->post('id', TRUE);
		$nama = $this->input->post('nama', TRUE);
		$lokasi = $this->input->post('lokasi', TRUE);
		$status = $this->input->post('status', TRUE);

		$myData = [
			'nama_kelas' => $nama,
			'lokasi_kelas' => $lokasi,
			'status_kelas' => $status
		];
		$this->db->where('id_kelas', $id);
		$this->db->update('tb_ruang_kelas', $myData);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message role="alert">
			Data berhasil diupdate.</div>');
		redirect(base_url('Kelas'));
	}

	public function hapus()
	{
		$id = $this->uri->segment(3);
		$this->db->where('id_kelas', $id);
		$this->db->delete('tb_ruang_kelas');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message role="alert">
				Data berhasil dihapus!!.</div>');
		redirect(base_url('Kelas'));
	}


}