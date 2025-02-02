<!--=============== HEADER ===============-->
<header class="header" id="header">
	<nav class="nav container">
		<a href="#" class="nav__logo"><img src="<?= base_url('assets/logo/logo-big.png') ?>" class="w-50" alt="logo"></a>

		<div class="nav__menu" id="nav-menu">
			<ul class="nav__list">
				<li class="nav__item">
					<a href="<?= base_url('siswa/info') ?>" class="nav__link <?= ($this->uri->segment(2) == "info") ? 'active-link' : '' ?> ">
						<!-- <span class="badge-info-ak"></span> -->
						<i class='bx bx-info-square nav__icon <?= ($this->uri->segment(2) == "info") ? 'active-link' : '' ?> '></i>
						<span class="nav__name">Info</span>
					</a>
				</li>

				<li class="nav__item">
					<a href="<?= base_url('siswa/surat') ?>" class="nav__link <?= ($this->uri->segment(2) == "surat") ? 'active-link' : '' ?> ">
						<i class='bx bx-mail-send nav__icon <?= ($this->uri->segment(2) == "surat") ? 'active-link' : '' ?> '></i>
						<span class="nav__name">Surat</span>
					</a>
				</li>

				<li class="nav__item">
					<a href="<?= base_url('siswa/jadwal') ?>" class="nav__link  <?= ($this->uri->segment(2) == "jadwal") ? 'active-link' : '' ?> ">
						<i class='bx bx-calendar nav__icon <?= ($this->uri->segment(2) == "jadwal") ? 'active-link' : '' ?>'></i>
						<span class="nav__name">Jadwal</span>
					</a>
				</li>

				<li class="nav__item">
					<a href="<?= base_url('siswa/konsultasi') ?>" class="nav__link <?= ($this->uri->segment(2) == "konsultasi") ? 'active-link' : '' ?>">
						<!-- <span class="badge-konsul"></span> -->
						<i class='bx bx-message-rounded-detail nav__icon <?= ($this->uri->segment(2) == "konsultasi") ? 'active-link' : '' ?>'></i>
						<span class="nav__name">Konsultasi</span>
					</a>
				</li>

				<li class="nav__item">
					<a href="<?= base_url('siswa/profile') ?>" class="nav__link  <?= ($this->uri->segment(2) == "profile") ? 'active-link' : '' ?> ">
						<i class='bx bx-user nav__icon <?= ($this->uri->segment(2) == "profile") ? 'active-link' : '' ?> '></i>
						<span class="nav__name">Profile</span>
					</a>
				</li>
			</ul>
		</div>
	</nav>
</header>
