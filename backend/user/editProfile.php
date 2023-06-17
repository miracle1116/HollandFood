<?php  
session_start();


$host = "localhost";
$database = "holland-food";
$user = "root";
$pass = "";

$conn = mysqli_connect($host, $user, $pass, $database);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['userID']) && isset($_SESSION['userFirstName'])) {


    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $contactno = $_POST['contactno'];
    $newpassword = $_POST['newpassword'];
    $confirmnewpassword = $_POST['confirmnewpassword'];
    $userID = $_SESSION['userID'];

    if (empty($firstname)||empty($lastname)||empty($birthdate)||empty($gender)||empty($contactno)) {
        $em = "emptyinput";
    	header("Location: ../../Layout/user/user_profile.php?error=$em");
	    exit;
    }
    else {
      if (!ctype_digit($contactno)&& $contactno!=='-') {
         $em = "inputerror";
        header("Location: ../../Layout/user/user_profile.php?error=$em");
        exit;
     }
        //update all
      if (isset($_FILES['profilepicture']['name']) && !empty($_FILES['profilepicture']['name'])&& !empty($newpassword)&&!empty($confirmnewpassword)) {
        if($newpassword!==$confirmnewpassword){
            header("location: ../../Layout/user/user_profile.php?error=passworddonotmatch");
            exit();
        }

         $img_name = $_FILES['profilepicture']['name'];
         $tmp_name = $_FILES['profilepicture']['tmp_name'];
         $error = $_FILES['profilepicture']['error'];

         $hashpassword= password_hash($newpassword, PASSWORD_DEFAULT);
         
         if($error === 0){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);

            $allowed_exs = array('jpg', 'jpeg', 'png');
            if(in_array($img_ex_to_lc, $allowed_exs)){
               $new_img_name = uniqid($userID, true).'.'.$img_ex_to_lc;
               $img_upload_path = '../../upload/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
       

               // update the Database
               $sql = "UPDATE users 
                       SET userFirstName=?, userLastName=?, userPassword=?, userContactNo=?, userBirthDate=?, userGender=?, userProfilePic=?
                       WHERE userID=?";
               $stmt = $conn->prepare($sql);
               $stmt->execute([$firstname, $lastname, $hashpassword,$contactno,$birthdate, $gender,$img_upload_path, $userID]);

               //update the session
               $_SESSION["userFirstName"]= $firstname;
               $_SESSION["userLastName"]= $lastname;
               $_SESSION["userContactNo"]= $contactno;
               $_SESSION["userBirthDate"]= $birthdate;
               $_SESSION["userGender"]= $gender;
               $_SESSION["userProfilePic"]= $img_upload_path;
               header("Location: ../../Layout/user/user_profile.php?error=none");
                exit();

            }else {
               $em = "filetypeerror";
               header("Location: ../../Layout/user/user_profile.php?error=$em");
               exit();
            }
         }else {
            $em = "unknown error occurred!";
            header("Location: ../../Layout/user/user_profile.php?error=$em");
            exit();
         }

        
      }//update password only
      else if((!empty($newpassword)||!empty($confirmnewpassword))){
        if($newpassword!==$confirmnewpassword){
            header("location: ../../Layout/user/user_profile.php?error=passworddonotmatch");
            exit();
        }

        $hashpassword= password_hash($newpassword, PASSWORD_DEFAULT);

        // update the Database
        $sql = "UPDATE users 
        SET userFirstName=?, userLastName=?, userPassword=?, userContactNo=?, userBirthDate=?, userGender=?
        WHERE userID=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$firstname, $lastname, $hashpassword, $contactno,$birthdate, $gender, $userID]);

        //update the session
        $_SESSION["userFirstName"]= $firstname;
        $_SESSION["userLastName"]= $lastname;
        $_SESSION["userContactNo"]= $contactno;
        $_SESSION["userBirthDate"]= $birthdate;
        $_SESSION["userGender"]= $gender;
        header("Location: ../../Layout/user/user_profile.php?error=none");
        exit;
         
      }//update profile picture only
      else if(isset($_FILES['profilepicture']['name']) && !empty($_FILES['profilepicture']['name'])){
        $img_name = $_FILES['profilepicture']['name'];
        $tmp_name = $_FILES['profilepicture']['tmp_name'];
        $error = $_FILES['profilepicture']['error'];

        
        if($error === 0){
           $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
           $img_ex_to_lc = strtolower($img_ex);

           $allowed_exs = array('jpg', 'jpeg', 'png');
           if(in_array($img_ex_to_lc, $allowed_exs)){
              $new_img_name = uniqid($userID, true).'.'.$img_ex_to_lc;
              $img_upload_path = '../../upload/'.$new_img_name;
               move_uploaded_file($tmp_name, $img_upload_path);
      

              // update the Database
              $sql = "UPDATE users 
                      SET userFirstName=?, userLastName=?, userContactNo=?, userBirthDate=?, userGender=?, userProfilePic=?
                      WHERE userID=?";
              $stmt = $conn->prepare($sql);
              $stmt->execute([$firstname, $lastname, $contactno, $birthdate, $gender, $img_upload_path, $userID]);

              //update the session
              $_SESSION["userFirstName"]= $firstname;
              $_SESSION["userLastName"]= $lastname;
              $_SESSION["userContactNo"]= $contactno;
              $_SESSION["userBirthDate"]= $birthdate;
              $_SESSION["userGender"]= $gender;
              $_SESSION["userProfilePic"]= $img_upload_path;
              header("Location: ../../Layout/user/user_profile.php?error=none");
               exit;

           }else {
              $em = "filetypeerror";
              header("Location: ../../Layout/user/user_profile.php?error=$em");
              exit;
           }
        }else {
           $em = "unknown error occurred!";
           header("Location: ../../Layout/user/user_profile.php?error=$em");
           exit;
        }
      }//not update profile pic and password
      else if(empty($newpassword)&& empty($confirmnewpassword)&& empty($_FILES['profilepicture']['name'])){
        // update the Database
        $sql = "UPDATE users 
        SET userFirstName=?, userLastName=?, userContactNo=?, userBirthDate=?, userGender=?
        WHERE userID=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$firstname, $lastname, $contactno,$birthdate, $gender, $userID]);

        //update the session
        $_SESSION["userFirstName"]= $firstname;
        $_SESSION["userLastName"]= $lastname;
        $_SESSION["userContactNo"]= $contactno;
        $_SESSION["userBirthDate"]= $birthdate;
        $_SESSION["userGender"]= $gender;
        header("Location: ../../Layout/user/user_profile.php?error=none");
        exit();
      }
    }


}else {
	header("Location: login.php");
	exit;
} 
