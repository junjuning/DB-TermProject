<?php
$conn = mysqli_connect("127.0.0.1:3306", "root", "111111", "esql");

$userid=$_POST['userid'];
$userpassword=$_POST['userpassword'];

$sql="SELECT * FROM user WHERE userid='".$userid."' AND userpassword='".$userpassword."'";
$result=mysqli_query($conn, $sql);

$row=mysqli_fetch_array($result);

if($row!=null && $userid===$row['userid'] && $userpassword===$row['userpassword']){
  session_start();
  $_SESSION['userid']=$row['userid'];
  $_SESSION['userpassword']=$row['userpassword'];


  echo("<script>location.href='index.php';</script>");
}
else{
  echo '입력한 정보가 틀렸습니다. <a href="login.php">로그인</a> <br/><a href="signup.php">회원가입</a>';
}
