<?php
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $subject = $_POST['Subject'];
    $message = $_POST['Message'];
    
    //database details. You have created these details in the third step. Use your own.
    $host = "localhost";
    $username = "root";
    $password = "adminpass";
    $dbname = "messages";

    //create connection
    $con = mysqli_connect($host, $username, $password, $dbname);
    //check connection if it is working or not
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }
    //This below line is a code to Send form entries to database
    $sql = "INSERT INTO contactform_entries (id, name_fld, email_fld, msg_fld) VALUES ('0', '$name', '$email', '$subject', '$message')";
    //fire query to save entries and check it with if statement
    $rs = mysqli_query($con, $sql);
    if($rs)
    {
        echo "Successfully saved";
    }
    //connection closed.
    mysqli_close($con);
?>