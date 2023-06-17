<?php
session_start();
include_once("../../config.php");
$timeSlot = ['8:00-9:00','9:00-10:00','10:00-11:00','11:00-12:00','12:00-13:00','13:00-14:00',
'14:00-15:00','15:00-16:00','16:00-17:00','17:00-18:00','18:00-19:00','19:00-20:00','20:00-21:00',
'21:00-22:00'];
if (isset($_POST['reserveID']) && is_numeric($_POST['reserveID'])) {
  $reserveID = $_POST['reserveID'];
  // get the date and time
    $sql = "SELECT `reserveID`, `userID`, `reservedDate`, `reservedTime`, `tableNo`, `paxNo`, `reservedFood`, `reservedNote`, `status` FROM `reservation` WHERE reserveID = ". $reserveID;
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        
            $row = mysqli_fetch_assoc($result);
            $date = $row["reservedDate"];
            $reservedTime=  $row["reservedTime"];
            $reservedTable = $row["tableNo"];
            $reservedSlot = array_search($reservedTime,$timeSlot);
            echo $reservedSlot."uu";
            
            $elements = explode(',', $reservedTable);
            $elements = array_map('trim', $elements);

            foreach ($elements as $element) {
                //get the tabkle no
                $table= substr($element,1);

                //get the table availability
                $sqlGet = "SELECT availability".$table." FROM table".$table." WHERE date".$table." = '$date'";
                $resultGet = $conn->query($sqlGet);
                $rowGet = $resultGet->fetch_assoc();
                $availability = $rowGet["availability".$table];
                echo $availability ."<br>";

                //update the table availability
                $tempArray = str_split($availability);
                $tempArray[intval($reservedSlot)] = '2';
                $newAvailability = implode('', $tempArray);
                echo $newAvailability;
                $updateSql="UPDATE table".$table." SET availability".$table. "='$newAvailability' WHERE date".$table."='$date'";
                echo $updateSql;
                $conn->query($updateSql);

            }
           
        }
  $query = "UPDATE reservation SET status = 'Arrived' WHERE reserveID = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, 'i', $reserveID);
  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    echo "success";

  } else {
    echo "error";
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}



?>