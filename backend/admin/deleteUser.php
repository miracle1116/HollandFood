<?php
// including the database connection file
include_once("../../config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['userID']) && is_numeric($_POST['userID'])) {
    $userID = $_POST['userID'];

    try {
        // Start the transaction
        $conn->begin_transaction();

        // Delete the user account from the database
        $stmt = $conn->prepare("DELETE FROM users WHERE userID = ?");
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $stmt->close();

        // Commit the transaction if the deletion is successful
        $conn->commit();

        // Return success response
        echo "success";
    } catch (Exception $e) {
        // Rollback the transaction if an error occurred
        $conn->rollback();
        // Return error response
        echo "error";
    }

    $conn->close();
}
?>
