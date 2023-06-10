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



$query = "INSERT INTO `reservation`(`userID`, `reservedDate`, `reservedTime`, `tableNo`, `paxNo`, `reservedFood`, `reservedNote`, `status`) VALUES (?,?,?
  ,?,?,?,?,?)";
$stmt = $conn->prepare($query);
$stmt->execute([$userID,$reservationDate,$reservationTime,$tableNo,$noOfPax,$reservedFood,$note,"Pending"]);
unset($_SESSION['reservationDate']);
unset($_SESSION['reservationTime']);
unset($_SESSION['tableNo']);
unset($_SESSION['noOfPax']);
unset($_SESSION['cart']);
echo json_encode(['status' => 'success']);


//change the time slot of each table
