<?php
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception; 

require '../../phpmailer/src/Exception.php';
require '../../phpmailer/src/PHPMailer.php';
require '../../phpmailer/src/SMTP.php';

session_start();
include_once("../../config.php");

$note= $_POST['note'];
if(empty($note)){
  $note="-";
}

$userID = $_SESSION['userID'];
$reservationDate = $_SESSION['reservationDate'];
$reservationTime = $_SESSION['slot'];
$tableNo = $_SESSION['selectedTable'];
$noOfPax = $_SESSION['noOfPax'];
if(isset($_SESSION['cart'])){
  $reservedFood = serialize($_SESSION['cart']);
}else{
  $reservedFood = '-';
}


$timeSlot = ['8:00-9:00','9:00-10:00','10:00-11:00','11:00-12:00','12:00-13:00','13:00-14:00',
'14:00-15:00','15:00-16:00','16:00-17:00','17:00-18:00','18:00-19:00','19:00-20:00','20:00-21:00',
'21:00-22:00'];

$query = "INSERT INTO `reservation`(`userID`, `reservedDate`, `reservedTime`, `tableNo`, `paxNo`, `reservedFood`, `reservedNote`, `status`) VALUES (?,?,?
  ,?,?,?,?,?)";
$stmt = $conn->prepare($query);
$stmt->execute([$userID,$reservationDate,$timeSlot[$reservationTime-1],$tableNo,$noOfPax,$reservedFood,$note,"Pending"]);

//send email
$mail = new PHPMailer(true);
$mail ->isSMTP();
$mail ->Host='smtp.gmail.com';
$mail ->SMTPAuth=true;
$mail ->Username ='hollandfood13@gmail.com';
$mail ->Password='rrmfynnwoanfskxt';
$mail->Port=587;
$mail->SMTPSecure ='tls';

$mail->setFrom('hollandfood13@gmail.com');
$mail->addAddress($_SESSION['userEmail']);
$mail->isHTML(true);
//Customized subject and body
$mail->Subject = 'Reservation with Holland Food';
$mail->Body = 'Reservation with Holland Food';

$mail->send();

//update table
$stringTable = $_SESSION['selectedTable'];
$elements = explode(',', $stringTable);
$elements = array_map('trim', $elements);

foreach ($elements as $element) {
    //get the tabkle no
    $table= substr($element,1);
    echo $table;

    //get the table availability
    $sql = "SELECT availability".$table." FROM table".$table." WHERE date".$table." = '$reservationDate'";
    echo $sql;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $availability = $row["availability".$table];
    echo $availability ."<br>";

    //update the table availability
    $tempArray = str_split($availability);
    $tempArray[intval($reservationTime)-1] = '1';
    $newAvailability = implode('', $tempArray);
    echo $newAvailability;
    $updateSql="UPDATE table".$table." SET availability".$table. "='$newAvailability' WHERE date".$table."='$reservationDate'";
    echo $updateSql;
    $conn->query($updateSql);

}

unset($_SESSION['reservationDate']);
unset($_SESSION['tableNo']);
unset($_SESSION['noOfPax']);
unset($_SESSION['cart']);
unset($_SESSION['slot']);
unset($_SESSION['selectedTable']);
echo json_encode(['status' => 'success']);
