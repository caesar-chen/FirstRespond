<html>
<head>
  <meta charset="utf-8">
  <script src="js/1.js"></script>
  <script src="js/2.js"></script>
  <script src="js/leap-plugins-0.1.11pre.js"></script>

  <script src="../build/leap-widgets-0.1.0.js"></script>

  <script src="js/OrbitControls.js"></script>
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
  <style>
    body {
      margin: 0;
      background-image: url("image/pic02.jpg");
    }
    canvas.leap-boneHand{
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }
  </style>

</head>
<body>
<section id="one" class="main special">
        <h2>Push the square towards the screen as many times as you can in 10 seconds.</h2>
        <p id="demo" ></p>
<span id="countdown" style="color:red;" class="timer"></span>
        <div class="container" style="margin-top: 2%; height: 20%;">
            
        </div>
      </section>
<p id="demo"></p>
<span id="countdown" class="timer"></span>

</body>

<script>
var seconds = 10;
function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById("form").submit();
    } else {
        seconds--;
    }
}
 
var countdownTimer = setInterval('secondPassed()', 1000);
</script>

<script>

  'use strict';

  // Set up plugins

  Leap.loop({background: true})
    .use('transform', {
      vr: 'desktop' // Switch to meters.
    })
    .use('boneHand', {
      targetEl: document.body,
      jointColor: new THREE.Color(0xffffff),
      rendererOps: {antialias: true}
    })
    .use('proximity');


  // Set up scene

  var scene = Leap.loopController.plugins.boneHand.scene;
  var camera = Leap.loopController.plugins.boneHand.camera;
  var renderer = Leap.loopController.plugins.boneHand.renderer;
  var count = 0;
  document.getElementById("demo").innerHTML = "The count is: " + count;
  camera.position.set( 0, 0, 0.6 );

  var controls = new THREE.OrbitControls( camera );

  // Add a plane

  var longThrow = -0.01;
  var planeGeo = new THREE.PlaneGeometry(0.08, 0.08);
  var material = new THREE.MeshPhongMaterial({color : 0xFF6699});

  //1
  var buttonMesh = new THREE.Mesh(planeGeo, material);
  var squareButton = new PushButton(

    new InteractablePlane(buttonMesh, Leap.loopController),

    {
      locking: true,
      longThrow: longThrow,
      shortThrow: 0
    }

  ).on('press', function(mesh){

    mesh.material.color.setHex(0xFF0033);
    count = count + 1;
    document.getElementById("demo").innerHTML = "The count is: " + count;

  }).on('release', function(mesh){

    mesh.material.color.setHex(0xFF6699);

  });
  buttonMesh.position.set(0.1,0.08,0);
  squareButton.plane.resetPosition();

  //2
  var buttonMesh2 = new THREE.Mesh(planeGeo, material);
  var squareButton2 = new PushButton(

    new InteractablePlane(buttonMesh2, Leap.loopController),

    {
      locking: true,
      longThrow: longThrow,
      shortThrow: 0
    }

  ).on('press', function(mesh2){

    mesh2.material.color.setHex(0xFF0033);
    count = count + 1;
    document.getElementById("demo").innerHTML = "The count is: " + count;

  }).on('release', function(mesh2){

    mesh2.material.color.setHex(0xFF6699);

  });
  buttonMesh2.position.set(0,0.08,0);
  squareButton2.plane.resetPosition();

  //3
  var buttonMesh3 = new THREE.Mesh(planeGeo, material);
  var squareButton3 = new PushButton(

    new InteractablePlane(buttonMesh3, Leap.loopController),

    {
      locking: true,
      longThrow: longThrow,
      shortThrow: 0
    }

  ).on('press', function(mesh){

    mesh.material.color.setHex(0xFF0033);
    count = count + 1;
    document.getElementById("demo").innerHTML = "The count is: " + count;
    document.getElementById("testdata2").value = count;

  }).on('release', function(mesh){

    mesh.material.color.setHex(0xFF6699);

  });
  buttonMesh3.position.set(-0.1,0.08,0);
  squareButton3.plane.resetPosition();
  scene.add(buttonMesh);
  scene.add(buttonMesh2);
  scene.add(buttonMesh3);
  scene.add(buttonMesh4);
  document.getElementById("demo").innerHTML = "The count is: " + count;


</script>
<?php 
?>
<form method="post" action="javascript-master\v2\pinch-selection\test3.php" id="form">
            <div class="row uniform">
              <div class="6u 12u$(xsmall)"><input type="hidden" value='<?php echo $_POST["firstname"]; ?>' name="firstname" id="fname" placeholder="First Name" /></div>
              <div class="6u$ 12u$(xsmall)"><input type="hidden" value='<?php echo $_POST["lastname"]; ?>' name="lastname" id="lname" placeholder="Last Name" /></div>
              <div class="6u 12u$(xsmall)"><input type="hidden" value='<?php echo $_POST["email"]; ?>' name="email" id="email" placeholder="Email" /></div>
              <div class="6u 12u$(xsmall)"><input type="hidden" value='<?php echo $_POST["phonenum"]; ?>' name="phonenum" id="cell" placeholder="Phone number" /></div>
              <div class="6u 12u$(xsmall)"><input type="hidden" value='<?php echo $_POST["height"]; ?>' name="height" id="hei" placeholder="Height (cm)" /></div>
              <div class="6u 12u$(xsmall)"><input type="hidden" value='<?php echo $_POST["weight"]; ?>' name="weight" id="wei" placeholder="Weight (kg)" /></div>
              <input type="hidden" name="testdata1" id="testdata1" value='<?php echo $_POST["testdata1"]; ?>' />
              <input type="hidden" name="testdata2" id="testdata2" value="0"  />
              
              <div class="12u$">
              </div>
            </div>
          </form>

</html>