<?php
    $Email = $_POST['mail'];
    $Pass = $_POST['pass'];

    $con = new mysqli("localhost","root","","foodblog");
    if($con->connect_error){
        die("Failed"+$con->connect_error);
    }else{
        // $ab = $con->prepare("select * from login where mail =?");
        $ab =$con->prepare("insert into login(mail,pass) values(?,?)");
        $ab->bind_param("ss",$Email,$Pass);
        $ab->execute();
        header("location: index2.html");
        $ab->close();
        $con->close();
    }
?> 