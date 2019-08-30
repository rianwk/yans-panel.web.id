<?php
// Script By Aditama Gilang Farel
ob_start();
session_start();

if(!isset($_SESSION['username'])) {
	header('location:../login.php');
} else {
	$username = $_SESSION['username'];
}

$shorttitle = "<b>INSTANT CUBES</b>";

require_once("include/config.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$tampil = mysql_fetch_array($query);

$queryto = mysql_query("SELECT * FROM order_history WHERE buyer = '$username'");
$tampilto = mysql_num_rows($queryto);

$usertotalsz = mysql_query("SELECT * FROM user");
$totalusersz = mysql_num_rows($usertotalsz);

$transaksisz = mysql_query("SELECT * FROM order_history");
$transaksizs = mysql_num_rows($transaksisz);

$level = $tampil['level'];
$balance = $tampil['balance'];
$balance_view = "Rp " . number_format($tampil['balance'],0,",",".");
$balance_used = "Rp " . number_format($tampil['balance_used'],0,",",".");
$jt = mysql_query("SELECT price, SUM(price) FROM order_history");
$jtr = mysql_num_rows($jt);
$htr = mysql_fetch_array($jt);
$total = "Rp " . number_format($htr['SUM(price)'],0,",",".");
?>

<!DOCTYPE html>
<html>

<head>

      
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Instant Cubes - Home</title>
        <meta name="description" content="Buy Cheap Twitter Followers, Instagram Followers, Instagram Likes, Facebook Fans, Page Likes, Youtube Views, Twitter Retweets, SMM, Reseller, Panel, Cheapest, Indonesian, Japan, World, Best, Very, SMM Panel Services, Social Media.">
        <meta name="keywords" content="SMedia Panel Panel, Panel SMM, SMM Murah, API Integration, Cheap SMM Panel, Panel SMM, Track Your Activity, Instagram Followers, Free Followers, Free Retweets, Costumer Service, Free Subcrive, Free Views, Beli Followers Instagram, Beli Followers, Social Media, Reseller, Smm, Panel, SMM, Fans, Instagram, Facebook, Youtube, Cheap, Reseller, Panel, Top, 10, Social, Rankings, Working, Fast, Cheap, Free, Safe, Automatic, Instant, Not, Manual, perfect.">
        <link rel="shortcut icon" href="images/favicon.png">
        <meta name="author" content="Agf Aditama">
        <meta property="fb:app_id" content="1524996877809621">
        <meta property="fb:admins" content="100012452522419">
        <meta property="og:image" content="http://instant-cubes.com/images/favicon.png">
        <meta name="google-site-verification" content="Vlbi9jONPdvGLGUW7ks-Nqkc1a5NhmS79A_V4WIbNNw">
    <title><?php echo $title; ?> - Home</title>
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!--My admin Custom CSS -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="global/morris/morris.css" type="text/css" />
    <!-- HTML5 Shiv and Respond.js IE8 support -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->


    <!-- jQuery-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="global/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <script src="global/sweetalert/sweetalert.min.js"></script>
    <link href="global/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="global/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
    <link href="global/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
</head>

<body class="nav-fixed">

    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <!-- End Preloader -->

    <section id="wrapper">
        <!-- Top Section -->
        <header class="toppart">
            <!-- Your Logo -->
            <div class="toppart-left">
                <div> <a href="/" class="logo"><i class="glyphicon glyphicon-fire"></i>&nbsp;<span><?php echo $shorttitle; ?></span></a> </div>
            </div>
            <!-- Left Navigation -->
            <div class="navbar navbar-default" role="navigation">
                <!-- Start Container -->
                <div class="container">
                    <div>
                        <!-- aero-left -->
                        <div class="pull-left">
                            <button class="button-menu-mobile open-left"> <i class="ti-menu"></i> </button>
                            <span class="clearfix"></span> </div>
                        <!-- end aero-left -->
                        <!-- Start-top-part-left-nav -->
                        <ul class="nav no-block navbar-nav navbar-left pull-left ">
                            <!-- Alert Notification -->
<?php
 $querya = "SELECT * FROM balance_history WHERE username = '$username' ORDER BY id DESC LIMIT 5";
 $exea = mysql_query($querya);
 $counta = mysql_num_rows($exea);
?>
                            <li class="dropdown hidden-xs">
                                <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"> <i class="fa fa-bullhorn"></i> <span class="badge badge-xs badge-danger"><?php echo $counta; ?></span></a>
                                <ul class="dropdown-menu dropdown-menu-lg">
                                    <li class="list-group nicescroll notification-list">
<?php
 $noq = 1;
 while($row = mysql_fetch_assoc($exea)){
  $actionq = $row['action'];
  $msgq = $row['msg'];
  $quantityq = $row['quantity'];
?>
                                        <!-- Alert List-->
                                        <a href="javascript:void(0);" class="list-group-item ">
                                            <div class="media">
                                                <div class="pull-left"> <?php if ($actionq == "Cut Balance") { ?><em class="fa fa-minus-circle"></em><? } else if ($actionq == "Add Balance") { ?><em class="fa fa-plus-circle"></em><? } ?> </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading"><?php echo $actionq; ?> (<?php echo "Rp " . number_format($quantityq,0,",","."); ?>)</h5>
                                                    <p class="m-0"> <small><?php echo $msgq; ?></small> </p>
                                                </div>
                                            </div>
                                        </a>
<?
$noq++;
} ?>
                                    </li>
                                </ul>
                            </li>
                            <!-- End Alert Notification -->
                        </ul>
                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li class="dropdown"> <a href="#" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><b class="hidden-xs"><i class="fa fa-user m-r-5"></i> <?php echo $username; ?></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="?content=change-password"><i class="fa fa-gear m-r-5"></i> Ganti Password</a>
                                    </li>
                                    <li><a href="logout.php"><i class="fa fa-power-off m-r-5"></i> Keluar</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--Close navbar -->
                </div>
            </div>
        </header>
        <!-- Top Section End -->
        <!-- Left Navigation -->
        <aside class="left-side-nav">
            <div class="navigationbox nicescroll">
                <div id="left-navigation">
                    <ul>
                    <?php include_once "include/menu.php"; ?>
                    </ul>
                </div>
            </div>
        </aside>
        <!-- Left Navigation End -->
        <!-- Main Content -->
        <div class="page-container">
            <!-- Start Page wrapper -->
            <div class="page-wrapper">
                <!-- Start Container -->
                <div class="container">
                <div id="main"><!-- main -->
<?php
$content = $_GET['content'];
$admin = $_GET['admin'];
$reseller = $_GET['reseller'];
$id = $_GET['id'];
$agen = $_GET['agen'];
if ($content == "change-password") {
	include_once "content/change-password.php";
} else if ($content == "new-order") {
	include_once "content/new-order.php";
} else if ($content == "order-history") {
	include_once "content/order-history.php";
} else if ($content == "add-balance") {
	include_once "content/add-balance.php";
} else if ($content == "history-balance") {
	include_once "content/history-balance.php";
} else if ($content == "service-list") {
	include_once "content/service-list.php";
} else if ($content == "contact") {
	include_once "content/contact.php";
} else if ($content == "invoice") {
	include_once "invoice.php";
} else if ($content == "gemscool") {
	include_once "content/gemscool.php";
} else if ($content == "garena") {
	include_once "content/garena.php";

} else if ($admin == "user") {
	include_once "admin/user.php";
} else if ($admin == "service") {
	include_once "admin/service.php";
} else if ($admin == "order") {
	include_once "admin/order.php";
} else if ($admin == "api") {
	include_once "admin/api.php";
} else if ($admin == "balance") {
	include_once "admin/balance.php";
} else if ($admin == "gemscool-cash") {
	include_once "admin/gemscool.php";
} else if ($admin == "garena-cash") {
	include_once "admin/garena.php";

} else if ($reseller == "user_add") {
	include_once "admin/pendaftaran.php";
} else if ($reseller == "transfer") {
	include_once "admin/transfer.php";
} else if ($agen == "transfer") {
	include_once "admin/transfer.php";
} else { ?>
<script>
swal("INSTANT CUBES", "Selamat datang <?php echo $username; ?> :)");
</script>
                    <!-- Page-Title -->
                    <div class="row title_bg">
                        <div class="col-sm-12">
                            <h4 class="page-title"><i class="fa fa-cubes"></i> INSTANT CUBES</h4>
                            <p class="text-muted page-title-alt">Selamat Datang Di Web Panel INCUB :)</p>
                        </div>
                    </div>
                    <!-- Page Title End -->

                   
				<!-- Content area -->
				<div class="content">

					<!-- Main charts -->
					<div class="row">
						
							<!-- Quick stats boxes -->
							<div class="row">
								<div class="col-lg-4">

									<!-- Members online -->
									<div class="panel bg-teal-400">
										<div class="panel-body">
											<div class="heading-elements">

							                		</li>
							                	</ul>
											</div>

							<i class="fa fa-list"></i> <b>Total Transaksi :</b>				<h3 class="counter"><?php echo $transaksizs; ?></h3>
											
											
										</div>

										<div class="container-fluid">
											<div id="members-online"></div>
										</div>
									</div>
									<!-- /members online -->

								</div>

								<div class="col-lg-4">

									<!-- Current server load -->
									<div class="panel bg-pink-400">
										<div class="panel-body">
											<div class="heading-elements">
											<i class="icon-spinner4 spinner"></i>
						                	</div>
										<i class="ti-user"></i>	<b>User :</b><br/>
<h3 class="counter"><?php echo $totalusersz; ?></h3>

		
										</div>

										<div id="server-load"></div>
									</div>
									<!-- /current server load -->

								</div>

								<div class="col-lg-4">
									<!-- Today's revenue -->
									<div class="panel bg-blue-400">
										<div class="panel-body">
											<div class="heading-elements">

							                		</li>
							                	</ul>
						                	</div>											<i class="fa fa-credit-card"></i> <b>Saldo :</b>

											<h3 class="no-margin"><?php echo $balance_view; ?></h3>

					
										</div>

										<div id="today-revenue"></div>
									</div>
									<!-- /today's revenue -->

								</div>
							</div>
							<!-- /quick stats boxes -->
							<!-- Traffic sources -->

                            <div class="col-md-12" id="indexmain2">
                                <div class="panel panel-color panel-primary">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title"><i class="fa fa-bullhorn"></i> Informasi Terbaru</h3>
                                    </div> 
                                    <div class="panel-body" style="height: 200px; overflow-y: auto;">
                                         <div class="alert alert-danger"><strong><i class="ion-information-circled"></i> 10 Desember 2016</strong><br /><span class="label label-inverse">UPDATE</span> New Update Support "<font color="silver" face="comic sans"><a href="http://www.instant-cubes.com/kontakadmin.php" class="text-primary m-1-5"><b>Kontak Admin</b></a></font>"</div>
                                        <div class="alert alert-info"><strong><i class="ion-information-circled"></i> 05 Desember 2016</strong><br /><span class="label label-inverse">UPDATE</span> New Update INSTANT CUBES</div>
                                        <div class="alert alert-danger"><strong><i class="ion-information-circled"></i> 05 Desember 2016</strong><br /><span class="label label-inverse">UPDATE</span> Perubahan Sistem Dan Tampilan Web.</div>
                                        <div class="alert alert-info"><strong><i class="ion-information-circled"></i> 05 Desember 2016</strong><br /><span class="label label-inverse">INFORMASI</span> Memperjual Belikan Akun Akan Kena "<font color="red"><b><i>BANNED ACCOUNT</b></i></font>" Tanpa Refund :)</div>
                                        <div class="alert alert-danger"><strong><i class="ion-information-circled"></i> 05 Desember 2016</strong><br /><span class="label label-inverse">INFORMASI</span> Anda Mengalami Masalah? Silahkan Hubungi <a href="https://www.instant-cubes.com/kontakadmin.php" class="text-primary m-1-5"><b>ADMIN 1</b></a></div>
                                        <div class="alert alert-info"><strong><i class="ion-information-circled"></i> 05 Desember 2016</strong><br /><span class="label label-inverse">INFORMASI</span> Apabila Status Orderan <span class="label label-warning">Pending</span> Mohon Untuk Menghubungi <a href="https://www.instant-cubes.com/kontakadmin.php" class="text-primary m-1-5"><b>ADMIN 1</b></a>. Jika Dalam Kurun Waktu 1x24 Jam dan Orderan Anda Belum Masuk Tetapi Status Orderan <span class="label label-success">Success</span> Mohon Untuk Segera Menghubungi <a href="https://www.instant-cubes.com/kontakadmin.php" class="text-primary m-1-5"><b>ADMIN 1</b></a> Untuk Meminta <span class="label label-primary">Refund Saldo</span> :)</div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div id="loading" style="display: none;">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                            <span class="sr-only">100% Complete</span>
                                        </div>
                                    </div>
                                </div>
								
                                  <div id="indexmain">
                                    <div class="panel panel-default panel-fill">
                                        <div class="panel-heading"> 
                                            <h3 class="panel-title"><i class="fa fa-dashcube"></i> Informasi Anda</h3>
                                        </div> 
                                        <div class="panel-body" style="height: 300px; overflow-y: auto;">
                                            <div class="about-info-p">
                                                <strong>Total Pesanan Anda</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $tampilto; ?></p>
                                            </div>
                                            <div class="about-info-p">
                                                <strong>Saldo Yang Telah Digunakan</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $balance_used; ?></p>
                                            </div>
                                            <div class="about-info-p">
                                                <strong>Username</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $username; ?></p>
                                            </div>
                                            <div class="about-info-p m-b-0">
                                                <strong>Total Semua Transaksi</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $total; ?>,- for <?php echo $transaksizs; ?> Transactions</p>
                                            </div>
                                        </div> 
                                    </div>
								</div>
                            </div>
      
                    <!-- Row-->
<? } ?>
                </div><!-- end main -->

                </div>
                <!-- End container -->
            </div>
            <!-- End main content -->
            <footer class="footer text-center"> Copyright &copy; 2016. <a href="http://instant-cubes.com">Instant Cubes</a>. All Rights Reserved.</footer>
        </div>
    </section>

    <script src="js/mobile.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <!-- jQuery Notification Peity chart -->
    <script src="global/peity/jquery.peity.min.js"></script>
    <!-- jQuery Customs -->
    <script src="js/custom.js"></script>
    <script src="js/custom-widget.js"></script>
    
    <script src="global/datatables/jquery.dataTables.min.js"></script>
    <script src="global/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="global/custom-select/custom-select.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function(){
      $('#myTable').DataTable();
    });
</script>
<script type="text/javascript">
function send()
{
        showloading();
	var service = $('#service').val();
	var link = $('#link').val();
	var jumlah = $('#jumlah').val();
	$.ajax({
		url	: 'content/new-order-act.php',
		data	: 'service='+service+'&link='+link+'&jumlah='+jumlah,
		type	: 'POST',
		dataType: 'html',
		success	: function(msg){
hideloading();
	             $("#result").prepend(msg).show("slow");
	        }
	});
}

function getcut(quantity){
 var rate = $("#rate").val();
 var hasil = eval(quantity) * rate;
 $('#cutbalance').val(hasil);
} 

function getbal(quantity){
var method = $("#method").val();

 if (method== "BANK"){
  var hasil = eval(quantity);
  $('#getbalance').val(hasil);

 } else if (method== "PULSA"){
  var hasil = eval(quantity) * 0.8;
  $('#getbalance').val(hasil);
 }

}

</script>
<script type="text/javascript">
$(document).ready(function(){

  $("#category").change(function(){
    var category = $("#category").val();

	$.ajax({
		url	: 'include/service.php',
		data	: 'category='+category,
		type	: 'POST',
		dataType: 'html',
		success	: function(msg){
	             $("#service").html(msg);
	        }
	});
  });

  $("#service").change(function(){
    var service = $("#service").val();

	$.ajax({
		url	: 'include/min.php',
		data	: 'service='+service,
		type	: 'POST',
		dataType: 'html',
		success	: function(msg){
	             $("#min").val(msg);
	        }
	});

	$.ajax({
		url	: 'include/max.php',
		data	: 'service='+service,
		type	: 'POST',
		dataType: 'html',
		success	: function(msg){
	             $("#max").val(msg);
	        }
	});

	$.ajax({
		url	: 'include/rate.php',
		data	: 'service='+service,
		type	: 'POST',
		dataType: 'html',
		success	: function(msg){
	             $("#rate").val(msg);
	        }
	});

	$.ajax({
		url	: 'include/price.php',
		data	: 'service='+service,
		type	: 'POST',
		dataType: 'html',
		success	: function(msg){
	             $("#price").val(msg);
	        }
	});
  });

});
</script>
</body>


</html>
<script src="http://repository.chatwee.com/scripts/0526aceda822e5d3302ef75a344a49b3.js" type="text/javascript" charset="UTF-8"></script>
<? ob_flush(); ?>
