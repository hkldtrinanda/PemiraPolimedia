<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("location:login.php");
	exit;
}
include 'koneksi.php';
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

		<!-- Main Content -->
		<div class="page-body-wrapper">

            <section class="pricing-list" id="plans">
                <div class="container">
                <div class="row" data-aos="fade-up" data-aos-offset="-500">
                    <div class="col-sm-12">
                    <div class="d-sm-flex justify-content-between align-items-center mb-2">

                        <div>
                        <h3 class="font-weight-medium text-dark ">Voting</h3>
                        <h5 class="text-dark ">Segera voting kandidat terbaik kamu. </h5>
                        </div>

                    </div>
                    </div>
                </div>


                <div data-aos="fade-up" data-aos-offset="-300">


                    <?php 
                    if(isset($_SESSION['level']) && $_SESSION['level'] == "User"){

                // cek jika pemilih sudah pernah melakukan voting
                    $status = $_SESSION['Belum memilih'];
                    $cek = mysqli_query($koneksi,"SELECT * FROM voting WHERE voting_pemilih='$status'");
                    $c = mysqli_num_rows($cek);
                    if($c > 0){
                        ?>
                        
                        <center>
                        <div class='alert alert-danger'><b>MOHON MAAF!</b><br>Anda sudah melakukan voting! <br> Setiap pemilih hanya bisa melakukan sekali voting.</div>
                        </center>
                        <br>
                        <h5 class="text-dark ">Kandidat Pilihan Anda</h5>
                        <hr>
                        <div class="row">
                        <?php 
                        $data = mysqli_fetch_assoc($cek);
                        $kandidat_pilihan = $data['voting_kandidat'];
                // menampilkan kandidat pilihan pemilih
                        $data = mysqli_query($koneksi,"SELECT * FROM calon_bph_mpm WHERE id='$kandidat_pilihan'");
                        while($d = mysqli_fetch_array($data)){
                            ?>

                            <div class="col-lg-3 offset-lg-4">
                            <div class="pricing-box p-2 pilih-kandidat" id="<?php echo $d['id']; ?>">
                                <h2 class="text-amount mb-4 mt-2">BPH-MPM</h2>
                                <?php if($d['foto'] == ""){ ?>
                                <img src="foto/bph_mpm/<?php echo $d['foto']; ?>" style="width: 190px;height: auto;">
                                <?php }else{ ?>
                                <img src="foto/bph_mpm/<?php echo $d['foto']; ?>" style="width: 190px;height: auto;">
                                <?php } ?>
                                <!-- <img src="assets_depan/images/starter.svg" alt="starter"> -->
                                <h6 class="font-weight-medium title-text"><?php echo $d['nama']; ?></h6>
                                <br>
                                <br>
                            </div>
                            </div>

                            <?php 
                        }
                        ?>
                        </div>

                        <?php
                    }else{
                        ?>
                        <form action="voting_aksi.php" method="POST" onsubmit="return confirm('APAKAH ANDA YAKIN INGIN MEMILIH KANDIDAT INI ?');">
                        <div class="row">
                            <?php 

                            $data = mysqli_query($koneksi,"SELECT * FROM calon_bph_mpm ORDER BY id ASC");
                            while($d = mysqli_fetch_array($data)){
                            ?>

                            <div class="col-md-3">
                                <div class="pricing-box p-2 pilih-kandidat" id="<?php echo $d['id']; ?>">
                                <h2 class="text-amount mb-4 mt-2">BPH-MPM</h2>
                                <?php if($d['foto'] == ""){ ?>
                                    <img src="foto/bph_mpm/<?php echo $d['foto']; ?>" style="width: 190px;height: auto;">
                                <?php }else{ ?>
                                    <img src="foto/bph_mpm/<?php echo $d['foto']; ?>" style="width: 190px;height: auto;">
                                <?php } ?>
                                <!-- <img src="assets_depan/images/starter.svg" alt="starter"> -->
                                <h6 class="font-weight-medium title-text"><?php echo $d['nama']; ?></h6>
                                <br>

                                <center>
                                    <input type="radio" id="centang_kandidat_<?php echo $d['id']; ?>" class="centang-kandidat" name="pilih" value="<?php echo $d['id'] ?>" required="required">
                                </center>
                                <br>
                                </div>
                            </div>


                            <?php 
                            }
                            ?>
                        </div>
                        <br>
                        <br>
                        <center>
                            <input type="submit" class="btn btn-success" value="VOTING!">
                        </center>
                        </form>
                        <?php
                    }
                    ?>


                    <?php

                    }else{
                    ?>

                    <div class="alert alert-danger text-center">
                        <br>
                        <h5>SILAHKAN LOGIN UNTUK VOTING!</h5>
                        <p>Anda harus login terlebih dahulu sebagai pemilih untuk melakukan voting. <br><br> <a class="btn btn-primary" href="login.php">Login Sekarang</a></p>
                        <br>
                    </div>

                    <?php
                    }
                    ?>

                    
                </div>
                </div>
            </section>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        
        </div>
		<!-- /Main Content -->

	</div>
	<!-- /#wrapper -->

	<!-- JavaScript -->

	<!-- jQuery -->
	<script src="../vendors/bower_components/jquery/dist/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<script src="dist/js/modal-data.js"></script>

	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>

	<!-- Owl JavaScript -->
	<script src="../vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

	<!-- Sweet-Alert  -->
	<script src="../vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
	<script src="dist/js/sweetalert-data.js"></script>

	<!-- Switchery JavaScript -->
	<script src="../vendors/bower_components/switchery/dist/switchery.min.js"></script>

	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>

	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>

</body>

</html>