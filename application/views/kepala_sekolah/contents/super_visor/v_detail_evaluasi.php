<!-- Data Tables -->
<!-- import data tables -->
<?php include APPPATH.'../assets/DataTables/import/import.php';?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title"><?= $title .' Kelas XI TKRO 1'?></h3>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('KepalaSekolah/SuperVisor') ?>" class="text-muted">Super Visor</a></li>
							<!-- arahkan ke filter kelas sesuai yng diklik misal kelas XI TKRO 1 -->
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('KepalaSekolah/SuperVisor') ?>" class="text-muted">XI TKRO 1</a></li>
							<!-- arahkan ke kelas sesuai yng diklik misal kelas XI TKRO 1 -->
							<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('KepalaSekolah/SuperVisor/tugasHarian') ?>" class="text-muted">Tugas Harian</a></li>
							<li class="breadcrumb-item text-muted active" aria-current="page"><?= $title?></li>
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
								<h2>0</h2>
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
							<h2>0</h2>
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
								<h2>0</h2>
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
							<h2>0</h2>
							<h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Belum Dinilai</h6>
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
										<th style="width:2%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Senin, 01 - 05 - 2022</td>
										<td>Panel Sasis dan Pemindahan Tenaga KR</td>
										<td>1</td>
										<td>Evaluasi BAB 1</td>
										<td>Essay</td>
										<td>07:00 WIB</td>
										<td>08:00 WIB</td>
										<td>08:15 WIB</td>
										<td>
											<a target="_blank" href="<?= base_url('KepalaSekolah/SuperVisor/fileSoalEvaluasi') ?>" class="btn btn-sm btn-primary bg-blue border-0 rounded mr-1"><i class="fa fa-search text-white" data-toggle="tooltip" data-placement="top" title="Detail"></i></a>
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
							Data  Siswa Kelas XI TKRO 1  Semester Gasal Tahun Pelajaran 2021/2022       
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
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>2010049</td>
										<td>ADIT PRAYITNO</td>
										<td>10 - 04 - 2022 13:00 WIB</td>
										<td>Online</td>
										<td><a target="_blank" href="<?= base_url('KepalaSekolah/SuperVisor/fileJawabanEvaluasiImg')?>"><img src="<?= base_url('assets/admin/icons/img.png') ?>" alt=""></a></td>
										<td>Bagus</td>
										<td>95</td>
										<td>Sudah Dinilai</td>
									</tr>
									<tr>
										<td>2</td>
										<td>2010049</td>
										<td>ADZKA AZZAM FIKRI</td>
										<td>10 - 04 - 2022 13:00 WIB</td>
										<td>Langsung</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>Menunggu Konfirmasi</td>
									</tr>
									<tr>
										<td>3</td>
										<td>2010049</td>
										<td>ADIT PRAYITNO</td>
										<td>10 - 04 - 2022 13:00 WIB</td>
										<td>Online</td>
										<td><a target="_blank" href="<?= base_url('KepalaSekolah/SuperVisor/fileJawabanEvaluasiPdf')?>"><img src="<?= base_url('assets/admin/icons/pdf.png') ?>" alt=""></a></td>
										<td>-</td>
										<td>-</td>
										<td>Sudah Mengerjakan</td>
									</tr>
									<tr>
										<td>4</td>
										<td>2010049</td>
										<td>AFRIAN HASAN</td>
										<td>10 - 04 - 2022 13:00 WIB</td>
										<td>Langsung</td>
										<td>-</td>
										<td>Baik</td>
										<td>90</td>
										<td>Sudah Diterima dan Sudah Dinilai</td>
									</tr>
									<tr>
										<td>5</td>
										<td>2010049</td>
										<td>AGUS NUR KHOLIS</td>
										<td>10 - 04 - 2022 13:00 WIB</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>0</td>
										<td>Tidak Mengerjakan</td>
									</tr>
									<tr>
										<td>6</td>
										<td>2010049</td>
										<td>AINUN NAFIS SETIAWAN</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>-</td>
										<td>Belum Mengerjakan</td>
									</tr>
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
