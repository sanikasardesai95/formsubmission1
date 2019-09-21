<?php
$email = $_POST['email'];
$password1=$_POST['password'];
if( !empty($email) || !empty($password1)){
//if(!empty($firstname)|| !empty($lastname)|| !empty($address)|| !empty(email)|| !empty(passowrd) !empty(confirmpassword)){
    $host="localhost";
    $username="root";
    $password="";
    $dbname="form_submission";
    
    
    $conn= new mysqli($host,$username,$password,$dbname);
    
    if(mysqli_connect_error()){
        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else
    {
        
        
        $query="Select * from user_signup where email='$email' and password='$password1'";
        mysqli_query($conn,$query);
//        $row=mysqli_fetch_array($result);
        $rowcount=mysqli_affected_rows($conn);
//        if($row['email']==$email && ['password']==$password1){
        if($rowcount > 0){
            date_default_timezone_set("Asia/Kolkata");
            $date2 = date('H:i:s');
            $sql = "update user_signup SET last_login ='$date2' where email ='$email'";
            mysqli_query($conn,$sql);
            $rowcount2=mysqli_affected_rows($conn);
            if($rowcount2 > 0)
            {
                $_SESSION['email']=$email;
                header('location:header1.php');
            echo "Login success!!";
            }
        }
        else
        {
            echo "Invalid credentials !";
        }
           
        }}else{
            echo  "Failed to login!";
            
    } 
        
    
    
?>