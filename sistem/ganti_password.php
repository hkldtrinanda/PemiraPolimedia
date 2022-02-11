<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("location:login.php");
	exit;
}
include 'koneksi.php';
include 'header.php'; 
?>

<body>
	<!--Preloader-->
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
								<a href="#">Ketua & Wakil HIMA</a>
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
					<a class="active" href="ganti_password.php">
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
						<h5 class="txt-dark">ganti password</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="index.php">Dashboard</a></li>
							<li class="active"><span>ganti password</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

				<!-- Row -->
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark"><?php echo $_SESSION['nama_mhs']; ?> silakan isi form di bawah ini</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-12 col-xs-12">
											<div class="form-wrap">
												<form method="post" action="aksi_ganti_password.php" enctype="multipart/form-data">
													<input type="hidden" name="kodeakses" value="<?= $_SESSION['kode_akses'] ?>">
													<div class="form-group">
														<label class="control-label mb-10" for="password_baru">Password Baru</label>
														<div class="input-group">
															<div class="input-group-addon"><i class="icon-lock"></i></div>
															<input required="" type="password" name="password_baru" class="form-control" id="password_baru" placeholder="">
														</div>
													</div>
													<div class="form-group">
														<label class="control-label mb-10" for="konf_password">Konfirmasi Password Baru</label>
														<div class="input-group">
															<div class="input-group-addon"><i class="icon-lock"></i></div>
															<input required="" required="" type="password" name="konf_password" class="form-control" id="konf_password" placeholder="">
														</div>
													</div>
													<button type="submit" name="ganti" class="btn btn-success mr-10" onclick="return confirm('Yakin ganti password?')">Simpan</button>
													<button type="reset" class="btn btn-default">Reset</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->

			</div> 
			
<?php include 'footer.php'; ?>