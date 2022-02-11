<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("location:login.php");
	exit;
}
include 'koneksi.php';
include 'header.php'; 

$dcalon_bph_mpm = mysqli_query($koneksi, "SELECT * FROM calon_bph_mpm");
$tcalon_bph_mpm = mysqli_num_rows($dcalon_bph_mpm);
$dcalon_anggota_mpm = mysqli_query($koneksi, "SELECT * FROM calon_anggota_mpm");
$tcalon_anggota_mpm = mysqli_num_rows($dcalon_anggota_mpm);
$dcalon_bem = mysqli_query($koneksi, "SELECT * FROM calon_bem");
$tcalon_bem = mysqli_num_rows($dcalon_bem);
$dcalon_hima = mysqli_query($koneksi, "SELECT * FROM calon_hima");
$tcalon_hima = mysqli_num_rows($dcalon_hima);
$total_peserta = round($tcalon_bph_mpm + $tcalon_anggota_mpm + $tcalon_bem + $tcalon_hima);

$dtotal_dpt = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih");
$total_dpt = mysqli_num_rows($dtotal_dpt);
$ddpt_sudah_memilih = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE status='Sudah memilih'");
$dpt_sudah_memilih = mysqli_num_rows($ddpt_sudah_memilih);
$persen_suara = round(($dpt_sudah_memilih * 100)  / $total_dpt);
?>

<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
	<div class="wrapper theme-6-active pimary-color-pink">

		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="index.php">
							<img class="brand-img" src="../img/logo.png" alt="brand" />
							<span class="brand-text">POLIMEDIA</span>
						</a>
					</div>
				</div>
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="../img/user1.png" alt="user_auth" class="user-auth-img img-circle" /></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">

							<?php
							$status = $_SESSION['status'] == 'Sudah memilih';
							if ($status) {
							?>
								<li>
									<a href="#"><i class="zmdi zmdi-check text-success"></i><span><?php echo $_SESSION['status']; ?></span></a>
								</li>
								<li class="divider"></li>
							<?php } ?>

							<?php
							$status = $_SESSION['status'] == 'Belum memilih';
							if ($status) {
							?>
								<li>
									<a href="#"><i class="zmdi zmdi-minus text-danger"></i><span><?php echo $_SESSION['status']; ?></span></a>
								</li>
								<li class="divider"></li>
							<?php } ?>

							<li>
								<a href="aksi_logout.php"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<!-- /Top Menu Items -->

		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<!-- User Profile -->
				<li>
					<div class="user-profile text-center">
						<img src="../img/user1.png" alt="user_auth" class="user-auth-img img-circle" />
						<div class="dropdown mt-5">
							<a href="#" class="dropdown-toggle pr-0 bg-transparent" data-toggle="dropdown"><?php echo $_SESSION['nama_mhs']; ?></a>
						</div>
					</div>
				</li>
				<!-- /User Profile -->
				<li class="navigation-header">
					<span>Menu Utama</span>
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a class="active" href="#">
						<div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text">Dashboard</span></div>
						<div class="clearfix"></div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr">
						<div class="pull-left"><i class="zmdi zmdi-assignment-account mr-20"></i><span class="right-nav-text">Info Calon</span></div>
						<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
						<div class="clearfix"></div>
					</a>
					<ul id="ecom_dr" class="collapse collapse-level-1">
						<li>
							<a href="info_calon1.php">BPH MPM</a>
						</li>
						<li>
							<a href="info_calon2.php">Anggota MPM</a>
						</li>
						<li>
							<a href="info_calon3.php">Ketua & Wakil Ketua BEM</a>
						</li>
						<li>
							<a href="info_calon4.php">Ketua & Wakil HIMA</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="suara_masuk.php">
						<div class="pull-left"><i class="zmdi zmdi-chart-donut mr-20"></i><span class="right-nav-text">Suara Masuk</span></div>
						<div class="clearfix"></div>
					</a>
				</li>
				<li>
					<hr class="light-grey-hr mb-10" />
				</li>
				<?php
				$level = $_SESSION['level'] == 'Admin';
				if ($level) {
				?>
					<li class="navigation-header">
						<span>Data & Statistik</span>
						<i class="zmdi zmdi-more"></i>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#input_data_calon">
							<div class="pull-left"><i class="zmdi zmdi-assignment-return mr-20"></i><span class="right-nav-text">Input Data Calon</span></div>
							<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
							<div class="clearfix"></div>
						</a>
						<ul id="input_data_calon" class="collapse collapse-level-1">
							<li>
								<a href="input_data_calon1.php">BPH MPM</a>
							</li>
							<li>
								<a href="input_data_calon2.php">Anggota MPM</a>
							</li>
							<li>
								<a href="input_data_calon3.php">Ketua & Wakil Ketua BEM</a>
							</li>
							<li>
								<a href="input_data_calon4.php">Ketua & Wakil HIMA</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="input_data_pemilih.php">
							<div class="pull-left"><i class="zmdi zmdi-assignment mr-20"></i><span class="right-nav-text">Input Data Pemilih</span></div>
							<div class="clearfix"></div>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" data-toggle="collapse" data-target="#hasil_suara_calon">
							<div class="pull-left"><i class="zmdi zmdi-chart-donut mr-20"></i><span class="right-nav-text">Hasil Suara</span></div>
							<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
							<div class="clearfix"></div>
						</a>
						<ul id="hasil_suara_calon" class="collapse collapse-level-1">
							<li>
								<a href="hasil_suara_calon1.php">BPH MPM</a>
							</li>
							<li>
								<a href="hasil_suara_calon2.php">Anggota MPM</a>
							</li>
							<li>
								<a href="hasil_suara_calon3.php">Ketua & Wakil Ketua BEM</a>
							</li>
							<li>
								<a href="hasil_suara_calon4.php">Ketua & Wakil HIMA</a>
							</li>
						</ul>
					</li>
					<li>
						<hr class="light-grey-hr mb-10" />
					</li>
				<?php } ?>
				<li class="navigation-header">
					<span>Akun</span>
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a href="ganti_password.php">
						<div class="pull-left"><i class="zmdi zmdi-edit mr-20"></i><span class="right-nav-text">Ganti Password</span></div>
						<div class="clearfix"></div>
					</a>
				</li>
				<li>
					<a href="aksi_logout.php">
						<div class="pull-left"><i class="zmdi zmdi-close-circle mr-20"></i><span class="right-nav-text">Logout</span></div>
						<div class="clearfix"></div>
					</a>
				</li>
			</ul>
		</div>
		<!-- /Left Sidebar Menu -->



		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid pt-25">
				<!-- Row -->
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0 bg-gradient">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $total_dpt; ?></span></span>
													<span class="weight-500 uppercase-font block font-13 txt-light">jumlah
														pemilih</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="icon-people  data-right-rep-icon txt-light"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0 bg-gradient1">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim">14</span></span>
													<span class="weight-500 uppercase-font block txt-light">prodi</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="icon-flag data-right-rep-icon txt-light"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0 bg-gradient2">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 txt-light data-wrap-left">
													<span class="block counter"><span class="counter-anim"><?php echo $total_peserta; ?></span></span>
													<span class="weight-500 uppercase-font block">peserta</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 txt-light data-wrap-right">
													<i class=" icon-user-following data-right-rep-icon"></i>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0 bg-gradient3">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $persen_suara; ?></span>%</span>
													<span class="weight-500 uppercase-font block txt-light">suara
														masuk</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 pt-25  data-wrap-right">
													<div id="sparkline_4" class="sp-small-chart"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->

				<!-- Row -->
				<div class="row">

					
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-18">
						<?php
							$status = $_SESSION['status'] == 'Belum memilih';
							if ($status) {
							?>
						<div class="panel panel-danger card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-light">Lakukan Voting</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<p>Voting terdiri dari pemilihan BPH MPM, Anggota MPM, Ketua & Wakil Ketua BEM, serta Ketua & Wakil Ketua HIMA. Voting hanya dapat dilakukan sekali.</p>
									<a href="https://pemirapolimedia.com/sistem/voting_calon1.php" class="btn btn-danger btn-block mt-30" alt="" id="sa-basic"><i class="fa fa-inbox"></i><span class="btn-text">mulai voting</span></a>
								</div>
							</div>
						</div>
						<?php }	?>

						<?php
							$status = $_SESSION['status'] == 'Sudah memilih';
							if ($status) {
							?>
						<div class="panel panel-success card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-light">Anda Sudah Melakukan Voting</h6>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<?php }	?>

					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-18">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Lihat Timeline</h6>
								</div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="gallery-wrap">
										<div class="portfolio-wrap project-gallery">
											<ul id="portfolio" class="portf auto-construct  project-gallery" data-col="1">
												<li class="item tall branding" data-src="../img/Timeline.png" data-sub-html="<h6>Bagwati</h6><p>Timeline rangkaian acara Pemilihan Mahasiswa Raya 2020.</p>">
													<a href="">
														<img class="img-responsive" src="../img/Timeline.png" alt="Image description" />
														<span class="hover-cap">Timeline PEMIRA 2021</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->
				
<?php include 'footer.php'; ?>