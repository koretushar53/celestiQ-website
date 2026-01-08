<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CelestiQ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script>$(document).ready(function(){
        $('.slider').bxSlider({ auto:true, mode:'fade', controls:false, pager:true, touchEnabled:false, speed: 1000 });


        });</script>
<style>
    /* Navigation Styling */
.navbar-light .navbar-nav .nav-link {
    font-weight: 500;
    color: #333;
    padding: 0.5rem 1rem !important;
    transition: color 0.3s ease;
}

.navbar-light .navbar-nav .nav-link:hover {
    color: #47037e; /* Matches your login page primary color */
}

/* Custom Primary Button */
.btn-primary {
    background-color: #47037e;
    border-color: #47037e;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.btn-primary:hover {
    background-color: #5a04a1;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(71, 3, 126, 0.2);
}

/* Dropdown Menu Styling */
.dropdown-menu {
    border-radius: 12px;
    padding: 10px;
    margin-top: 15px;
}

.dropdown-item {
    padding: 8px 20px;
    border-radius: 8px;
}

.dropdown-item:hover {
    background-color: #f8f4ff;
    color: #47037e;
}
.p{
    color: #47037e;

}
.cards{
    background-color: #f8f4ff;
    border-radius: 12px;
    padding: 20px;
    margin: 20px;
    box-shadow: 0 4px 12px rgba(71, 3, 126, 0.2);
    align-items: center;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;

}
.cards.hover{
    background-color: #f8f4ff;
    border-radius: 12px;
    padding: 20px;
    margin: 20px;
    box-shadow: 0 4px 12px rgba(71, 3, 126, 0.2);
}
.card.text{
    color: #47037e;
}
.card-text{
    color: #47037e;
}
.column{
    background-color: #f8f4ff;
    border-radius: 12px;
    padding: 20px;
    margin: 20px;
    box-shadow: 0 4px 12px rgba(71, 3, 126, 0.2);
}


</style>

</head>
<body>
        <header class="fixed-top bg-white shadow-sm">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light py-3">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="images/logo1.png" height="50" alt="CelestiQ Logo">
                <span class="ml-2 font-weight-bold text-">CelestiQ</span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ml-auto align-items-center">
                   
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown">
                            Services
                        </a>
                        <div class="dropdown-menu border-0 shadow" aria-labelledby="servicesDropdown">
                            <a class="dropdown-item" href="add_services.php">ADD SERVICES</a>
                            <a class="dropdown-item" href="service_list.php">SERVICES LIST</a>
                           
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown">
                            Products
                        </a>
                        <div class="dropdown-menu border-0 shadow" aria-labelledby="servicesDropdown">
                            <a class="dropdown-item" href="#">ADD PRODUCTS</a>
                            <a class="dropdown-item" href="#">PRODUCTS LIST</a>
                        </a>
                        
                        
                           
                    </li>

                    

                    <!-- <li class="nav-item ml-lg-3">
                        <a class="btn btn-primary rounded-pill px-4" href="login.php">Login</a>
                    </li> -->
                </ul>
            </div>
        </nav>
    </div>
<div class = "columns">
<div class= "cards">
    
        <div class="card-body">
            <h5 class="card-title">All Services</h5>
            <p class="card-text">View all services</p>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'og');
            $sql = "SELECT COUNT(*) as total FROM services";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $total = $row['total'];
            // echo $total;
            ?>
            <p class="card-text">Total Services: <?php echo $total; ?></p>

            



    


            <a href="service_list.php" class="btn btn-primary">View</a>
        </div>

</div>

        <div class= "cards">
    
        <div class="card-body">
            <h5 class="card-title">All Products</h5>
            <p class="card-text">View all Products</p>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'og');
            $sql = "SELECT COUNT(*) as total FROM services";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $total = $row['total'];
            // echo $total;
            ?>
            <p class="card-text">Total Products: <?php echo $total; ?></p>

            



    


            <a href="service_list.php" class="btn btn-primary">View</a>
        </div>
    </div>

































</body>

</html>



   































</header>

<div style="margin-top: 90px;"></div>

