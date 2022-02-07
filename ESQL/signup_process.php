<?php
$conn = mysqli_connect("127.0.0.1:3306", "root", "111111", "esql");


$id=$_POST['userid'];
$password=$_POST['userpassword'];
$name=$_POST['username'];

if(!empty($id)&&!empty($password) && !empty($name)){
  $sql="SELECT * FROM user WHERE userid='$id'";
  $result=mysqli_query($conn, $sql);
  $row=mysqli_fetch_array($result);

  if($row!=null && $row['userid']===$id){
    echo "존재하는 아이디입니다.";
    echo '<a href="login.php">로그인</a>';
    echo '<a href="signup.php">회원가입</a>';
  }
  else{
    $sql="INSERT INTO user(userid, userpassword, username) VALUES('$id', '$password', '$name')";
    $result=mysqli_query($conn, $sql);
    if($result===true){
      echo mysqli_error($conn);
      echo '회원가입 완료 <a href="login.php">로그인</a>';
    }
    else{
      echo '회원가입에 실패했습니다.';
      echo '<a href="signup.php">다시 시도</a>';
      echo error_log(mysqli_error($conn));

    }
  }
}
else{
  echo '빈칸이 있습니다.';
  echo '<a href="signup.php">다시 시도</a>';
}

?>
