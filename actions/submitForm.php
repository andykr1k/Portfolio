<?php
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $subject = $_POST['Subject'];
    $message = $_POST['Message'];
    
    //create connection
    $con = mysqli_connect('mongodb+srv://root:adminpass@portfoliocluster.nwjaqh0.mongodb.net/?retryWrites=true&w=majority');
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

 