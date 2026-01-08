<?php
$conn = mysqli_connect('localhost', 'root', '', 'og');

// AJAX Delete Logic
if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $query = "DELETE FROM services WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo "success";
    } else {
        echo "error";
    }
    exit; // Stop the rest of the page from loading during an AJAX call
}

// Your existing SELECT query follows...
$result = mysqli_query($conn, "SELECT * FROM services");
if(isset($_GET['id'])){

$id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "DELETE FROM services WHERE id = '$id'";
if(mysqli_query($conn, $sql)){
    header("Location: service_list.php");
    exit();
}
}

?>