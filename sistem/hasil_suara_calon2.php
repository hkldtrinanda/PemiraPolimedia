<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("location:login.php");
	exit;
}
include 'koneksi.php';
include 'header.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Aplikasi E-Voting PEMIRA PoliMedia</title>
	<meta name="description" content="Grandin is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Grandin Admin, Grandinadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework" />

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<!--alerts CSS -->
	<link href="../vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

	<!-- Custom Fonts -->
	<link href="dist/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- Calendar CSS -->
	<link href="../vendors/bower_components/fullcalendar/dist/fullcalendar.css" rel="stylesheet" type="text/css" />

	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
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
					<a href="index.php">
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
							<a href="#">BPH MPM</a>
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
						<a class="active" href="javascript:void(0);" data-toggle="collapse" data-target="#hasil_suara_calon">
							<div class="pull-left"><i class="zmdi zmdi-chart-donut mr-20"></i><span class="right-nav-text">Hasil Suara</span></div>
							<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
							<div class="clearfix"></div>
						</a>
						<ul id="hasil_suara_calon" class="collapse collapse-level-1">
							<li>
								<a href="hasil_suara_calon1.php">BPH MPM</a>
							</li>
							<li>
								<a class="active" href="#">Anggota MPM</a>
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
			<div class="container-fluid">
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">Anggota MPM</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="index.php">Dashboard</a></li>
							<li><a href="#">Hasil Suara</a></li>
							<li class="active"><span>Anggota MPM</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

				<!-- Product Row One -->
				<?php
				$kolom = 0;
                $proses = false;
				$data_calon_anggota_mpm = mysqli_query($koneksi, "SELECT * FROM calon_anggota_mpm");
				while ($d = mysqli_fetch_array($data_calon_anggota_mpm)) {
				?>
					<?php $kolom++;
					if ($kolom == 1) {
						echo "<div class='row'>";
						$proses = true;
					}
					?>
					<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<article class="col-item">
										<div class="photo">
											<div class="options">
												<span class="label label-success"><?php echo $d['no_urut']; ?></span>
											</div>
											<div id="myModal<?= $d['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															<h5 class="modal-title" id="myModalLabel"><?php echo $d['nama']; ?></h5>
														</div>
														<div class="modal-body">
															<img src="foto/anggota_mpm/<?php echo $d['foto']; ?>" width="25" class="img-responsive" alt="Product Image" />
															<br>
															<p>No Urut: <?php echo $d['no_urut']; ?></p>
															<p>NIM: <?php echo $d['nim']; ?></p>
															<p>Tempat Tanggal Lahir: <?php echo $d['ttl']; ?></p>
															<p>Jenis Kelamin: <?php echo $d['jenis_kelamin']; ?></p>
															<p>Prodi: <?php echo $d['prodi']; ?></p>
															<p>Semester: <?php echo $d['semester']; ?></p>
															<p>Agenda Kerja Unggulan: <?php echo $d['agenda_kerja_unggulan']; ?></p>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
														</div>
													</div>
													<!-- /.modal-content -->
												</div>
												<!-- /.modal-dialog -->
											</div>
											<!-- /.modal -->
											<!-- Button trigger modal -->
											<img src="foto/anggota_mpm/<?php echo $d['foto']; ?>" alt="default" data-toggle="modal" data-target="#myModal" class="model_img img-responsive" />
										</div>
										<div class="info">
											<h6><?php echo $d['nama']; ?></h6>
											<span class="head-font block text-warning font-12"><?php echo $d['prodi']; ?>'<?php echo $d['semester']; ?></span>
                                            <br>
                                            <center><h6>
                                            <?php 
                                            $prodi = $d['prodi'];
                                            $no_urut = $d['no_urut'];
                                            if ($prodi == 'Teknik Grafika') {
                                                $cari_data = "SELECT * FROM tbl_pemilih WHERE pilihan2 = $no_urut AND (prodi = 'Teknik Grafika')";
                                                $dtotal_suara = mysqli_query($koneksi, $cari_data);
                                                echo $total_suara = mysqli_num_rows($dtotal_suara);
                                            } elseif ($prodi == 'Teknik Kemasan') {
                                                $cari_data = "SELECT * FROM tbl_pemilih WHERE pilihan2 = $no_urut AND (prodi = 'Teknik Kemasan')";
                                                $dtotal_suara = mysqli_query($koneksi, $cari_data);
                                                echo $total_suara = mysqli_num_rows($dtotal_suara);
                                            } elseif ($prodi == 'Teknik Perbaikan Mesin') {
                                                $cari_data = "SELECT * FROM tbl_pemilih WHERE pilihan2 = $no_urut AND (prodi = 'Teknik Perbaikan Mesin')";
                                                $dtotal_suara = mysqli_query($koneksi, $cari_data);
                                                echo $total_suara = mysqli_num_rows($dtotal_suara);
                                            } elseif ($prodi == 'Penerbitan') {
                                                $cari_data = "SELECT * FROM tbl_pemilih WHERE pilihan2 = $no_urut AND (prodi = 'Penerbitan')";
                                                $dtotal_suara = mysqli_query($koneksi, $cari_data);
                                                echo $total_suara = mysqli_num_rows($dtotal_suara);
                                            } elseif ($prodi == 'Periklanan') {
                                                $cari_data = "SELECT * FROM tbl_pemilih WHERE pilihan2 = $no_urut AND (prodi = 'Periklanan')";
                                                $dtotal_suara = mysqli_query($koneksi, $cari_data);
                                                echo $total_suara = mysqli_num_rows($dtotal_suara);
                                            } elseif ($prodi == 'Penyiaran') {
                                                $cari_data = "SELECT * FROM tbl_pemilih WHERE pilihan2 = $no_urut AND (prodi = 'Penyiaran')";
                                                $dtotal_suara = mysqli_query($koneksi, $cari_data);
                                                echo $total_suara = mysqli_num_rows($dtotal_suara);
                                            } elseif ($prodi == 'Fotografi') {
                                                $cari_data = "SELECT * FROM tbl_pemilih WHERE pilihan2 = $no_urut AND (prodi = 'Fotografi')";
                                                $dtotal_suara = mysqli_query($koneksi, $cari_data);
                                                echo $total_suara = mysqli_num_rows($dtotal_suara);
                                            } elseif ($prodi == 'Desain Grafis') {
                                                $cari_data = "SELECT * FROM tbl_pemilih WHERE pilihan2 = $no_urut AND (prodi = 'Desain Grafis')";
                                                $dtotal_suara = mysqli_query($koneksi, $cari_data);
                                                echo $total_suara = mysqli_num_rows($dtotal_suara);
                                            } elseif ($prodi == 'Desain Mode') {
                                                $cari_data = "SELECT * FROM tbl_pemilih WHERE pilihan2 = $no_urut AND (prodi = 'Desain Mode')";
                                                $dtotal_suara = mysqli_query($koneksi, $cari_data);
                                                echo $total_suara = mysqli_num_rows($dtotal_suara);
                                            } elseif ($prodi == 'Teknologi Rekayasa Multimedia') {
                                                $cari_data = "SELECT * FROM tbl_pemilih WHERE pilihan2 = $no_urut AND (prodi = 'Teknologi Rekayasa Multimedia')";
                                                $dtotal_suara = mysqli_query($koneksi, $cari_data);
                                                echo $total_suara = mysqli_num_rows($dtotal_suara);
                                            } elseif ($prodi == 'Animasi') {
                                                $cari_data = "SELECT * FROM tbl_pemilih WHERE pilihan2 = $no_urut AND (prodi = 'Animasi')";
                                                $dtotal_suara = mysqli_query($koneksi, $cari_data);
                                                echo $total_suara = mysqli_num_rows($dtotal_suara);
                                            } elseif ($prodi == 'Teknologi Permainan') {
                                                $cari_data = "SELECT * FROM tbl_pemilih WHERE pilihan2 = $no_urut AND (prodi = 'Teknologi Permainan')";
                                                $dtotal_suara = mysqli_query($koneksi, $cari_data);
                                                echo $total_suara = mysqli_num_rows($dtotal_suara);
                                            } elseif ($prodi == 'Perhotelan') {
                                                $cari_data = "SELECT * FROM tbl_pemilih WHERE pilihan2 = $no_urut AND (prodi = 'Perhotelan')";
                                                $dtotal_suara = mysqli_query($koneksi, $cari_data);
                                                echo $total_suara = mysqli_num_rows($dtotal_suara);
                                            } elseif ($prodi == 'Seni Kuliner') {
                                                $cari_data = "SELECT * FROM tbl_pemilih WHERE pilihan2 = $no_urut AND (prodi = 'Seni Kuliner')";
                                                $dtotal_suara = mysqli_query($koneksi, $cari_data);
                                                echo $total_suara = mysqli_num_rows($dtotal_suara);
                                            } elseif ($prodi == 'Film dan Televisi') {
                                                $cari_data = "SELECT * FROM tbl_pemilih WHERE pilihan2 = $no_urut AND (prodi = 'Film dan Televisi')";
                                                $dtotal_suara = mysqli_query($koneksi, $cari_data);
                                                echo $total_suara = mysqli_num_rows($dtotal_suara);
                                            } 
                                            ?>
                                             Suara</h6></center>
										</div>
									</article>
								</div>
							</div>
						</div>
					</div>
					<?php
					if ($kolom == 6) {
						echo "</div>";
						$proses = false;
						$kolom = 0;
					}
					?>
				<?php } ?>
				<?php
				if ($proses == true) {
					echo "</div>";
				}
				?>
				<!-- Product Row One -->

			</div>

<?php include 'footer.php'; ?>