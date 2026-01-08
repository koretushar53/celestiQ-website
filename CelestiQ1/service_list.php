<?php
$conn = mysqli_connect("localhost", "root", "", "og");
if(!$conn){ die("Connection Failed".mysqli_connect_error()); }

// Select ALL services, not just ID 1
$sql = "SELECT * FROM services"; 
$result = mysqli_query($conn, $sql);
if(isset($_GET['id'])){

$id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "DELETE FROM services WHERE id = '$id'";
if(mysqli_query($conn, $sql)){
    header("Location: service_list.php");
    exit();
}
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Service List | CelestiQ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h3 class="mb-0">Service Management</h3>
                <a href="add_services.php" class="btn btn-light btn-sm">Add New</a>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Service Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)){ ?>
                        <tr id="row_<?php echo $row['id']; ?>">
                            <td><?php echo $row['id']; ?></td>
                            <td><img src="uploads/<?php echo $row['simage']; ?>" width="60" class="img-thumbnail"></td>
                            <td><strong><?php echo $row['sname']; ?></strong></td>
                            <td><?php echo substr($row['description'], 0, 50); ?>...</td>
                            <td>
                                <a href="service_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                <a href = "delete_service.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                                
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>



                </table>
            </div>
        </div>
    </div>

    
    
</body>
</html>
