<?php

include 'koneksi.php';

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data sent in the request
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Check if all required fields are provided
    if (!empty($password)) {
        // Check if the admin with the given username exists
        $query_check = "SELECT * FROM admin WHERE username = '" . $username . "'";
        $result_check = mysqli_query($koneksi, $query_check);

        if (mysqli_num_rows($result_check) > 0) {

            // Update the alumni data
            $update_admin = "UPDATE admin SET password = '$password' WHERE username = '$username'";

            $msql_update = mysqli_query($koneksi, $update_admin);

            if ($msql_update) {
                echo "sukses";
            } else {
                echo "Failed to update data";
            }
        } else {
            echo "Username not found. You can't update data for a non-existing admin.";
        }
    } else {
        echo "Password must be provided.";
    }
} else {
    echo "Invalid request method. Use POST for updates.";
}
?>
