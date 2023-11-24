<?php

include 'koneksi.php';

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data sent in the request
    $npm = $_POST['npm'];
    $password = $_POST['password'];
    // Check if all required fields are provided
    if (!empty($password)) {
        // Check if the alumni with the given NPM exists
        $query_check = "SELECT * FROM alumni WHERE npm = '" . $npm . "'";
        $result_check = mysqli_query($koneksi, $query_check);

        if (mysqli_num_rows($result_check) > 0) {

            // Update the alumni data
            $update_alumni = "UPDATE alumni SET password = '$password' WHERE npm = '$npm'";

            $msql_update = mysqli_query($koneksi, $update_alumni);

            if ($msql_update) {
                echo "sukses";
            } else {
                echo "Failed to update data";
            }
        } else {
            echo "NPM not found. You can't update data for a non-existing alumni.";
        }
    } else {
        echo "Password must be provided.";
    }
} else {
    echo "Invalid request method. Use POST for updates.";
}
?>
