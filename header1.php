<html>
<head>
    <title>Header</title>
    <style type="text/css">
    <h1>Welcome !</h1>
        table{
            border-collapse: collapse;
            width: 100%;
            color:#d96459;
            font-family: monospace;
            font-size: 22px;
            text-align: left;
        }
        th{
            background-color: #d96459;
            color: white;
        }
    </style>
    </head>

<body>
    <table style="width:100">
    <tr>
        <th>firstname</th>
        <th>lastname</th>
         <th>contactno</th>
         <th>email</th>
         <th>password</th>
         <th>created_date</th>
         <th>last_login</th>
        </tr>
        <?php
        $conn=mysqli_connect("localhost", "root", "", "form_submission");
        if($conn->connect_error){
            die("connection failed:".$conn->connect_error);
        
        }
        
        $sql="SELECT * from form_submission";
        mysqli_query($conn,$sql) or die ("Bad query:$sql");
        echo "<table border=1>";
        while($row=mysqli_fetch_assoc($result)){
            
            echo "<tr><td>".$row["firstname"]."<tr><td>".$row["lastname"]."<tr><td>".$row["contactno"]."<tr><td>".$row["email"]."<tr><td>".$row["password"] ."<tr><td>".$row["created_date"]."<tr><td>".$row["last_login"]."<tr><td>";
                
              }
            echo  "</table>";
       /* $sql="SELECT firstname,lastname,contactno,email,password,created_date,last_login from user_login";
        $result=$conn->query($sql);
        
        if($result-> num_rows > 0) {
            while($row=$result->fetch_assoc()){
                echo "<tr><td>".$row["firstname"]."<tr><td>".$row["lastname"]."<tr><td>".$row["contactno"]."<tr><td>".$row["email"]."<tr><td>".$row["password"] ."<tr><td>".$row["created_date"]."<tr><td>".$row["last_login"]."<tr><td>";
                
            }
            echo  "</table>";
        }
        else{
            echo "0 result";
        }*/
        $conn->close();
    
   ?>
    </table>
    </body>

</html>