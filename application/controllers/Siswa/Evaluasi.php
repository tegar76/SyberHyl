<?php

class Evaluasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SiswaModel', 'siswa', true);
		isSiswaLogin();
		$bulan = array(1 => "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		$days = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
		$this->get_today_date = $days[(int)date("w")] . ', ' . date("j ") . $bulan[(int)date('m')] . date(" Y");

		$this->today = $days[(int)date('w')];
		$this->datenow = date('Y-m-d');
		$this->userSiswa = $this->siswa->getWhere(['siswa_nis' => $this->session->userdata('nis')]);
	}

	public function message($title = NULL, $text = NULL, $type = NULL)
	{
		return $this->session->set_flashdata([
			'title' => $title,
			'text' => $text,
			'type' => $type,
		]);
	}

	public function index($id = false)
	{
		$siswa_ = $this->userSiswa;
		if ($id) {
			$date = date('Y-m-d');
			$time = date('H:i:s');
			$id_ = $this->secure->decrypt_url($id);
			$mapel = $this->siswa->get_jadwal_mapel($id_);
			$evaluasi = $this->siswa->get_evaluasi($id_);
			$data['evaluasi'] = array();
			$data['nilai'] = array();
			if ($evaluasi) {
				$no1 = 1;
				foreach ($evaluasi as $key => $value) {
					$eval['nomor'] = $no1++;
					$eval['mapel'] = $mapel->nama_mapel;
					$eval['ke_'] = $value->evaluasi_ke;
					$eval['judul'] = $value->judul;
					$eval['tanggal'] = date('d-m-Y', strtotime($value->tanggal));
					$eval['mulai'] = ($value->waktu_mulai != '00:00:00') ? date('H:i', strtotime($value->waktu_mulai)) . " WIB" : '-';
					$eval['selesai'] = ($value->waktu_selesai != '00:00:00') ? date('H:i', strtotime($value->waktu_selesai)) . " WIB" : '-';
					$eval['deadline'] = ($value->waktu_deadline != '00:00:00') ? date('H:i', strtotime($value->waktu_deadline))  . " WIB" : '-';
					$eval['jenis'] = $value->jenis_soal;
					$eval['_id'] = $value->evaluasi_id;
					$eval['jadwal_'] = $id_;
					$check = $this->siswa->get_evaluasi_siswa($siswa_->siswa_nis, $value->evaluasi_id);
					if ($check) {
						$eval['action'] = '<a role="button" class="btn btn-sm btn-outline-success disabled text-success mx-auto d-block">Sudah Mengerjakan</a>';
					} else {
						if (strtotime($value->tanggal) < strtotime($date)) {
							$eval['action'] = '<a role="button" class="btn btn-sm btn-outline-danger disabled text-danger mx-auto d-block">Waktu Sudah Lewat</a>';
						} elseif (strtotime($value->tanggal) > strtotime($date)) {
							$eval['action'] = '<a role="button" class="btn btn-sm btn-outline-secondary disabled text-secondary mx-auto d-block">Belum Dimulai</a>';
						} else if (strtotime($date) == strtotime($value->tanggal)) {
							if ($value->waktu_mulai == '00:00:00' or strtotime($value->waktu_mulai) >= strtotime($time)) {
								$eval['action'] = '<a role="button" class="btn btn-sm btn-outline-secondary disabled text-secondary mx-auto d-block">Belum Dimulai</a>';
							} elseif (strtotime($value->waktu_deadline) <= strtotime($time) && strtotime($time) > strtotime($value->waktu_selesai)) {
								$eval['action'] = '<a role="button" class="btn btn-sm btn-outline-danger disabled text-danger mx-auto d-block">Waktu Berakhir</a>';
							} elseif (strtotime($value->waktu_selesai) <= strtotime($time) && strtotime($time) > strtotime($value->waktu_selesai)) {
								$eval['action'] = '<a class="btn btn-sm btn-primary text-white mx-auto d-block submit-evaluasi" role="button" data-toggle="popover" data-placement="bottom" evaluasi-id="' . $this->secure->encrypt_url($value->evaluasi_id) . '">Kumpulkan</a>';
							} else {
								$eval['action'] = '<a href="' . base_url('siswa/evaluasi/soal_evaluasi/' . $value->file_evaluasi) . '" class="btn btn-success text-white mx-auto d-block mb-3">Mulai</a><a class="btn btn-sm btn-primary text-white mx-auto d-block submit-evaluasi" role="button" data-toggle="popover" data-placement="bottom" evaluasi-id="' . $this->secure->encrypt_url($value->evaluasi_id) . '">Kumpulkan</a>';
							}
						}
					}
					$evals[] = $eval;
				}
				$data['evaluasi'] = $evals;

				$no2 = 1;
				foreach ($evaluasi as $row) {
					$result['nomor'] = $no2++;
					$result['mapel'] = $mapel->nama_mapel;
					$result['ke_'] = $row->evaluasi_ke;
					$result['judul'] = $row->judul;
					$nilai_ = $this->siswa->get_evaluasi_siswa($siswa_->siswa_nis, $row->evaluasi_id);
					if ($nilai_) {
						$result['status'] = 'Sudah Mengerjakan';
						if ($nilai_->status == 2) $result['status'] = 'Sudah Dinilai';
						$result['upload'] = date('d-m-Y H:i', strtotime($nilai_->time_upload)) . " WIB";
						$result['metode'] = $nilai_->metode;
						if ($nilai_->file_type == '.pdf') {
							$result['icon'] = base_url('assets/admin/icons/pdf-md.png');
							$type = 'pdf';
						} else {
							$result['icon'] = base_url('assets/admin/icons/img-md.png');
							$type = 'img';
						}
						$result['file'] = base_url('siswa/evaluasi/file_evaluasi_siswa/' . $type . '/' . $nilai_->file_evaluasi_siswa);
						$result['komentar'] = $nilai_->komentar;
						$result['nilai'] = $nilai_->nilai;
					} else {
						$result['status'] = 'Belum Mengerjakan';
						$result['upload'] = '-';
						$result['metode'] = '-';
						$result['file'] = '-';
						$result['komentar'] = '-';
						$result['nilai'] = '-';
					}
					$nilai[] = $result;
				}
				$data['nilai'] = $nilai;
			}
			$data['siswa'] = $siswa_;
			$data['title'] = 'Evaluasi';
			$data['content'] = 'siswa/contents/evaluasi/v_evaluasi';
		} else {
			$data['content'] = 'siswa/contents/errors/404_notfound';
		}
		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function pengumpulan_online($id_)
	{
		if ($id_) {
			$id_ = $this->secure->decrypt_url($id_);
			$data['siswa'] = $this->userSiswa;
			$data['evaluasi'] = $this->siswa->get_info_evaluasi($id_);
			$data['title'] = 'Pengumpulan Evaluasi Online';
			$data['content'] = 'siswa/contents/evaluasi/v_pengumpulan_online';
			$this->form_validation->set_rules('file_evaluasi', 'File Jawaban Evaluasi', 'callback_file_evaluasi_check');
			if ($this->form_validation->run() == false) {
				$this->load->view('siswa/layout/wrapper', $data, FALSE);
			} else {
				$id_jadwal = $this->secure->encrypt_url($data['evaluasi']->jadwal_id);
				$this->siswa->process_evaluasi();
				$this->message('Berhasil', 'Evaluasi berhasil dikumpulkan', 'success');
				return redirect('siswa/evaluasi/' . $id_jadwal);
			}
		} else {
			$data['content'] = 'siswa/contents/errors/404_notfound';
		}
		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function file_evaluasi_check()
	{
		if (empty($_FILES['file_evaluasi']['name'])) {
			$this->form_validation->set_message('file_evaluasi_check', 'Anda harus upload {field}!');
			return false;
		}
		return true;
	}

	public function submit_evaluasi($string)
	{
		$siswa_ = $this->userSiswa;
		$evalId = $this->input->post('evaluasiId', true);
		$evaluasi = array(
			'time_upload' => date('Y-m-d H:i:s'),
			'metode' => 'langsung',
			'file_evaluasi_siswa' => '-',
			'file_type' => '-',
			'file_size' => 0,
			'status' => 3,
			'siswa_nis' => $siswa_->siswa_nis,
			'evaluasi_id' => $evalId
		);
		$this->db->insert('evaluasisiswa', $evaluasi);
		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'success' => true,
			'message' => 'Evaluasi sudah dikumpulkan secara lansung'
		];
		echo json_encode($reponse);
	}


	public function soal_evaluasi($soal = false)
	{

		$bulan = array(1 => "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		$eval = $this->db->where('file_evaluasi', $soal)->get('evaluasi')->row();
		if ($soal && $eval) {
			$data['title'] = 'Soal Evaluasi';
			$data['file_soal'] = base_url('storage/guru/evaluasi/') . $soal;
			$data['eval'] = $eval;

			$date = $bulan[(int)date('m', strtotime($eval->tanggal))] . date(" d", strtotime($eval->tanggal)) . ', ' . date("Y", strtotime($eval->tanggal));
			$time = date("H:i:s", strtotime($eval->waktu_selesai));
			$data['deadline'] = $date . ' ' . $time;
			$data['id'] = $this->secure->encrypt_url($eval->jadwal_id);
			$this->load->view('siswa/contents/evaluasi/soal_evaluasi_pdf/v_soal_evaluasi_pdf', $data, FALSE);
		} else {
			$data['content'] = 'siswa/contents/errors/404_notfound';
			$this->load->view('siswa/layout/wrapper', $data, FALSE);
		}
	}

	public function file_evaluasi_siswa($type = false, $file = false)
	{
		if ($type && $file) {
			$check = FCPATH . './storage/siswa/evaluasi/' . $file;
			if (file_exists($check)) {
				if ($type == 'pdf') {
					$data['pdf'] = base_url('storage/siswa/evaluasi/') . $file;
					$this->load->view('pdf_viewer/pdf_viewer', $data, false);
				} elseif ($type == 'img') {
					$data['alt'] = 'Tugas Siswa';
					$data['img'] = base_url('storage/siswa/evaluasi/') . $file;
					$this->load->view('img_viewer/img_viewer', $data);
				}
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	public function panduan_pengumpulan_evaluasi($string)
	{
		$data['title'] = 'Panduan Pengumpulan Evaluasi';
		$this->load->view('siswa/contents/evaluasi/panduan_pengumpulan_evaluasi/v_panduan', $data, FALSE);
	}

	public function check_batas_soal()
	{
		$date = date('Y-m-d');
		$time = date('H:i:s');
		$id = $this->input->get('id');
		$eval = $this->db->where('evaluasi_id', $id)->get('evaluasi')->row();
		if (strtotime($date) < strtotime($eval->tanggal)) {
			$response = [
				'csrfName' => $this->security->get_csrf_token_name(),
				'csrfHash' => $this->security->get_csrf_hash(),
				'success' => true,
				'msgabsen' => 'Waktu Berakhir'
			];
		} elseif (strtotime($date) == strtotime($eval->tanggal)) {
			if (strtotime($time) > strtotime($eval->waktu_selesai)) {
				$response = [
					'csrfName' => $this->security->get_csrf_token_name(),
					'csrfHash' => $this->security->get_csrf_hash(),
					'success' => true,
					'msgabsen' => 'Waktu Berakhir'
				];
			} else {
				$response = [
					'csrfName' => $this->security->get_csrf_token_name(),
					'csrfHash' => $this->security->get_csrf_hash(),
					'success' => false,
					'msgabsen' => 'Liat Soal'
				];
			}
		}
		echo json_encode($response);
	}
}
