<!DOCTYPE HTML>

<html>
	<head>
		<title>Highlights by HTML5 UP</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.scrollex.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body>

		<!-- Header -->
			<section id="header">
				<header class="major">
					<h1>Thank you</h1>
					<p>Your doctor will reach you soon</p>
				</header>
				<div class="container">
					<ul class="actions">
						<li><a href="http://localhost/FirstRespond" class="button special scrolly">GO Back to Begining</a></li>
					</ul>
				</div>
			</section>
	</body>
	<?php 
?>
<form method="post" action="thankyou.php" id="form">
            <div class="row uniform">
              <div class="6u 12u$(xsmall)"><input type="hidden" value='<?php echo $_POST["firstname"]; ?>' name="firstname" id="fname" placeholder="First Name" /></div>
              <div class="6u$ 12u$(xsmall)"><input type="hidden" value='<?php echo $_POST["lastname"]; ?>' name="lastname" id="lname" placeholder="Last Name" /></div>
              <div class="6u 12u$(xsmall)"><input type="hidden" value='<?php echo $_POST["email"]; ?>' name="email" id="email" placeholder="Email" /></div>
              <div class="6u 12u$(xsmall)"><input type="hidden" value='<?php echo $_POST["phonenum"]; ?>' name="phonenum" id="cell" placeholder="Phone number" /></div>
              <div class="6u 12u$(xsmall)"><input type="hidden" value='<?php echo $_POST["height"]; ?>' name="height" id="hei" placeholder="Height (cm)" /></div>
              <div class="6u 12u$(xsmall)"><input type="hidden" value='<?php echo $_POST["weight"]; ?>' name="weight" id="wei" placeholder="Weight (kg)" /></div>
              <input type="hidden" name="testdata1" id="testdata1" value='<?php echo $_POST["testdata1"]; ?>' />
              <input type="hidden" name="testdata2" id="testdata2" value='<?php echo $_POST["testdata2"]; ?>' />
              <input type="hidden" name="testdata3" id="testdata3" value="<?php echo $_POST["testdata3"]; ?>' />
              
              <div class="12u$">
              </div>
            </div>
          </form>
</html>