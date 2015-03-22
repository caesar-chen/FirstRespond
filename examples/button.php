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
        <h2>Push the square towards the screen as many times as you can in 20 seconds.</h2>
        <p id="demo" ></p>
<span id="countdown" style="color:red;" class="timer"></span>
        <div class="container" style="margin-top: 2%; height: 80%;">
            
        </div>
      </section>



</body>

<script>
var seconds = 20;
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
  //document.getElementById("demo").innerHTML = "The count is: " + count;
  camera.position.set( 0, 0.3, 0.6 );

  var controls = new THREE.OrbitControls( camera );

  // Add a plane

  var planeGeo = new THREE.PlaneGeometry(0.1, 0.1);
  var material = new THREE.MeshPhongMaterial();
  var buttonMesh = new THREE.Mesh(planeGeo, material);

  buttonMesh.name = "rectangular button";

  var longThrow = -0.1;
  var squareButton = new PushButton(

    new InteractablePlane(buttonMesh, Leap.loopController),

    {
      locking: false,
      longThrow: longThrow
    }

  ).on('press', function(mesh){

    mesh.material.color.setHex(0x993300);
    count = count + 1;
    document.getElementById("demo").innerHTML = "The count is: " + count;
    document.getElementById("testdata1").value = count;
    // if(seconds == 0) {
    //   document.getElementById("form").submit();
    // }
  }).on('release', function(mesh){

    mesh.material.color.setHex(0xffffff);

  }
  );

  squareButton.plane.hover(
    function(mesh){ // over
      console.log('hover in');
      mesh.material.color.setHex(0xffccff);
    },
    function(mesh){ // out
      console.log('hover out');
      mesh.material.color.setHex(0xffffff);
    }
  );


  var base = new THREE.Mesh(new THREE.BoxGeometry(0.1, longThrow, longThrow * 5), new THREE.MeshPhongMaterial({color: 0xffffff}));
  base.position.set(0.03, -0.03, 0.00);
  base.rotateY(Math.PI * -0.15);

  buttonMesh.position.set(
    0,
    buttonMesh.geometry.parameters.height / 2 - longThrow / 2,
    -longThrow / 2
  );
  squareButton.plane.resetPosition(); // resets the original position, etc to the current one


  base.add(buttonMesh);

  scene.add(base);

  document.getElementById("demo").innerHTML = "The count is: " + count;



</script>
<?php 
//var_dump($_POST);
?>
<form method="post" action="border.php" id="form">
            <div class="row uniform">
              <div class="6u 12u$(xsmall)"><input type="hidden" value='<?php echo $_POST["firstname"]; ?>' name="firstname" id="fname" placeholder="First Name" /></div>
              <div class="6u$ 12u$(xsmall)"><input type="hidden" value='<?php echo $_POST["lastname"]; ?>' name="lastname" id="lname" placeholder="Last Name" /></div>
              <div class="6u 12u$(xsmall)"><input type="hidden" value='<?php echo $_POST["email"]; ?>' name="email" id="email" placeholder="Email" /></div>
              <div class="6u 12u$(xsmall)"><input type="hidden" value='<?php echo $_POST["phonenum"]; ?>' name="phonenum" id="cell" placeholder="Phone number" /></div>
              <div class="6u 12u$(xsmall)"><input type="hidden" value='<?php echo $_POST["height"]; ?>' name="height" id="hei" placeholder="Height (cm)" /></div>
              <div class="6u 12u$(xsmall)"><input type="hidden" value='<?php echo $_POST["weight"]; ?>' name="weight" id="wei" placeholder="Weight (kg)" /></div>
              <input type="hidden" name="testdata1" id="testdata1" value="14" placeholder="Weight (kg)" />
            </div>
          </form>
</html>