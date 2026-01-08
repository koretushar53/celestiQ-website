<?php
$conn = mysqli_connect("localhost", "root", "", "og");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sname = mysqli_real_escape_string($conn, $_POST['service_name']);
    $description = mysqli_real_escape_string($conn, $_POST['service_description']);
    
    // Handle Image Upload
    $image_name = $_FILES['service_image']['name'];
    $tmp_name = $_FILES['service_image']['tmp_name'];
    $folder = "uploads/" . $image_name;

    // Create uploads folder if it doesn't exist
    if (!is_dir('uploads')) {
        mkdir('uploads');
    }

    if (move_uploaded_file($tmp_name, $folder)) {
        $insert = "INSERT INTO services (sname, description, simage) VALUES ('$sname', '$description', '$image_name')";
        
        if (mysqli_query($conn, $insert)) {
            $message = "<div class='alert alert-success'>Service added successfully!</div>";
        } else {
            $message = "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
        }
    } else {
        $message = "<div class='alert alert-warning'>Failed to upload image.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f4f7f6; padding: 50px; }
        .card { border-radius: 15px; border: none; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
        .card-header { background: #47037e; color: white; border-radius: 15px 15px 0 0 !important; }
        .btn-primary { background: #47037e; border: none; }
        .btn-primary:hover { background: #35025e; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php echo $message; ?>
                <div class="card">
                    
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Service Name</label>
                                <input type="text" name="service_name" class="form-control" placeholder="e.g. Web Design" required>
                            </div>
                            <div class="form-group">
                                <label>Service Description</label>
                                <textarea name="service_description" class="form-control" rows="3" placeholder="Describe the service..." required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Service Image</label>
                                <input type="file" name="service_image" class="form-control-file" accept="image/*" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Add Service</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>