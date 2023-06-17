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



$email = '<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <style>
    body {
      margin: 0 auto !important;
      padding: 0 !important;
      height: 100% !important;
      width: 100% !important;
      background: #f1f1f1;
  }
  
  * {
      -ms-text-size-adjust: 100%;
      -webkit-text-size-adjust: 100%;
  }
  
  /* What it does: Centers email on Android 4.4 */
  div[style*="margin: 16px 0"] {
      margin: 0 !important;
  }
  
  /* What it does: Stops Outlook from adding extra spacing to tables. */
  table,
  td {
      mso-table-lspace: 0pt !important;
      mso-table-rspace: 0pt !important;
  }
  
  /* What it does: Fixes webkit padding issue. */
  table {
      border-spacing: 0 !important;
      border-collapse: collapse !important;
      table-layout: fixed !important;
      margin: 0 auto !important;
  }
  
  /* What it does: Uses a better rendering method when resizing images in IE. */
  img {
      -ms-interpolation-mode:bicubic;
  }
  
  /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
  a {
      text-decoration: none;
  }
  
  /* What it does: A work-around for email clients meddling in triggered links. */
  *[x-apple-data-detectors],  /* iOS */
  .unstyle-auto-detected-links *,
  .aBn {
      border-bottom: 0 !important;
      cursor: default !important;
      color: inherit !important;
      text-decoration: none !important;
      font-size: inherit !important;
      font-family: inherit !important;
      font-weight: inherit !important;
      line-height: inherit !important;
  }
  
  /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
  .a6S {
      display: none !important;
      opacity: 0.01 !important;
  }
  
  /* What it does: Prevents Gmail from changing the text color in conversation threads. */
  .im {
      color: inherit !important;
  }
  
  /* If the above doesnt work, add a .g-img class to any image in question. */
  img.g-img + div {
      display: none !important;
  }
  
  /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
  /* Create one of these media queries for each additional viewport size youd like to fix */
  
  /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
  @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
      u ~ div .email-container {
          min-width: 320px !important;
      }
  }
  /* iPhone 6, 6S, 7, 8, and X */
  @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
      u ~ div .email-container {
          min-width: 375px !important;
      }
  }
  /* iPhone 6+, 7+, and 8+ */
  @media only screen and (min-device-width: 414px) {
      u ~ div .email-container {
          min-width: 414px !important;
      }
  }

  </style>

  <!-- CSS Reset : END -->

  <!-- Progressive Enhancements : BEGIN -->
  <style>

    .primary{
background: #17bebb;
}
.bg_white{
background: #ffffff;
}
.bg_light{
background: #f7fafa;
}
.bg_black{
background: #000000;
}
.bg_dark{
background: rgba(0,0,0,.8);
}
.email-section{
padding:2.5em;
}

/*BUTTON*/
.btn{
padding: 10px 15px;
display: inline-block;
}
.btn.btn-primary{
border-radius: 5px;
background: #17bebb;
color: #ffffff;
}
.btn.btn-white{
border-radius: 5px;
background: #ffffff;
color: #000000;
}
.btn.btn-white-outline{
border-radius: 5px;
background: transparent;
border: 1px solid #fff;
color: #fff;
}
.btn.btn-black-outline{
border-radius: 0px;
background: transparent;
border: 2px solid #000;
color: #000;
font-weight: 700;
}
.btn-custom{
color: rgba(0,0,0,.3);
text-decoration: underline;
}

h1,h2,h3,h4,h5,h6{
font-family: \'Poppins\', sans-serif;
color: #000000;
margin-top: 0;
font-weight: 400;
}

body{
font-family: \'Poppins\', sans-serif;
font-weight: 400;
font-size: 15px;
line-height: 1.8;
color: rgba(0,0,0,.4);
}

a{
color: #17bebb;
}

table{
}
/*LOGO*/

.logo h1{
margin: 0;
}
.logo h1 a{
color: #fe724c;
font-size: 24px;
font-weight: 700;
font-family: \'Poppins\', sans-serif;
}

/*HERO*/
.hero{
position: relative;
z-index: 0;
}

.hero .text{
color: rgba(0,0,0,.3);
}
.hero .text h2{
color: #000;
font-size: 34px;
margin-bottom: 0;
font-weight: 200;
line-height: 1.4;
}
.hero .text h3{
font-size: 24px;
font-weight: 300;
}
.hero .text h2 span{
font-weight: 600;
color: #000;
}

.text-author{
bordeR: 1px solid rgba(0,0,0,.05);
max-width: 50%;
margin: 0 auto;
padding: 2em;
}
.text-author img{
border-radius: 50%;
padding-bottom: 20px;
}
.text-author h3{
margin-bottom: 0;
}
ul.social{
padding: 0;
}
ul.social li{
display: inline-block;
margin-right: 10px;
}

/*FOOTER*/

.footer{
border-top: 1px solid rgba(0,0,0,.05);
color: rgba(0,0,0,.5);
}
.footer .heading{
color: #000;
font-size: 20px;
}
.footer ul{
margin: 0;
padding: 0;
}
.footer ul li{
list-style: none;
margin-bottom: 10px;
}
.footer ul li a{
color: rgba(0,0,0,1);
}


@media screen and (max-width: 500px) {


}
    </style>
</head>
<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
    <center style="width: 100%; background-color: #f1f1f1;">
        <div style="display: none; font-size: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">&zwnj;&nbsp;</div>
        <div style="max-width: 600px; margin: 0 auto;" class="email-container">
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
                <tr>
                    <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td class="logo" style="text-align: center;">
                                    <h1><a href="#">Holland Food</a></h1>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="padding: 0 2.5em; text-align: center; padding-bottom: 3em;">
                                    <div class="text">
                                        <h2>Reservation on Holland Food</h2>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-author">
                                        <h2 class="name"  style="font-weight: bold;" >Reservation Details</h2>
                                        <h4 style="margin-top: 20px;">Name: '. $_SESSION['userFirstName'].'</h4>
                                        <h4>Reservation Date: '. $timeSlot[$reservationTime-1].'</h4>
                                        <h4>Reservation Time: '. $reservationDate.'</h4>
                                        <h4>Table: '. $tableNo.'</h4>
                                        <h4>No of Pax: '. $noOfPax.'</h4>
                                        <h4>Ordered Food:</br> '. $_SESSION['foodName'].'</h4>
                                        <h4>Note: '. $note.'</h4>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td valign="middle" class="bg_light footer email-section">
                        <table>
                            <tr>
                                <td valign="top" width="33.333%" style="padding-top: 20px;">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="text-align: left; padding-right: 10px;">
                                                <h3 class="heading">About</h3>
                                                <p>Holland Food, Kolej Kediaman Kinabalu, University of Malaya
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td valign="top" width="33.333%" style="padding-top: 20px;">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td style="text-align: left; padding-left: 5px; padding-right: 5px;">
                                                <h3 class="heading">Contact Info</h3>
                                                <ul>
                                                    <li><span class="text">+057111111</span></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </center>
</body>
</html>';

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
$mail->Body = $email;
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
unset($_SESSION['foodName']);
echo json_encode(['status' => 'success']);
