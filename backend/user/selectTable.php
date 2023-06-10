<?php

    session_start();
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
        $slot = $_POST['slot'];
        $index=$slot;

        // Check if the selected date exists in the table
        $sql1 = "SELECT * FROM table1 WHERE date1 = '$date'";
        $sql2 = "SELECT * FROM table2 WHERE date2 = '$date'";
        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);

        if ($result1->num_rows > 0) {
            // Date exists in the table, retrieve and display the selected slot
            $row = $result1->fetch_assoc();
            $availability1 = $row["availability1"];
            $selectedValue1 = $availability1[$index-1];
            echo "Selected value for table 1 slot $slot on $date is: $selectedValue1";
        } else {
            // Date does not exist in the table, insert a new row with 14 available slots
            $slots = str_repeat("0", 14);
            $sql1 = "INSERT INTO table1 (date1, availability1) VALUES ('$date', '$slots')";
        
            if ($conn->query($sql1) === TRUE) {
                echo "New record created successfully!";
            } else {
                echo "Error: " . $sql1 . "<br>" . $conn->error;
            }
            $sql1 = "SELECT * FROM table1 WHERE date1 = '$date'";
            $result1 = $conn->query($sql1);
            $row = $result1->fetch_assoc();
            $availability1 = $row["availability1"];
            $selectedValue1 = $availability1[$index-1];
            echo "Selected value for table 1 slot $slot on $date is: $selectedValue1";
        }
        
        
        if ($result2->num_rows > 0) {
            // Date exists in the table, retrieve and display the selected slot
            $row = $result2->fetch_assoc();
            $availability2 = $row["availability2"];
            $selectedValue2 = $availability2[$index-1];
            echo "Selected value for table 2 slot $slot on $date is: $selectedValue2";
        } else {
            // Date does not exist in the table, insert a new row with 14 available slots
            $slot = str_repeat("0", 14);
            $sql2 = "INSERT INTO table2 (date2, availability2) VALUES ('$date', '$slot')";
        
            if ($conn->query($sql2) === TRUE) {
                echo "New record created successfully!";
            } else {
                echo "Error: " . $sql2 . "<br>" . $conn->error;
            }
        }
        $_SESSIOM['data']=[$selectedValue1,$selectedValue2];
        $sessionData=$_SESSIOM['data'];
        $convertedData = array_map('intval', $sessionData);
        echo json_encode($convertedData);

        // $query1 = "INSERT INTO table1 (date1, availability1) VALUES ('$date','$availability')";
        // $query2 = "INSERT INTO table2 (date2, availability2) VALUES ('$date','$availability')";
        // $query3 = "INSERT INTO table3 (date3, availability3) VALUES ('$date','$availability')";
        // $query4 = "INSERT INTO table4 (date4, availability4) VALUES ('$date','$availability')";
        // $query5 = "INSERT INTO table5 (date5, availability5) VALUES ('$date','$availability')";
        // $query6 = "INSERT INTO table6 (date6, availability6) VALUES ('$date','$availability')";
        // $query7 = "INSERT INTO table7 (date7, availability7) VALUES ('$date','$availability')";
        // $query8 = "INSERT INTO table8 (date8, availability8) VALUES ('$date','$availability')";
        // $query9 = "INSERT INTO table9 (date9, availability9) VALUES ('$date','$availability')";

        // $query_run = mysqli_query($conn, $query1);
        // $query_run = mysqli_query($conn, $query2);
        // $query_run = mysqli_query($conn, $query3);
        // $query_run = mysqli_query($conn, $query4);
        // $query_run = mysqli_query($conn, $query5);
        // $query_run = mysqli_query($conn, $query6);
        // $query_run = mysqli_query($conn, $query7);
        // $query_run = mysqli_query($conn, $query8);
        // $query_run = mysqli_query($conn, $query9);

        if($query_run){
            header("location: ../../Layout/user/user_table.php");
        }
    //}
        else{
        header("location: ../../Layout/user/user_table.php");
        }
    }   

?>

