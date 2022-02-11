<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("location:login.php");
	exit;
}
$dibatasi = $_SESSION['level'] == 'User';
if ($dibatasi) {
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
	<!--/Preloader-->
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
						<a class="active" href="#">
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
			<div class="container-fluid">

				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h5 class="txt-dark">Data Pemilih</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="index.php">Dashboard</a></li>
							<li class="active"><span>data pemilih</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Unggah Data (Format file .xls)</h6>
								</div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<?php
									if (isset($_GET['berhasil'])) {
										echo "<p>" . $_GET['berhasil'] . " Data Pemilih berhasil diUpload</p>";
									}
									?>
									<div class="mt-40">
										<form action="aksi_upload_pemilih.php" method="post" enctype="multipart/form-data">
											<div class="form-group">
												<input type="file" name="file_dpt" required="required" multiple class="form-control-file">
											</div>
											<div class="form-group">
												<input type="submit" name="upload" class="btn btn-success" value="Upload">
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="example" class="table table-hover display  pb-30">
												<thead>
													<tr>
														<th>NIM</th>
														<th>Nama</th>
														<th>Prodi</th>
														<th>Smt</th>
														<th>Password</th>
														<th>Status</th>
														<th>Hapus Data</th>
														<th>Edit Data</th>
													</tr>
												</thead>

												<tbody>
													<?php
													$data_dpt = mysqli_query($koneksi, "SELECT * FROM tbl_pemilih");
													while ($d = mysqli_fetch_array($data_dpt)) {
													?>
														<tr>
															<td><?php echo $d['nim']; ?></td>
															<td><?php echo $d['nama_mhs']; ?></td>
															<td><?php echo $d['prodi']; ?></td>
															<td><?php echo $d['semester']; ?></td>
															<td><?php echo $d['kode_akses']; ?> </td>
															<td><?php echo $d['status']; ?></td>
															<td><a class="btn btn-danger" onclick="return confirm('Yakin hapus data ini !!!')" href="aksi_hapus_pemilih.php?nim=<?php echo $d['nim']; ?>"><i class="fa fa-trash"></i></a></td>
															<td><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#updateuser<?php echo $id; ?>"><i class="fa fa-pencil"></i></a></td>
														</tr>
														<div class="example-modal">
                                                    <div id="updateuser<?php echo $id; ?>" class="modal fade" role="dialog" style="display:none;">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h3 class="modal-title">Edit Data Pemilih</h3>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form action="aksi_edit_pemilih.php?act=updateuser" method="post" role="form">
                                                              <?php
                                                              $id = $d['id'];
                                                              $query = "SELECT * FROM tbl_pemilih WHERE id='$id'";
                                                              $result = mysqli_query($koneksi, $query);
                                                              while ($d = mysqli_fetch_assoc($result)) {
                                                              ?>
                                                              <div class="form-group">
                                                                <div class="row">
                                                                  <label class="col-sm-3 control-label text-right">id <span class="text-red">*</span></label>         
                                                                  <div class="col-sm-8"><input type="text" class="form-control" name="id" placeholder="id" value="<?php echo $d['id']; ?>"></div>
                                                                </div>
                                                              </div>
                                                              <div class="form-group">
                                                                <div class="row">
                                                                  <label class="col-sm-3 control-label text-right">NIM <span class="text-red">*</span></label>         
                                                                  <div class="col-sm-8"><input type="text" class="form-control" name="nim" placeholder="nim" value="<?php echo $d['nim']; ?>"></div>
                                                                </div>
                                                              </div>
                                                              <div class="form-group">
                                                                <div class="row">
                                                                  <label class="col-sm-3 control-label text-right">Nama Mahasiswa <span class="text-red">*</span></label>
                                                                  <div class="col-sm-8"><input type="text" class="form-control" name="nama_mhs" placeholder="nama_mhs" value="<?php echo $d['nama_mhs']; ?>"></div>
                                                                </div>
                                                              </div>
                                                              <div class="form-group">
                                                                <div class="row">
                                                                  <label class="col-sm-3 control-label text-right">Prodi<span class="text-red">*</span></label>
                                                                  <div class="col-sm-8"><input type="text" class="form-control" name="prodi" placeholder="Prodi" value="<?php echo $d['prodi']; ?>"></div>
                                                                </div>
                                                              </div>
                                                              <div class="form-group">
                                                                <div class="row">
                                                                  <label class="col-sm-3 control-label text-right">Kode Akses <span class="text-red">*</span></label>
                                                                  <div class="col-sm-8"><input type="text" class="form-control" name="kode_akses" placeholder="Kode Akses" value="<?php echo $d['kode_akses']; ?>">
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                                                <input type="submit" onclick="return confirm('Apakah anda yakin edit data ini !!!')" name="submit" class="btn btn-primary" value="Edit">
                                                              </div>
                                                              <?php
                                                              }
                                                              ?>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
													<?php } ?>
												</tbody>

												<tfoot>
													<tr>
														<th>NIM</th>
														<th>Nama</th>
														<th>Prodi</th>
														<th>Smt</th>
														<th>Password</th>
														<th>Status</th>
														<th>Hapus Data</th>
														<th>Edit Data</th>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->
			</div>
			<!-- Container -->

<?php include 'footer.php'; ?>