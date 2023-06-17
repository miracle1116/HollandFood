<?php
// including the database connection file
include_once("../../config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) {
    // Retrieve the user ID and updated details from the form inputs

    $userID = $_POST['userID'];
    $firstname = $_POST['first-name'];
    $lastname = $_POST['last-name'];
    $birthdate = $_POST['birth-date'];
    $gender = $_POST['gender'];
    $contactnumber = $_POST['contact-number'];
    $email = $_POST['email'];

        try {
            // Start the transaction
            $conn->begin_transaction();

            // Prepare and execute the UPDATE query
            $stmt = $conn->prepare("UPDATE users SET userFirstName=?, userLastName=?, userEmail=?, userContactNo=?, userBirthDate=?, userGender=? WHERE users.userID=?");
            $stmt->bind_param("ssssssi", $firstname, $lastname, $email, $contactnumber, $birthdate, $gender, $userID);
            $stmt->execute();
            $stmt->close();

            // Commit the transaction if all operations were successful
            $conn->commit();
            echo "User details updated successfully.";

            // Redirect to the admin manage user page 
            header("location:  ../../Layout/admin/admin_manageUserAcc2.php");
            exit();
        } catch (Exception $e) {
            // Rollback the transaction if an error occurred
            echo "Error updating user details: " . $e->getMessage();
            $conn->rollback();
        }
        $conn->close();


}

?>