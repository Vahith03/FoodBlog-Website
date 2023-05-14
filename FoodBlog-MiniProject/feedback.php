<?php
    $name=$_POST['stuName'];    //Variable Declaration
    $regno=$_POST['regNo'];
    $dept=$_POST['dep'];
    $reason=$_POST['reason'];
    $dummy="dummy";

    $con= new mysqli("localhost","root","","webtechnology");  //DataBase connectivity
    if($con->connect_error){
        die("Failec to connect: ".$con->connect_error);
    }
    // else{
    //     echo"DONE";
    // }

        //Value insertion
    $sql="INSERT INTO formdetails (Name,Regno,Dept,Reason) VALUES('$name','$regno','$dept','$reason');";
    if(mysqli_query($con,$sql)){
        echo"Inserted Succesfully";
    }
    else{
        echo"error";
    }
?>