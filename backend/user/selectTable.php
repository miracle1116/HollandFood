<?php
    $host = "localhost";
    $database = "holland-food";
    $user = "root";
    $pass = "";

    $conn = mysqli_connect($host, $user, $pass, $database);
    
    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['search'])){
        $date =date ('Y-m-d', strtotime($_POST['date']));

        $query = "INSERT INTO table1 (date1) VALUES ('$date')";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            header("location: ../../Layout/user/user_table.php");
        }

    }else{
        header("location: ../../Layout/user/user_table.php");
    }

?>
