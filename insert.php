<?php
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$contactno=$_POST['contactno'];
$email = $_POST['email'];
$password1=$_POST['password'];
$confirmpassword=$_POST['confirmpassword'];

if(!empty($firstname) || !empty($lastname) || !empty($contactno) || !empty($email) || !empty($password) || !empty($confirmpassword)){
//if(!empty($firstname)|| !empty($lastname)|| !empty($address)|| !empty(email)|| !empty(passowrd) !empty(confirmpassword)){
    $host="localhost";
    $username="root";
    $password="";
    $dbname="form_submission";
    if($password1 == $confirmpassword)
    {    
    
    $conn= new mysqli($host,$username,$password,$dbname);
    
    if(mysqli_connect_error()){
        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else
    {
        date_default_timezone_set('Asia/Kolkata');
        $date2 = date('Y-m-d');
        $created_date = $date2;
//        echo $created_date;
        $SELECT= "SELECT email from user_signup Where email=? Limit 1";
        $INSERT= "INSERT INTO user_signup(firstname,lastname,contactno,email,password,created_date) VALUES (?,?,?,?,?,?)";
        
        $stmt=$conn->prepare($SELECT);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum=$stmt->num_rows;
        
        if($rnum==0)
        {
            $stmt->close();
            $stmt=$conn->prepare($INSERT);
            $stmt->bind_param("ssssss", $firstname, $lastname, $contactno, $email, $password1,$created_date);
          $stmt->execute();
        //    $stmt->bindParam(1, $firstname);
//$stmt->bindParam(2, $lastname);
//$stmt->bindParam(3, $address);
           // $stmt->bindParam(4, $email);
            //$stmt->bindParam(5, $password);
            echo  "New record inserted successfully";
            
        }else
        {
            echo  "Someone already registered using this email";
            
        }
        $stmt->close();
        $conn->close();
        
    }
}else{
        echo "Passwords doesn't match !";
    }
}
else
{
    echo "All fields are required";
    die();
}
?>