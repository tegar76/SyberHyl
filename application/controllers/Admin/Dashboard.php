<?php

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('JadwalModel', 'jadwal', true);
		$this->load->model('MasterModel', 'master', true);
		checkAdminLogin();
	}

	public function index()
	{
		isAdmin();
		$data['title'] = 'Dashboard Admin';
		$data['content'] = 'admin/contents/dashboard/v_dashboard';
		$data['teacherRow'] = $this->master->get_row_data('guru');
		$data['studentRow'] = $this->master->get_row_data('siswa');
		$data['classRow'] = $this->master->get_row_data('kelas');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detail_jadwal($id)
	{
		$this->load->view('detail_jadwal');
	}

	public function add_jadwal()
	{
		$data['kelas']	= $this->db->get_where('kelas')->result_array();
		$data['hari']	= ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
		$data['mapel']  = $this->db->get_where('mapel')->result_array();
		$data['guru']  = $this->db->select('guru_nip, guru_kode, guru_nama')->from('guru')->get()->result_array();
		$data['ruangan'] = $this->db->get('ruangan')->result_array();

		$this->form_validation->set_rules([
			[
				'field' => 'kelas[]',
				'label' => 'Kelas',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'hari[]',
				'label' => 'Hari',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'mapel[]',
				'label' => 'Mata Pelajaran',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'guru[]',
				'label' => 'Guru Pengajar',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'jam_mulai[]',
				'label' => 'Jam Masuk',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'jam_selesai[]',
				'label' => 'Jam Selesai',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'jumlah_jam[]',
				'label' => 'Jumlah Jam Pelajaran',
				'rules' => 'trim|required|xss_clean|numeric',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}',
					'numeric' => 'masukan angka pada {field}'
				]
			]
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('add_jadwal', $data);
		} else {
			$jumlahForm = $_POST['jumlah_form'];
			for ($i = 0; $i < $jumlahForm; $i++) {
				$result[] = [
					'hari' => $_POST['hari'][$i],
					'jam_masuk' => $_POST['jam_mulai'][$i],
					'jam_keluar' => $_POST['jam_selesai'][$i],
					'mapel_id' => $_POST['mapel'][$i],
					'kelas_id' => $_POST['kelas'][$i],
					'guru_kode' => $_POST['guru'][$i],
					'ruang_id' => $_POST['ruangan'][$i],
					'jumlah_jam' => $_POST['jumlah_jam'][$i],
				];
			}

			$this->db->insert_batch('jadwal', $result);
			$this->session->set_flashdata('message', 'Data jadwal behasil diinput');
			return redirect('Admin/Dashboard');
		}
	}

	public function hapusJadwal()
	{

		$this->db->delete('jadwal', ['jadwal_id' => $this->input->post('jadwalID', true)]);
		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'message' => 'Anda telah menghapus jadwal pelajaran',
			'success' => true
		];
		echo json_encode($reponse);
	}

	public function insert_jadwal()
	{
		foreach ($_POST['kelas'] as $key => $value) {
			$result = array(
				'hari' => $_POST['hari'][$key],
				'jam_masuk' => $_POST['jam_masuk'][$key],
				'jam_keluar' => $_POST['jam_selesai'][$key],
				'mapel_id' => $_POST['mapel'][$key],
				'kelas_id' => $_POST['kelas'][$key],
				'guru_nip' => $_POST['guru'][$key],
				'ruang_id' => $_POST['ruangan'][$key],
			);

			$this->db->insert('jadwal', $result);
			$jadwal_id = $this->db->insert_id();
			$this->upload_materi($jadwal_id);
		}

		$this->session->set_flashdata('message', 'Data jadwal behasil diinput');
		return redirect('Admin/Dashboard');
	}

	public function upload_materi($jadwal_id)
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 1024;
		$config['max_width']            = 2048;
		$config['max_height']           = 1000;
		$config['encrypt_name'] 		= true;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$judul_materi = $this->input->post('judul_materi');
		$jumlah_file = count($_FILES['file_materi']['name']);
		for ($i = 0; $i < $jumlah_file; $i++) {
			if (!empty($_FILES['file_materi']['name'][$i])) {

				$_FILES['file']['name'] = $_FILES['file_materi']['name'][$i];
				$_FILES['file']['type'] = $_FILES['file_materi']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['file_materi']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['file_materi']['error'][$i];
				$_FILES['file']['size'] = $_FILES['file_materi']['size'][$i];

				if ($this->upload->do_upload('file')) {

					$uploadData = $this->upload->data();
					$data['judul'] = $judul_materi[$i];
					$data['jenis'] = 'file';
					$data['materi'] = $uploadData['file_name'];
					$data['tipe_file'] = $uploadData['file_ext'];
					$data['ukuran_file'] = $uploadData['file_size'];
					$data['jadwal_id'] = $jadwal_id;
					$this->db->insert('materi_kbm', $data);
				}
			}
		}
	}

	public function get_data()
	{
		$typesend = $this->input->get('type');
		if ($typesend == 'class') {
			$classes = $this->db->get('kelas')->result();
			foreach ($classes as $class) {
				$result[] = [
					'kelas_id' => $class->kelas_id,
					'kelas'	   => $class->nama_kelas
				];
			}
		} elseif ($typesend == 'days') {
			$days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
			foreach ($days as $day) {
				$result[] = [
					'day'	   => $day
				];
			}
		} elseif ($typesend == 'lesson') {
			$lessons = $this->db->get('mapel')->result();
			foreach ($lessons as $lesson) {
				$result[] = [
					'mapel_id'	=> $lesson->mapel_id,
					'mapel'		=> $lesson->nama_mapel
				];
			}
		} elseif ($typesend == 'teacher') {
			$teachers = $this->db->get('guru')->result();
			foreach ($teachers as $teacher) {
				$result[] = [
					'guru_id'	=> $teacher->guru_id,
					'kode_guru'		=> $teacher->guru_kode,
					'nama_guru'		=> $teacher->guru_nama
				];
			}
		} elseif ($typesend == 'room') {
			$rooms = $this->db->get('ruangan')->result();
			foreach ($rooms as $room) {
				$result[] = [
					'ruang_id'	=> $room->ruang_id,
					'ruangan'		=> $room->nama_ruang,
				];
			}
		}
		echo json_encode($result);
	}
}
