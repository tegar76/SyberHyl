<!-- import data tables -->
<?php include APPPATH . '../assets/DataTables/import/import.php'; ?>

<!-- import style -->
<?php include APPPATH . '../assets/admin/css/import_style.php'; ?>

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title"><?= $title ?></h3>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item text-muted active">Setting Jadwal</li>
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
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Data Materi (Guru) Semester <?= $semester = ($tahun_ajar['semester'] == 0) ? '-' : (($tahun_ajar['semester'] % 2 == 0) ? 'Genap' : 'Gasal') ?> Tahun Pelajaran <?= ($tahun_ajar['tahun'] == '') ? '-' : $tahun_ajar['tahun'] ?></h6>
						<div class="mt-4 activity">
							<table id="data_materi" class="table-responsive table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id pesan ada di assets/admin/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width:2%">No</th>
										<th style="width:10%">Kode Guru</th>
										<th style="width:10%;">Kelas</th>
										<th style="width:10%;">Jurusan</th>
										<th style="width:25%;">Mapel</th>
										<th style="width:18%;">Dibuat</th>
										<th style="width:2%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($materi as $row => $value) : ?>
										<tr>
											<td><?= $i++ ?></td>
											<td><?= $value->kode_g ?></td>
											<td><?= $value->kelas ?></td>
											<td><?= (!empty($value->kode_j)) ? $value->kode_j : '-' ?></td>
											<td><?= $value->mapel ?></td>
											<td><?= date('d-m-Y H:i', strtotime($value->create)) . " WIB" ?></td>
											<td>
												<a href="<?= base_url('master/materi/detail_materi_guru?id=' . $value->id) ?>" class="btn btn-sm btn-primary mr-1"><i class="fa fa-search text-white" data-toggle="tooltip" data-placement="top" title="Detail"></i></a>
											</td>
										</tr>
									<?php endforeach ?>
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

