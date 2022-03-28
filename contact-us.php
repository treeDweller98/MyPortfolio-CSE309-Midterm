<?php
    $firstName = $_POST['firstName'];
    $lastName= $_POST['lastName'];
    $email = $_POST['email'];
    $messageType = $_POST['type'];
    $subjectLine = $_POST['subjectLine'];
    $messageText = $_POST['message'];

    // Connect with database
    $link = mysqli_connect("localhost", "root", "","contact-us-db");
    if ( $link === false ) {
        die( "ERROR: Could not connect. " . mysqli_connect_error() );
    }

    // Insert into database
    $sql = "INSERT INTO Messages 
            (firstName, lastName, email, messageType, subjectLine, messageText) 
            VALUES
            ($firstName, $lastName, $email, $messageType, $subjectLine, $messageText)";

    if ( mysqli_query( $link, $sql ) ) {
        echo "Records added successfully";
    } else {
        echo "ERROR: Could not record your message $sql" . mysqli_error( $link );
    }

    mysqli_close( $link );
?>