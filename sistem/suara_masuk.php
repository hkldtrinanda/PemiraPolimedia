<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("location:login.php");
	exit;
}
include 'koneksi.php';
include 'header.php';

$dtotal_dpt_tg = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Teknik Grafika'");
$total_dpt_tg = mysqli_num_rows($dtotal_dpt_tg);
$ddpt_sudah_memilih_tg = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Teknik Grafika' AND status='Sudah memilih'");
$dpt_sudah_memilih_tg = mysqli_num_rows($ddpt_sudah_memilih_tg);
$persen_suara_tg = round(($dpt_sudah_memilih_tg * 100)  / $total_dpt_tg);

$dtotal_dpt_tk = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Teknik Kemasan'");
$total_dpt_tk = mysqli_num_rows($dtotal_dpt_tk);
$ddpt_sudah_memilih_tk = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Teknik Kemasan' AND status='Sudah memilih'");
$dpt_sudah_memilih_tk = mysqli_num_rows($ddpt_sudah_memilih_tk);
$persen_tk = $total_dpt_tk / 100;
$persen_suara_tk = $dpt_sudah_memilih_tk / $persen_tk;

$dtotal_dpt_tm = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Teknik Perbaikan Mesin'");
$total_dpt_tm = mysqli_num_rows($dtotal_dpt_tm);
$ddpt_sudah_memilih_tm = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Teknik Perbaikan Mesin' AND status='Sudah memilih'");
$dpt_sudah_memilih_tm = mysqli_num_rows($ddpt_sudah_memilih_tm);
$persen_tm = $total_dpt_tm / 100;
$persen_suara_tm = $dpt_sudah_memilih_tm / $persen_tm;

$dtotal_dpt_pnb = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Penerbitan'");
$total_dpt_pnb = mysqli_num_rows($dtotal_dpt_pnb);
$ddpt_sudah_memilih_pnb = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Penerbitan' AND status='Sudah memilih'");
$dpt_sudah_memilih_pnb = mysqli_num_rows($ddpt_sudah_memilih_pnb);
$persen_pnb = $total_dpt_pnb / 100;
$persen_suara_pnb = $dpt_sudah_memilih_pnb / $persen_pnb;

$dtotal_dpt_bc = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Penyiaran'");
$total_dpt_bc = mysqli_num_rows($dtotal_dpt_bc);
$ddpt_sudah_memilih_bc = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Penyiaran' AND status='Sudah memilih'");
$dpt_sudah_memilih_bc = mysqli_num_rows($ddpt_sudah_memilih_bc);
$persen_bc = $total_dpt_bc / 100;
$persen_suara_bc = $dpt_sudah_memilih_bc / $persen_bc;

$dtotal_dpt_pkl = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Periklanan'");
$total_dpt_pkl = mysqli_num_rows($dtotal_dpt_pkl);
$ddpt_sudah_memilih_pkl = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Periklanan' AND status='Sudah memilih'");
$dpt_sudah_memilih_pkl = mysqli_num_rows($ddpt_sudah_memilih_pkl);
$persen_pkl = $total_dpt_pkl / 100;
$persen_suara_pkl = $dpt_sudah_memilih_pkl / $persen_pkl;

$dtotal_dpt_ftg = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Fotografi'");
$total_dpt_ftg = mysqli_num_rows($dtotal_dpt_ftg);
$ddpt_sudah_memilih_ftg = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Fotografi' AND status='Sudah memilih'");
$dpt_sudah_memilih_ftg = mysqli_num_rows($ddpt_sudah_memilih_ftg);
$persen_ftg = $total_dpt_ftg / 100;
$persen_suara_ftg = $dpt_sudah_memilih_ftg / $persen_ftg;

$dtotal_dpt_dg = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Desain Grafis'");
$total_dpt_dg = mysqli_num_rows($dtotal_dpt_dg);
$ddpt_sudah_memilih_dg = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Desain Grafis' AND status='Sudah memilih'");
$dpt_sudah_memilih_dg = mysqli_num_rows($ddpt_sudah_memilih_dg);
$persen_dg = $total_dpt_dg / 100;
$persen_suara_dg = $dpt_sudah_memilih_dg / $persen_dg;

$dtotal_dpt_dm = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Desain Mode'");
$total_dpt_dm = mysqli_num_rows($dtotal_dpt_dm);
$ddpt_sudah_memilih_dm = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Desain Mode' AND status='Sudah memilih'");
$dpt_sudah_memilih_dm = mysqli_num_rows($ddpt_sudah_memilih_dm);
$persen_dm = $total_dpt_dm / 100;
$persen_suara_dm = $dpt_sudah_memilih_dm / $persen_dm;

$dtotal_dpt_mm = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Teknologi Rekayasa Multimedia'");
$total_dpt_mm = mysqli_num_rows($dtotal_dpt_mm);
$ddpt_sudah_memilih_mm = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Teknologi Rekayasa Multimedia' AND status='Sudah memilih'");
$dpt_sudah_memilih_mm = mysqli_num_rows($ddpt_sudah_memilih_mm);
$persen_mm = $total_dpt_mm / 100;
$persen_suara_mm = $dpt_sudah_memilih_mm / $persen_mm;

$dtotal_dpt_anm = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Animasi'");
$total_dpt_anm = mysqli_num_rows($dtotal_dpt_anm);
$ddpt_sudah_memilih_anm = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Animasi' AND status='Sudah memilih'");
$dpt_sudah_memilih_anm = mysqli_num_rows($ddpt_sudah_memilih_anm);
$persen_anm = $total_dpt_anm / 100;
$persen_suara_anm = $dpt_sudah_memilih_anm / $persen_anm;

$dtotal_dpt_gt = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Teknologi Permainan'");
$total_dpt_gt = mysqli_num_rows($dtotal_dpt_gt);
$ddpt_sudah_memilih_gt = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Teknologi Permainan' AND status='Sudah memilih'");
$dpt_sudah_memilih_gt = mysqli_num_rows($ddpt_sudah_memilih_gt);
$persen_gt = $total_dpt_gt / 100;
$persen_suara_gt = $dpt_sudah_memilih_gt / $persen_gt;

$dtotal_dpt_ph = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Perhotelan'");
$total_dpt_ph = mysqli_num_rows($dtotal_dpt_ph);
$ddpt_sudah_memilih_ph = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Perhotelan' AND status='Sudah memilih'");
$dpt_sudah_memilih_ph = mysqli_num_rows($ddpt_sudah_memilih_ph);
$persen_ph = $total_dpt_ph / 100;
$persen_suara_ph = $dpt_sudah_memilih_ph / $persen_ph;

$dtotal_dpt_sk = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Seni Kuliner'");
$total_dpt_sk = mysqli_num_rows($dtotal_dpt_sk);
$ddpt_sudah_memilih_sk = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Seni Kuliner' AND status='Sudah memilih'");
$dpt_sudah_memilih_sk = mysqli_num_rows($ddpt_sudah_memilih_sk);
$persen_sk = $total_dpt_sk / 100;
$persen_suara_sk = $dpt_sudah_memilih_sk / $persen_sk;

$dtotal_dpt_ftv = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Film dan Televisi'");
$total_dpt_ftv = mysqli_num_rows($dtotal_dpt_ftv);
$ddpt_sudah_memilih_ftv = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih WHERE prodi='Film dan Televisi' AND status='Sudah memilih'");
$dpt_sudah_memilih_ftv = mysqli_num_rows($ddpt_sudah_memilih_ftv);
$persen_ftv = $total_dpt_ftv / 100;
$persen_suara_ftv = $dpt_sudah_memilih_ftv / $persen_ftv;
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
					<a class="active" href="suara_masuk.php">
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

				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">Hasil Suara</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="index.php">Dashboard</a></li>
							<li class="active"><span>hasil suara</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

				<!-- Row -->
				<div class="row">

					<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark"></h6>
								</div>
								<div class="pull-right">
									<a href="#" class="pull-left inline-block full-screen mr-15">
										<i class="zmdi zmdi-fullscreen"></i>
									</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body row pa-0">
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table table-hover mb-0">
												<thead>
													<tr>
														<th>Prodi</th>
														<th>Jumlah Sudah Memilih</th>
														<th>Persentase</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Teknik Grafika</td>
														<td>
															<div class="progress progress-xs mb-0 ">
																<div class="progress-bar progress-bar-info active progress-bar-striped" style="width: <?php echo $persen_suara_tg; ?>%"></div>
															</div>
														</td>
														<td><?php echo $persen_suara_tg; ?>%</td>

													</tr>
													<tr>
														<td>Teknik Kemasan</td>
														<td>
															<div class="progress progress-xs mb-0 ">
																<div class="progress-bar progress-bar-warning active progress-bar-striped" style="width: <?php echo $persen_suara_tk; ?>%"></div>
															</div>
														</td>
														<td><?php echo $persen_suara_tk; ?>%</td>

													</tr>
													<tr>
														<td>Teknik Mesin</td>
														<td>
															<div class="progress progress-xs mb-0 ">
																<div class="progress-bar progress-bar-danger active progress-bar-striped" style="width: <?php echo $persen_suara_tm; ?>%"></div>
															</div>
														</td>
														<td><?php echo $persen_suara_tm; ?>%</td>

													</tr>
													<tr>
														<td>Penerbitan</td>
														<td>
															<div class="progress progress-xs mb-0 ">
																<div class="progress-bar progress-bar-primary active progress-bar-striped" style="width: <?php echo $persen_suara_pnb; ?>%"></div>
															</div>
														</td>
														<td><?php echo $persen_suara_pnb; ?>%</td>

													</tr>
													<tr>
														<td>Penyiaran</td>
														<td>
															<div class="progress progress-xs mb-0 ">
																<div class="progress-bar progress-bar-success active progress-bar-striped" style="width: <?php echo $persen_suara_bc; ?>%"></div>
															</div>
														</td>
														<td><?php echo $persen_suara_bc; ?>%</td>

													</tr>
													<tr>
														<td>Periklanan</td>
														<td>
															<div class="progress progress-xs mb-0 ">
																<div class="progress-bar progress-bar-info active progress-bar-striped" style="width: <?php echo $persen_suara_pkl; ?>%"></div>
															</div>
														</td>
														<td><?php echo $persen_suara_pkl; ?>%</td>

													</tr>
													<tr>
														<td>Fotografi</td>
														<td>
															<div class="progress progress-xs mb-0 ">
																<div class="progress-bar progress-bar-warning active progress-bar-striped" style="width: <?php echo $persen_suara_ftg; ?>%"></div>
															</div>
														</td>
														<td><?php echo $persen_suara_ftg; ?>%</td>

													</tr>
													<tr>
														<td>Desain Grafis</td>
														<td>
															<div class="progress progress-xs mb-0 ">
																<div class="progress-bar progress-bar-danger active progress-bar-striped" style="width: <?php echo $persen_suara_dg; ?>%"></div>
															</div>
														</td>
														<td><?php echo $persen_suara_dg; ?>%</td>

													</tr>
													<tr>
														<td>Desain Mode</td>
														<td>
															<div class="progress progress-xs mb-0 ">
																<div class="progress-bar progress-bar-primary active progress-bar-striped" style="width: <?php echo $persen_suara_dm; ?>%"></div>
															</div>
														</td>
														<td><?php echo $persen_suara_dm; ?>%</td>

													</tr>
													<tr>
														<td>Teknologi Rekayasa Multimedia</td>
														<td>
															<div class="progress progress-xs mb-0 ">
																<div class="progress-bar progress-bar-success active progress-bar-striped" style="width: <?php echo $persen_suara_mm; ?>%"></div>
															</div>
														</td>
														<td><?php echo $persen_suara_mm; ?>%</td>

													</tr>
													<tr>
														<td>Animasi</td>
														<td>
															<div class="progress progress-xs mb-0 ">
																<div class="progress-bar progress-bar-info active progress-bar-striped" style="width: <?php echo $persen_suara_anm; ?>%"></div>
															</div>
														</td>
														<td><?php echo $persen_suara_anm; ?>%</td>

													</tr>
													<tr>
														<td>Game Teknologi</td>
														<td>
															<div class="progress progress-xs mb-0 ">
																<div class="progress-bar progress-bar-warning active progress-bar-striped" style="width: <?php echo $persen_suara_gt; ?>%"></div>
															</div>
														</td>
														<td><?php echo $persen_suara_gt; ?>%</td>

													</tr>
													<tr>
														<td>Perhotelan</td>
														<td>
															<div class="progress progress-xs mb-0 ">
																<div class="progress-bar progress-bar-danger active progress-bar-striped" style="width: <?php echo $persen_suara_ph; ?>%"></div>
															</div>
														</td>
														<td><?php echo $persen_suara_ph; ?>%</td>

													</tr>
													<tr>
														<td>Seni Kuliner</td>
														<td>
															<div class="progress progress-xs mb-0 ">
																<div class="progress-bar progress-bar-primary active progress-bar-striped" style="width: <?php echo $persen_suara_sk; ?>%"></div>
															</div>
														</td>
														<td><?php echo $persen_suara_sk; ?>%</td>

													</tr>
													<tr>
														<td>Film & Televisi</td>
														<td>
															<div class="progress progress-xs mb-0 ">
																<div class="progress-bar progress-bar-primary active progress-bar-striped" style="width: <?php echo $persen_suara_ftv; ?>%"></div>
															</div>
														</td>
														<td><?php echo $persen_suara_ftv; ?>%</td>

													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Row -->
			</div> 

<?php include 'footer.php'; ?>