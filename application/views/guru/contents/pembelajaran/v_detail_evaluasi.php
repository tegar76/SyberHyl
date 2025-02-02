<!-- Data Tables -->
<!-- import data tables -->
<?php include APPPATH . '../assets/DataTables/import/import.php'; ?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title"><?= $title . ' Kelas ' . $detail->nama_kelas ?></h3>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item text-muted active">Pembelajaran</li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran') ?>" class="text-muted">Mengajar</a></li>
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran/evaluasi/' . $detail->jadwal_id) ?>" class="text-muted">Evaluasi</a></li>
							<li class="breadcrumb-item text-muted active" aria-current="page"><?= $title ?></li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid">
		<!-- *************************************************************** -->
		<!-- Start First Cards -->
		<!-- *************************************************************** -->

		<div class="card-group">
			<div class="card border-right">
				<div class="card-body">
					<div class="d-flex d-lg-flex d-md-block align-items-center">
						<div class="total">
							<div class="d-inline-flex align-items-center">
								<h2><?= $jumlah_siswa ?></h2>
							</div>
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Siswa</h6>
						</div>
						<div class="ml-auto mt-md-3 mt-lg-0">
							<span class="opacity-7 text-muted"><i class="fa-solid fa-users fa-2xl"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="card border-right">
				<div class="card-body">
					<div class="d-flex d-lg-flex d-md-block align-items-center">
						<div class="total">
							<h2><?= $sm ?></h2>
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Sudah Mengumpulkan
							</h6>
						</div>
						<div class="ml-auto mt-md-3 mt-lg-0">
							<span class="opacity-7 text-muted"><i class="fa fa-clipboard-list fa-2xl"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="card border-right">
				<div class="card-body">
					<div class="d-flex d-lg-flex d-md-block align-items-center">
						<div class="total">
							<div class="d-inline-flex align-items-center">
								<h2><?= $sn ?></h2>
							</div>
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Sudah Dinilai</h6>
						</div>
						<div class="ml-auto mt-md-3 mt-lg-0">
							<span class="opacity-7 text-muted"><i class="fa fa-clipboard-check fa-2xl"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<div class="d-flex d-lg-flex d-md-block align-items-center">
						<div class="total">
							<h2><?= $bm ?></h2>
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Belum Mengumpulkan</h6>
						</div>
						<div class="ml-auto mt-md-3 mt-lg-0">
							<span class="opacity-7 text-muted"><i class="fa fa-clipboard-question fa-2xl"></i></span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							Detail Evaluasi
						</h6>
						<div class="mt-4 activity">
							<table class="table-responsive table-bordered" style="width:100%">
								<thead>
									<tr>
										<th style="width:2%">No</th>
										<th style="width:8%;">Hari, Tanggal</th>
										<th style="width:10%;">Mapel</th>
										<th style="width:6%;">Evaluasi Ke-</th>
										<th style="width:6%;">Judul</th>
										<th style="width:6%;">Jenis Soal</th>
										<th style="width:6%;">Mulai</th>
										<th style="width:6%;">Selesai</th>
										<th style="width:6%;">Batas Pengumpulan</th>
										<th style="width:7%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td><?= $hariEval . ', ' . date('d-m-Y', strtotime($detail->tanggal)) ?></td>
										<td><?= $detail->nama_mapel ?></td>
										<td><?= $detail->evaluasi_ke ?></td>
										<td><?= $detail->judul ?></td>
										<td><?= $detail->jenis_soal ?></td>
										<td><?= date('H:i', strtotime($detail->waktu_mulai)) ?> WIB</td>
										<td><?= date('H:i', strtotime($detail->waktu_selesai)) ?> WIB</td>
										<td><?= date('H:i', strtotime($detail->waktu_deadline)) ?> WIB</td>
										<td>
											<a target="_blank" href="<?= base_url('guru/pembelajaran/file_soal_evaluasi/' . $detail->file_evaluasi) ?>" class="btn btn-sm btn-primary bg-blue border-0 rounded mr-1"><i class="fa fa-search text-white" data-toggle="tooltip" data-placement="top" title="Detail"></i></a>
											<a href="<?= base_url('guru/pembelajaran/set_deadline_evaluasi/' . $detail->evaluasi_id) ?>" class="btn btn-sm btn-success border-0 rounded mr-1"><i class="fa-solid fa-pen-to-square text-white" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">
							Data Siswa Kelas <?= $detail->nama_kelas ?> Semester <?= $semester = ($tahun_ajar['semester'] == 0) ? '-' : (($tahun_ajar['semester'] % 2 == 0) ? 'Genap' : 'Gasal') ?> Tahun Pelajaran <?= ($tahun_ajar['tahun'] == '') ? '-' : $tahun_ajar['tahun'] ?>
						</h6>
						<div class="mt-4 activity">
							<table id="data_siswa" class="table-responsive table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th style="width:4%">No</th>
										<th style="width:8%;">NIS</th>
										<th style="width:20%;">Nama</th>
										<th style="width:12%;">Waktu Pengumpulan</th>
										<th style="width:12%;">Metode Pengumpulan</th>
										<th style="width:12%;">File Jawaban</th>
										<th style="width:10%;">Komentar</th>
										<th style="width:6%;">Nilai</th>
										<th style="width:6%;">Keterangan</th>
										<th style="width:4%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($rekap as $row) : ?>
										<tr>
											<td><?= $row['nomor'] ?></td>
											<td><?= $row['nis'] ?></td>
											<td><?= $row['nama'] ?></td>
											<td><?= $row['upload_time'] ?></td>
											<td><?= $row['metode_upload'] ?></td>
											<?php if ($row['metode_upload'] == 'online') : ?>
												<td><?= $row['file'] ?></td>
											<?php else : ?>
												<td>-</td>
											<?php endif ?>
											<td><?= $row['komentar'] ?></td>
											<td><?= $row['nilai'] ?></td>
											<td><?= $row['keterangan'] ?></td>
											<td>
												<?php if ($row['evaluasi_siswa_id'] == 0) : ?>
													<a href="<?= base_url('guru/pembelajaran/nilai_evaluasi?nis=' . $row['nis'] . '&evaluasi=' . $row['evaluasi_id'] . '&status=bm') ?>" class="btn btn-sm btn-success border-0 rounded"><i class="fa fa-edit text-white" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
												<?php else : ?>
													<a href="<?= base_url('guru/pembelajaran/nilai_evaluasi?nis=' . $row['nis'] . '&evaluasi=' . $row['evaluasi_siswa_id'] . '&status=sm') ?>" class="btn btn-sm btn-success border-0 rounded"><i class="fa fa-edit text-white" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
												<?php endif ?>
											</td>
										</tr>
									<?php endforeach ?>
									<!-- Tampil Semua Siswa -->
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- *************************************************************** -->
		<!-- End Top Leader Table -->
		<!-- *************************************************************** -->
	</div>

	<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
