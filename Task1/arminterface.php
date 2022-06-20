<!--Bayader AlHarbi-->
<!--Arm Intrface-->
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--embedded css-->
<style>
  body{
    background-image: url("robot.jpg");

  }
.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 40%;
  height: 25px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
  margin-left: 2%;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background:  #4d79ff;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #04AA6D;
  cursor: pointer;
}
</style>
<!--html-->
</head>
<body>
  <header style="    border: none;padding: 14px 28px; font-size: 20px; color:black;" >Arm Interface</header>

<!--sliders-->
<form action="arminterface.php" method="post">
<div class="slidecontainer">
 <p>Motor 1<input type="range" min="0" max="180" value="1"  class="slider" id="myRange1"name="slider1">  Value:<label> <span id="demo1"></span></label></p>
 <p>Motor 2<input type="range" min="0" max="180" value="1" class="slider" id="myRange2"name="slider2">  Value:<label> <span id="demo2"></span></label></p>
 <p>Motor 3<input type="range" min="0" max="180" value="1" class="slider" id="myRange3"name="slider3">  Value:<label> <span id="demo3"></span></label></p>
 <p>Motor 4<input type="range" min="0" max="180" value="1" class="slider" id="myRange4"name="slider4">  Value:<label> <span id="demo4"></span></label></p>
 <p>Motor 5<input type="range" min="0" max="180" value="1" class="slider" id="myRange5"name="slider5">  Value:<label> <span id="demo5"></span></label></p>
 <p>Motor 6<input type="range" min="0" max="180" value="1" class="slider" id="myRange6"name="slider6">  Value:<label> <span id="demo6"></span></label></p>

</div>
<!--buttons-->
<input type="submit" name="send" value="send" style="border-radius:10px; width:100px height:100px; font-size:28px; margin-right:40px; background-color: black;  color: white; ">
<input  type="submit" name="on" id="on" value="on"style="border-radius:10px; width:100px height:100px; font-size:28px; margin-right:40px; background-color: black;  color: white; ">
<input  type="submit" name="off" id="off" value="off"style="border-radius:10px; width:100px height:100px; font-size:28px; margin-right:40px; background-color: black;  color: white; ">
</form>

<!--php-->
<!--create connection with DB-->
  <?php
$servername = "localhost";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password,"arminterface");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
<!--connect the buttons-->
<!--send-->
<?php 

if (isset($_POST['send'])) {
 
$sql = " UPDATE `arms` SET `motor1`='".$_POST['slider1']."', `motor2`='".$_POST['slider2']."', `motor3`='".$_POST['slider3']."', `motor4`='".$_POST['slider4']."', `motor5`='".$_POST['slider5']."', `motor6`='".$_POST['slider6']."'  WHERE `ID`='1'";

$result = $conn->query($sql);
 }

 ?>
 <!--on-->
 <?php 

if (isset($_POST['on'])) {
$sql =" UPDATE `arms` SET `start`='1'WHERE  `ID`='1'";
$result = $conn->query($sql);
 }
 ?>
<!--off-->
 <?php 

if (isset($_POST['off'])) {
$sql =" UPDATE `arms` SET `start`=''WHERE  `ID`='1'";
$result = $conn->query($sql);
 }
 ?>
<!--java script-->
<script>
var slider1 = document.getElementById("myRange1");
var output1 = document.getElementById("demo1");
output1.innerHTML = slider1.value;

slider1.oninput = function() {
  output1.innerHTML = this.value;
}
var slider2= document.getElementById("myRange2");
var output2 = document.getElementById("demo2");
output2.innerHTML = slider2.value;

slider2.oninput = function() {
  output2.innerHTML = this.value;
}
var slider3 = document.getElementById("myRange3");
var output3 = document.getElementById("demo3");
output3.innerHTML = slider3.value;

slider3.oninput = function() {
  output3.innerHTML = this.value;
}
var slider4= document.getElementById("myRange4");
var output4 = document.getElementById("demo4");
output4.innerHTML = slider4.value;

slider4.oninput = function() {
  output4.innerHTML = this.value;
}
var slider5 = document.getElementById("myRange5");
var output5 = document.getElementById("demo5");
output5.innerHTML = slider5.value;

slider5.oninput = function() {
  output5.innerHTML = this.value;
}
var slider6= document.getElementById("myRange6");
var output6 = document.getElementById("demo6");
output6.innerHTML = slider6.value;

slider6.oninput = function() {
  output6.innerHTML = this.value;
}
</script>

</body>
</html>