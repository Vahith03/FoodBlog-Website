<?php
    $Email = $_POST['mail'];
    $Pass = $_POST['pass'];
    echo $Email;
    echo $Pass;

    $con = new mysqli("localhost","root","","foodblog");
    if($con->connect_error){
        die("Failed"+$con->connect_error);
    }else{
        $ab = $con->prepare("select * from login where mail =?");
        // $ab =$con->prepare("insert into login(mail,pass) values(?,?)");
        $ab->bind_param("s",$Email);
        $ab->execute();
        $ab_result = $ab->get_result();
        if($ab_result->num_rows > 0){
            $data = $ab_result->fetch_assoc();
            if($data['pass']===$Pass){
                echo "<h2>succesfully logined</h2>";
            }
            else{
                echo "<h2> invaid email r pass</h2>";
            }
        }
        // else{
        //     echo "<h2>Invalid pass</h2>";
        // }
        // echo "successful";
        // // $ab->close();
        // // $con->close();
    }
?> 