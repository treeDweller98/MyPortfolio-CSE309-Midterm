<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Admin Panel</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/bootstrap.bundle.min.js" defer></script>
    <script src="js/jquery-3.6.0.min.js" defer></script>
</head>
<body>
    <header class="bg-dark py-3">
        <h1 class="text-center text-light py-3">Admin Panel</h1>
    </header>

    <main>
        <div class="table-responsive min-vh-100">
            <table class="table caption-top table-striped table-dark table-hover">
                <caption>Received Messages</caption>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">subject</th>
                        <th scope="col">message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Connect to database
                        $host = 'localhost'; 
                        $user = 'root'; 
                        $password = ''; 
                        $db = 'contact-us-db';
    
                        $link = mysqli_connect( $host, $user, $password, $db );
    
                        if ( $link === false ) {
                            $diemsg = "ERROR: Could not connect. " . mysqli_connect_error();
                            die( "<tr><td>$diemsg</td></tr>" );
                        }

                        // Retrieve columns
                        $sql = "SELECT
                                firstName, lastName, email, messageType, subjectLine, messageText
                                FROM Messages";
                        try {
                            $results = mysqli_query( $link, $sql );
                        } catch ( Exception $e ) {
                            $diemsg = "ERROR: Could not retrieve data - " . mysqli_error( $link );
                            echo "<tr><th scope='row'>0</th><td>--</td><td>--</td><td>--</td>";
                            echo "<td>$diemsg</td></tr>";
                        }
                       
                        mysqli_close( $link );

                        // View table rows
                        $counter = 1;
                        if ( mysqli_num_rows($results) > 0 ) {
    
                            while( $row = mysqli_fetch_assoc($results) ) {   
                                echo "<tr><th scope='row'>" . $counter++ . "</th>";
                                echo "<td>" . $row['firstName'] . " " . $row['lastName'] . "</td>";
                                echo "<td>" . $row['email'] ."</td>";
                                echo "<td>" . $row['subjectLine'] ."</td>";
                                echo "<td>" . $row['messageText'] ."</td></tr>";
                            }
    
                        } else {
                            echo "<tr><th scope='row'>0</th><td>--</td><td>--</td><td>--</td>";
                            echo "<td>no messages in inbox</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
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