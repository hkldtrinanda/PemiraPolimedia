<?php
session_start();
include_once 'koneksi.php';
include_once 'header.php';
?>

<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->

	<div class="wrapper pa-0">
		<header class="sp-header">
			<div class="sp-logo-wrap pull-left">
				<a href="../index.php">
					<img class="brand-img mr-10" src="../img/logo.png" alt="brand" />
					<span class="brand-text">PEMIRA PoliMedia</span>
				</a>
			</div>
			<div class="clearfix"></div>
		</header>

		<!-- Main Content -->
		<div class="page-wrapper pa-0 ma-0 auth-page">
			<div class="container-fluid">
				<!-- Row -->
				<div class="table-struct full-width full-height">
					<div class="table-cell vertical-align-middle auth-form-wrap">
						<div class="auth-form  ml-auto mr-auto no-float card-view pt-30 pb-30">
							<div class="row">
								<div class="col-sm-12 col-xs-12">
									<div class="mb-30">
										<h3 class="text-center txt-dark mb-10">Aplikasi E-Voting</h3>
										<h6 class="text-center nonecase-font txt-grey">PEMIRA PoliMedia</h6>
									</div>
									<div class="form-wrap">
										<form action="aksi_login.php" method="post">
											<div class="form-group">
												<label class="control-label mb-10" for="nim">NIM</label>
												<input type="text" name="nim" class="form-control" required="" id="nim" placeholder="Masukan NIM...">
											</div>
											<div class="form-group">
												<label class="pull-left control-label mb-10" for="kode_akses">Password</label>
												<div class="clearfix"></div>
												<input type="password" name="kode_akses" class="form-control" required="" id="kode_akses" placeholder="Masukan password...">
											</div>

											<div class="form-group text-center">
												<button type="submit" class="btn btn-primary btn-rounded" name="login" id="login">Masuk</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->
			</div>

		</div>
		<!-- /Main Content -->

	</div>
	<!-- /#wrapper -->

	<!-- JavaScript -->

	<!-- jQuery -->
	<script src="../vendors/bower_components/jquery/dist/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="../vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>

	<!-- Sweet-Alert  -->
	<script src="../vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>

	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>

	<!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5fba86d7a1d54c18d8ec31ec/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->

</html>