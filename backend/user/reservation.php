<?php

session_start();
include_once("../../config.php");

$note= $_POST['note'];
if(empty($note)){
  $note="-";
}


$userID = $_SESSION['userID'];
$reservationDate = $_SESSION['reservationDate'];
$reservationTime = $_SESSION['reservationTime'];
$tableNo = $_SESSION['tableNo'];
$noOfPax = $_SESSION['noOfPax'];
$reservedFood = serialize($_SESSION['cart']);

$timeSlot = ['8:00-9:00','9:00-10:00','10:00-11:00','11:00-12:00','12:00-13:00','13:00-14:00',
'14:00-15:00','15:00-16:00','16:00-17:00','17:00-18:00','18:00-19:00','19:00-20:00','20:00-21:00',
'21:00-22:00'];

$query = "INSERT INTO `reservation`(`userID`, `reservedDate`, `reservedTime`, `tableNo`, `paxNo`, `reservedFood`, `reservedNote`, `status`) VALUES (?,?,?
  ,?,?,?,?,?)";
$stmt = $conn->prepare($query);
$stmt->execute([$userID,$reservationDate,$timeSlot[$reservationTime],$tableNo,$noOfPax,$reservedFood,$note,"Pending"]);
unset($_SESSION['reservationDate']);
unset($_SESSION['reservationTime']);
unset($_SESSION['tableNo']);
unset($_SESSION['noOfPax']);
unset($_SESSION['cart']);
echo json_encode(['status' => 'success']);


//change the time slot of each table
