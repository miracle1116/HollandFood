<?php

    session_start();
    include_once("../../config.php");
    if(isset($_POST['date']) && isset($_POST['slot'])){
        unset($_SESSION['selectedTable']);
        $_SESSION['reservationDate']=date ('Y-m-d', strtotime($_POST['date']));
        $date =date ('Y-m-d', strtotime($_POST['date']));
        $_SESSION['slot']= $_POST['slot'];
        $slot = $_POST['slot'];
        $index=$slot;

        // Check if the selected date exists in the table
        $sql1 = "SELECT * FROM table1 WHERE date1 = '$date'";
        $sql2 = "SELECT * FROM table2 WHERE date2 = '$date'";
        $sql3 = "SELECT * FROM table3 WHERE date3 = '$date'";
        $sql4 = "SELECT * FROM table4 WHERE date4 = '$date'";
        $sql5 = "SELECT * FROM table5 WHERE date5 = '$date'";
        $sql6 = "SELECT * FROM table6 WHERE date6 = '$date'";
        $sql7 = "SELECT * FROM table7 WHERE date7 = '$date'";
        $sql8 = "SELECT * FROM table8 WHERE date8 = '$date'";
        $sql9 = "SELECT * FROM table9 WHERE date9 = '$date'";
        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);
        $result3 = $conn->query($sql3);
        $result4 = $conn->query($sql4);
        $result5 = $conn->query($sql5);
        $result6 = $conn->query($sql6);
        $result7 = $conn->query($sql7);
        $result8 = $conn->query($sql8);
        $result9 = $conn->query($sql9);

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
            $sql2 = "SELECT * FROM table2 WHERE date2 = '$date'";
            $result2 = $conn->query($sql2);
            $row = $result2->fetch_assoc();
            $availability2 = $row["availability2"];
            $selectedValue2 = $availability2[$index-1];
            echo "Selected value for table 2 slot $slot on $date is: $selectedValue2";
        }

        if ($result3->num_rows > 0) {
            // Date exists in the table, retrieve and display the selected slot
            $row = $result3->fetch_assoc();
            $availability3 = $row["availability3"];
            $selectedValue3 = $availability3[$index-1];
            echo "Selected value for table 3 slot $slot on $date is: $selectedValue3";
        } else {
            // Date does not exist in the table, insert a new row with 14 available slots
            $slot = str_repeat("0", 14);
            $sql3 = "INSERT INTO table3 (date3, availability3) VALUES ('$date', '$slot')";
        
            if ($conn->query($sql3) === TRUE) {
                echo "New record created successfully!";
            } else {
                echo "Error: " . $sql3 . "<br>" . $conn->error;
            }
            $sql3 = "SELECT * FROM table3 WHERE date3 = '$date'";
            $result3 = $conn->query($sql3);
            $row = $result3->fetch_assoc();
            $availability3 = $row["availability3"];
            $selectedValue3 = $availability3[$index-1];
            echo "Selected value for table 3 slot $slot on $date is: $selectedValue3";
        }

        if ($result4->num_rows > 0) {
            // Date exists in the table, retrieve and display the selected slot
            $row = $result4->fetch_assoc();
            $availability4 = $row["availability4"];
            $selectedValue4 = $availability4[$index-1];
            echo "Selected value for table 4 slot $slot on $date is: $selectedValue4";
        } else {
            // Date does not exist in the table, insert a new row with 14 available slots
            $slot = str_repeat("0", 14);
            $sql4 = "INSERT INTO table4 (date4, availability4) VALUES ('$date', '$slot')";
        
            if ($conn->query($sql4) === TRUE) {
                echo "New record created successfully!";
            } else {
                echo "Error: " . $sql4 . "<br>" . $conn->error;
            }
            $sql4 = "SELECT * FROM table4 WHERE date4 = '$date'";
            $result4 = $conn->query($sql4);
            $row = $result4->fetch_assoc();
            $availability4 = $row["availability4"];
            $selectedValue4 = $availability4[$index-1];
            echo "Selected value for table 4 slot $slot on $date is: $selectedValue4";
        }

        if ($result5->num_rows > 0) {
            // Date exists in the table, retrieve and display the selected slot
            $row = $result5->fetch_assoc();
            $availability5 = $row["availability5"];
            $selectedValue5 = $availability5[$index-1];
            echo "Selected value for table 5 slot $slot on $date is: $selectedValue5";
        } else {
            // Date does not exist in the table, insert a new row with 14 available slots
            $slot = str_repeat("0", 14);
            $sql5 = "INSERT INTO table5 (date5, availability5) VALUES ('$date', '$slot')";
        
            if ($conn->query($sql5) === TRUE) {
                echo "New record created successfully!";
            } else {
                echo "Error: " . $sql5 . "<br>" . $conn->error;
            }
            $sql5 = "SELECT * FROM table5 WHERE date5 = '$date'";
            $result5 = $conn->query($sql5);
            $row = $result5->fetch_assoc();
            $availability5 = $row["availability5"];
            $selectedValue5 = $availability5[$index-1];
            echo "Selected value for table 5 slot $slot on $date is: $selectedValue5";
        }

        if ($result6->num_rows > 0) {
            // Date exists in the table, retrieve and display the selected slot
            $row = $result6->fetch_assoc();
            $availability6 = $row["availability6"];
            $selectedValue6 = $availability6[$index-1];
            echo "Selected value for table 6 slot $slot on $date is: $selectedValue6";
        } else {
            // Date does not exist in the table, insert a new row with 14 available slots
            $slot = str_repeat("0", 14);
            $sql6 = "INSERT INTO table6 (date6, availability6) VALUES ('$date', '$slot')";
        
            if ($conn->query($sql6) === TRUE) {
                echo "New record created successfully!";
            } else {
                echo "Error: " . $sql6 . "<br>" . $conn->error;
            }
            $sql6 = "SELECT * FROM table6 WHERE date6 = '$date'";
            $result6 = $conn->query($sql6);
            $row = $result6->fetch_assoc();
            $availability6 = $row["availability6"];
            $selectedValue6 = $availability6[$index-1];
            echo "Selected value for table 6 slot $slot on $date is: $selectedValue6";
        }

        if ($result7->num_rows > 0) {
            // Date exists in the table, retrieve and display the selected slot
            $row = $result7->fetch_assoc();
            $availability7 = $row["availability7"];
            $selectedValue7 = $availability7[$index-1];
            echo "Selected value for table 7 slot $slot on $date is: $selectedValue7";
        } else {
            // Date does not exist in the table, insert a new row with 14 available slots
            $slot = str_repeat("0", 14);
            $sql7 = "INSERT INTO table7 (date7, availability7) VALUES ('$date', '$slot')";
        
            if ($conn->query($sql7) === TRUE) {
                echo "New record created successfully!";
            } else {
                echo "Error: " . $sql7 . "<br>" . $conn->error;
            }
            $sql7 = "SELECT * FROM table7 WHERE date7 = '$date'";
            $result7 = $conn->query($sql7);
            $row = $result7->fetch_assoc();
            $availability7 = $row["availability7"];
            $selectedValue7 = $availability1[$index-1];
            echo "Selected value for table 7 slot $slot on $date is: $selectedValue7";
        }

        if ($result8->num_rows > 0) {
            // Date exists in the table, retrieve and display the selected slot
            $row = $result8->fetch_assoc();
            $availability8 = $row["availability8"];
            $selectedValue8 = $availability8[$index-1];
            echo "Selected value for table 8 slot $slot on $date is: $selectedValue8";
        } else {
            // Date does not exist in the table, insert a new row with 14 available slots
            $slot = str_repeat("0", 14);
            $sql8 = "INSERT INTO table8 (date8, availability8) VALUES ('$date', '$slot')";
        
            if ($conn->query($sql8) === TRUE) {
                echo "New record created successfully!";
            } else {
                echo "Error: " . $sql8 . "<br>" . $conn->error;
            }
            $sql8 = "SELECT * FROM table8 WHERE date8 = '$date'";
            $result8 = $conn->query($sql8);
            $row = $result8->fetch_assoc();
            $availability8 = $row["availability8"];
            $selectedValue8 = $availability8[$index-1];
            echo "Selected value for table 8 slot $slot on $date is: $selectedValue8";
        }

        if ($result9->num_rows > 0) {
            // Date exists in the table, retrieve and display the selected slot
            $row = $result9->fetch_assoc();
            $availability9 = $row["availability9"];
            $selectedValue9 = $availability9[$index-1];
            echo "Selected value for table 9 slot $slot on $date is: $selectedValue9";
        } else {
            // Date does not exist in the table, insert a new row with 14 available slots
            $slot = str_repeat("0", 14);
            $sql9 = "INSERT INTO table9 (date9, availability9) VALUES ('$date', '$slot')";
        
            if ($conn->query($sql9) === TRUE) {
                echo "New record created successfully!";
            } else {
                echo "Error: " . $sql9 . "<br>" . $conn->error;
            }
            $sql9 = "SELECT * FROM table9 WHERE date9 = '$date'";
            $result9 = $conn->query($sql9);
            $row = $result9->fetch_assoc();
            $availability9 = $row["availability9"];
            $selectedValue9 = $availability9[$index-1];
            echo "Selected value for table 9 slot $slot on $date is: $selectedValue9";
        }

        $_SESSION['allTableAvailability']=[$selectedValue1,$selectedValue2,$selectedValue3,$selectedValue4,$selectedValue5,$selectedValue6,$selectedValue7,$selectedValue8,$selectedValue9];

        if($query_run){
            header("location: ../../Layout/user/user_table.php");
        }
        else{
        header("location: ../../Layout/user/user_table.php");
        }
    }else{
        echo "Please make sure input all the field";
    }   

?>

