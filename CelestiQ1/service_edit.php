<?php
$conn = mysqli_connect('localhost', 'root', '', 'og');

if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$id = "";
$sname = "";
$description = "";
$simage = "";

// 1. FETCH existing data to fill the form
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $res = mysqli_query($conn, "SELECT * FROM services WHERE id = '$id'");
    if ($row = mysqli_fetch_assoc($res)) {
        $sname = $row['sname'];
        $description = $row['description'];
        $simage = $row['simage'];
    }
}

// 2. UPDATE data when form is submitted
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $new_name = mysqli_real_escape_string($conn, $_POST['service_name']);
    $new_desc = mysqli_real_escape_string($conn, $_POST['service_description']);
    
    // Check if a new image was uploaded
    if ($_FILES['service_img']['name'] != "") {
        $new_img = $_FILES['service_img']['name'];
        move_uploaded_file($_FILES['service_img']['tmp_name'], "uploads/" . $new_img);
    } else {
        // Keep the old image if no new one is selected
        $new_img = $_POST['old_img'];
    }

    $update = "UPDATE services SET sname='$new_name', description='$new_desc', simage='$new_img' WHERE id='$id'";
    
    if (mysqli_query($conn, $update)) {
        header("Location: service_list.php?msg=updated");
        exit();
    } else {
        echo "Error updating: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Service | CelestiQ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background: #f8f9fa; padding-top: 50px; }
        .edit-container { max-width: 500px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<div class="edit-container">
    <h3 class="text-center mb-4">Edit Service</h3>
    <form action="service_edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="old_img" value="<?php echo $simage; ?>">

        <div class="form-group">
            <label>Service Name</label>
            <input type="text" name="service_name" class="form-control" value="<?php echo $sname; ?>" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="service_description" class="form-control" rows="4"><?php echo $description; ?></textarea>
        </div>

        <div class="form-group">
            <label>Current Image</label><br>
            <img src="uploads/<?php echo $simage; ?>" width="100" class="mb-2 img-thumbnail">
            <input type="file" name="service_img" class="form-control-file">
            <small class="text-muted">Leave blank to keep current image</small>
        </div>

        <button type="submit" name="submit" class="btn btn-primary btn-block">Update Service</button>
        <a href="service_list.php" class="btn btn-secondary btn-block">Cancel</a>
    </form>
</div>

</body>
</html>








