<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> | Dashboard</title>
		<link href="<?php echo CSS_URL; ?>bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo PUBLIC_URL; ?>font-awesome/css/font-awesome.css" rel="stylesheet">
		<!-- Toastr style -->
		<link href="<?php echo CSS_URL; ?>plugins/toastr/toastr.min.css" rel="stylesheet">
		<!-- Gritter -->
		<link href="<?php echo JS_URL; ?>plugins/gritter/jquery.gritter.css" rel="stylesheet">
		<!-- Data Tables -->
		<link href="<?php echo CSS_URL; ?>plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    	<link href="<?php echo CSS_URL; ?>plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    	<link href="<?php echo CSS_URL; ?>plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
		<link href="<?php echo CSS_URL; ?>animate.css" rel="stylesheet">
		<link href="<?php echo CSS_URL; ?>style.css" rel="stylesheet">
	</head>
	<body>
		<div id="wrapper">
			<?php 
				include 'leftMenu.php';
				?>
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<div class="row border-bottom">
					<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
						<div class="navbar-header">
							<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
							<form role="search" class="navbar-form-custom" method="post" action="search_results.html">
								<div class="form-group">
									<input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
								</div>
							</form>
						</div>
						<ul class="nav navbar-top-links navbar-right">
							<li>
								<span class="m-r-sm text-muted welcome-message">Welcome to SinglePurposeFramework Admin Theme.</span>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
								<i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
								</a>
								<ul class="dropdown-menu dropdown-messages">
									<li>
										<div class="dropdown-messages-box">
											<a href="profile.html" class="pull-left">
											<img alt="image" class="img-circle" src="<?php echo IMG_URL; ?>a7.jpg">
											</a>
											<div class="media-body">
												<small class="pull-right">46h ago</small>
												<strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
												<small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
											</div>
										</div>
									</li>
									<li class="divider"></li>
									<li>
										<div class="dropdown-messages-box">
											<a href="profile.html" class="pull-left">
											<img alt="image" class="img-circle" src="<?php echo IMG_URL; ?>a4.jpg">
											</a>
											<div class="media-body ">
												<small class="pull-right text-navy">5h ago</small>
												<strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
												<small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
											</div>
										</div>
									</li>
									<li class="divider"></li>
									<li>
										<div class="dropdown-messages-box">
											<a href="profile.html" class="pull-left">
											<img alt="image" class="img-circle" src="<?php echo IMG_URL; ?>profile.jpg">
											</a>
											<div class="media-body ">
												<small class="pull-right">23h ago</small>
												<strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
												<small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
											</div>
										</div>
									</li>
									<li class="divider"></li>
									<li>
										<div class="text-center link-block">
											<a href="mailbox.html">
											<i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
											</a>
										</div>
									</li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
								<i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
								</a>
								<ul class="dropdown-menu dropdown-alerts">
									<li>
										<a href="mailbox.html">
											<div>
												<i class="fa fa-envelope fa-fw"></i> You have 16 messages
												<span class="pull-right text-muted small">4 minutes ago</span>
											</div>
										</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="profile.html">
											<div>
												<i class="fa fa-twitter fa-fw"></i> 3 New Followers
												<span class="pull-right text-muted small">12 minutes ago</span>
											</div>
										</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="grid_options.html">
											<div>
												<i class="fa fa-upload fa-fw"></i> Server Rebooted
												<span class="pull-right text-muted small">4 minutes ago</span>
											</div>
										</a>
									</li>
									<li class="divider"></li>
									<li>
										<div class="text-center link-block">
											<a href="notifications.html">
											<strong>See All Alerts</strong>
											<i class="fa fa-angle-right"></i>
											</a>
										</div>
									</li>
								</ul>
							</li>
							<li>
								<a href="<?php $this->printActionURL('logOut','account'); ?>">
								<i class="fa fa-sign-out"></i> Log out
								</a>
							</li>
						</ul>
					</nav>
				</div>
				<?php 
					$this->showContent(); 
					?>     
			</div><div class="footer">
					<div class="pull-right">
						10GB of <strong>250GB</strong> Free.
					</div>
					<div>
						<strong>Copyright</strong> Example Company &copy; 2014-2015
					</div>
				</div>
		</div>
        
		<!-- Mainly scripts -->
		<script src="<?php echo JS_URL; ?>jquery-2.1.1.js"></script>
		<script src="<?php echo JS_URL; ?>bootstrap.min.js"></script>
		<script src="<?php echo JS_URL; ?>plugins/metisMenu/jquery.metisMenu.js"></script>
		<script src="<?php echo JS_URL; ?>plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<!-- Flot -->
		<script src="<?php echo JS_URL; ?>plugins/flot/jquery.flot.js"></script>
		<script src="<?php echo JS_URL; ?>plugins/flot/jquery.flot.tooltip.min.js"></script>
		<script src="<?php echo JS_URL; ?>plugins/flot/jquery.flot.spline.js"></script>
		<script src="<?php echo JS_URL; ?>plugins/flot/jquery.flot.resize.js"></script>
		<script src="<?php echo JS_URL; ?>plugins/flot/jquery.flot.pie.js"></script>
		<!-- Peity -->
		<script src="<?php echo JS_URL; ?>plugins/peity/jquery.peity.min.js"></script>
		<script src="<?php echo JS_URL; ?>demo/peity-demo.js"></script>
		<!-- Custom and plugin javascript -->
		<script src="<?php echo JS_URL; ?>custom.js"></script>
		<script src="<?php echo JS_URL; ?>plugins/pace/pace.min.js"></script>
		<!-- jQuery UI -->
		<script src="<?php echo JS_URL; ?>plugins/jquery-ui/jquery-ui.min.js"></script>
		<!-- GITTER -->
		<script src="<?php echo JS_URL; ?>plugins/gritter/jquery.gritter.min.js"></script>
		<!-- Sparkline -->
		<script src="<?php echo JS_URL; ?>plugins/sparkline/jquery.sparkline.min.js"></script>
		<!-- Sparkline demo data  -->
		<script src="<?php echo JS_URL; ?>demo/sparkline-demo.js"></script>
		<!-- ChartJS-->
		<script src="<?php echo JS_URL; ?>plugins/chartJs/Chart.min.js"></script>
		<!-- Toastr -->
		<script src="<?php echo JS_URL; ?>plugins/toastr/toastr.min.js"></script>
		<script src="<?php echo JS_URL; ?>plugins/dataTables/toastr.min.js"></script>

		<script src="<?php echo JS_URL; ?>plugins/dataTables/jquery.dataTables.js"></script>
		<script src="<?php echo JS_URL; ?>plugins/dataTables/dataTables.bootstrap.js"></script>
		<script src="<?php echo JS_URL; ?>plugins/dataTables/dataTables.responsive.js"></script>
		<script src="<?php echo JS_URL; ?>plugins/dataTables/dataTables.tableTools.min.js"></script>


		<script>
			$(document).ready(function() {
			    setTimeout(function() {
			        toastr.options = {
			            closeButton: true,
			            progressBar: true,
			            showMethod: 'slideDown',
			            timeOut: 4000
			        };
			        toastr.success('Responsive Admin Theme', 'Welcome to SinglePurposeFramework');
			
			    }, 1300);
			
			
			    var data1 = [
			        [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
			    ];
			    var data2 = [
			        [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
			    ];
			    $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
			        data1, data2
			    ],
			            {
			                series: {
			                    lines: {
			                        show: false,
			                        fill: true
			                    },
			                    splines: {
			                        show: true,
			                        tension: 0.4,
			                        lineWidth: 1,
			                        fill: 0.4
			                    },
			                    points: {
			                        radius: 0,
			                        show: true
			                    },
			                    shadowSize: 2
			                },
			                grid: {
			                    hoverable: true,
			                    clickable: true,
			                    tickColor: "#d5d5d5",
			                    borderWidth: 1,
			                    color: '#d5d5d5'
			                },
			                colors: ["#1ab394", "#464f88"],
			                xaxis:{
			                },
			                yaxis: {
			                    ticks: 4
			                },
			                tooltip: false
			            }
			    );
			
			    var doughnutData = [
			        {
			            value: 300,
			            color: "#a3e1d4",
			            highlight: "#1ab394",
			            label: "App"
			        },
			        {
			            value: 50,
			            color: "#dedede",
			            highlight: "#1ab394",
			            label: "Software"
			        },
			        {
			            value: 100,
			            color: "#b5b8cf",
			            highlight: "#1ab394",
			            label: "Laptop"
			        }
			    ];
			
			    var doughnutOptions = {
			        segmentShowStroke: true,
			        segmentStrokeColor: "#fff",
			        segmentStrokeWidth: 2,
			        percentageInnerCutout: 45, // This is 0 for Pie charts
			        animationSteps: 100,
			        animationEasing: "easeOutBounce",
			        animateRotate: true,
			        animateScale: false,
			    };
			
		
			
			});
		</script>
		<?php 
		$this->showScripSection();
		?>
	</body>
</html>