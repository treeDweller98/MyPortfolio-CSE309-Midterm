<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Us</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/bootstrap.bundle.min.js" defer></script>
    <script src="js/jquery-3.6.0.min.js" defer></script>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/icons/logo.png" alt="">
            </a>
            
            <button 
                class="navbar-toggler" type="button" 
                data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" 
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto justify-content-end">
                    <li class="nav-item"> <a class=" nav-link active" aria-current="page" href="#"> Home </a> </li>
                    <li class="nav-item"> <a class="nav-link" href="#"> Blog        </a>                      </li>
                    <li class="nav-item"> <a class="nav-link" href="#"> Portfolio   </a>                      </li>
                    <li class="nav-item"> <a class="nav-link" href="contact-us.html">Contact</a>             </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="row transbox my-5 py-5 px-5">
            <?php
                // Connect to database
                $host = 'localhost'; 
                $user = 'root'; 
                $password = ''; 
                $db = 'contact-us-db';
                
                $link = mysqli_connect( $host, $user, $password, $db );

                if ( $link === false ) {
                    $diemsg = "ERROR: Could not connect. " . mysqli_connect_error();
                    die( "<strong class='text-light text-center'>$diemsg</strong>" );
                }
                
                // Get data from form
                $firstName = $_POST['firstName'];
                $lastName= $_POST['lastName'];
                $email = $_POST['email'];
                $messageType = $_POST['type'];
                $subjectLine = $_POST['subjectLine'];
                $messageText = $_POST['message'];

                // Insert into database
                $sql = "INSERT INTO Messages
                        (firstName, lastName, email, messageType, subjectLine, messageText)
                        VALUES
                        ('$firstName', '$lastName', '$email', '$messageType', '$subjectLine', '$messageText')";

                if ( mysqli_query( $link, $sql ) ) {
                    echo "<strong class='text-light text-center'>Message sent!</strong>";
                } else {
                    $diemsg = "ERROR: Could not record your message $sql" . mysqli_error( $link );
                    echo "<strong class='text-light text-center'>$diemsg</strong>";
                }

                mysqli_close( $link );
            ?>
        </div>
    </main>

    <footer>
        <p>&copy 2022 Fahim Ahmed</p>
        <small> 
            Made with ♥ <br>
            CSE309-1 Assignment 2. Spring 2022
        </small>
    </footer>
</body>
</html>