<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title"><?= $title ?></h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active">Materi Pelajaran</li>
					<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('KepalaSekolah/MateriPelajaran/dataMateriAdmin') ?>" class="text-muted">Data Materi (Guru)</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page"><?= $title ?></li>
				</ol>
			</nav>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid mt-n4">
		<!-- *************************************************************** -->
		<!-- Start First Cards -->
		<!-- *************************************************************** -->
		<!-- *************************************************************** -->
		<!-- End Location and Earnings Charts Section -->
		<!-- *************************************************************** -->
		<!-- *************************************************************** -->
		<!-- Start Top Leader Table -->
		<!-- *************************************************************** -->

		<div class="row">
			<div class="col-12">
				<div class="mt-4 activity">
					<div class="profile">
						<div class="row">
							<div class="col-md-12">
								<div class="card shadow px-3">
									<table class="table">
										<tbody>
											<tr class="table-borderless">
												<th scope="row" class="col-sm-8">Nama Guru</th>
												<td>Sulton Akbar Pamungkas, S. Pd.</td>
											</tr>
											<tr>
												<th scope="row" class="col-sm-8">Kelas</th>
												<td>XI TKRO 1,XI TKRO 4</td>
											</tr>
											<tr>
												<th scope="row">Mata Pelajaran</th>
												<td>Panel Sasis Dan Pemindahan Tenaga KR</td>
											</tr>
											<tr>
												<th scope="row">Dibuat</th>
												<td>01 - 05 - 2022 07 : 00 WIB </td>
											</tr>
											<tr>
												<th scope="row">Diedit</th>
												<td>-</td>
											</tr>
											<tr>
												<th scope="row">Materi Pembelajaran</th>
												<td></td>
											</tr>
											<tr class="table-borderless">
												<td class="item-pdf row">
													<!-- looping item -->
													<div class="pdf-file ml-3">
														<a target="_blank" href="<?= base_url('KepalaSekolah/MateriPelajaran/tampilFileMateri') ?>">
															<div class="card card-pdf">
																<div class="container">
																	<img class="d-block mx-auto" src="<?= base_url('assets/admin/icons/pdf-md.png') ?>" alt="file pdf">
																	<hr class="w-50 mx-auto">
																	<h6 class="text-center mt-n1">Ebook Panel Sasis Dan Pemindahan Tenaga KR</h6>
																</div>
															</div>
														</a>
													</div>
												</td>
											</tr>
											<tr>
												<th scope="row">Video Pembelajaran</th>
												<td></td>
											</tr>
											<tr class="table-borderless">
												<td class="item-video row">
													<!-- looping item -->
													<div class="pdf-file ml-3">
														<div class="card card-video">
															<div class="container">
																<iframe class="d-block mx-auto" src="https://www.youtube.com/embed/u5aHyZV0CTI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
																<h6 class="mt-1">2021-10-12</h6>
																<h6 class="mt-n1">Panel Sasis Dan Pemindahan Tenaga KR</h6>
															</div>
														</div>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
									<hr class="mt-n3">
									<div class="button-action d-flex mb-3 mt-2">
										<a href="<?= base_url('KepalaSekolah/MateriPelajaran/dataMateriGuru') ?>" class="btn btn-sm btn-primary bg-blue rounded border-0 ml-3 px-3">Kembali</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- *************************************************************** -->
			<!-- End Top Leader Table -->
			<!-- *************************************************************** -->
		</div>
