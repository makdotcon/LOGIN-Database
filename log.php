<?php

include("db.php")
?>

<?php



function isUserExists($email,$password)
{

    $conn=mysqli_connect('localhost','root','','skill');

if (!$conn) {
    die('Database not connected');
}

$sql="SELECT * FROM users WHERE email='$email' AND password='$password' ";

$result=mysqli_query($conn,$sql);


if (mysqli_num_rows($result)>0) {
    return true;
  
}

else {
    return false;
}

}

function setSession($email)
{
    session_start();
    $_SESSION['email'] =$email;
    $_SESSION['islogin']=true;

}


function  redirecttologin()
{
    session_start();
    if(isset($_SESSION['islogin']) && $_SESSION['islogin']==true)
    {
        header("location:home.php");
    }
}

function redirect()
{
    header("location:index.php");
}



$email=$_POST['email']; $password=$_POST['password'];


if (isset($email) && isset($password)) {
    
if (isUserExists($email,$password))
{
    setSession($email);
    redirecttologin();

}
else {
    redirect();
    
}
    
}


?>