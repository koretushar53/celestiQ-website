<?php 
$conn = mysqli_connect('localhost', 'root', '', 'celestiq'); 

if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error()); 
} 

if (isset($_POST['submit'])) { 
    // You were missing the function name 'mysqli_real_escape_string' here
    $name    = mysqli_real_escape_string($conn, $_POST['name']); 
    $email   = mysqli_real_escape_string($conn, $_POST['email']); 
    $subject = mysqli_real_escape_string($conn, $_POST['subject']); 
    $message = mysqli_real_escape_string($conn, $_POST['message']); 

    $sql = "INSERT INTO celesti (`name`, `email`, `subject`, `message`) 
            VALUES ('$name', '$email', '$subject', '$message')"; 

    if (mysqli_query($conn, $sql)) { 
        
    } else { 
        echo "Error: " . mysqli_error($conn); 
    } 
} 
?>

<?php include_once ('header.php') ?>
    <div class="main-slider">
	<div class="slider">
		<div>
    	<div class="slider-img">
    	<img src="images/1.jpg">	
    	<div class="slider-text">
    	<div class="container" id="slide">	
    		<div class="col-md-8 textside position-relative">
            <div class="content text-center">
              <h6 class="mb-0 ">CelestiQ</h6>
              <h1 class="mb-0 "> Online Group Discussion & Aptitude </h1>
              <a class="more_btn " href="#">Join Us Now</a>
            </div>
          </div>   		
    	</div>
    		
    	</div>	
    	</div>	<!-- img -->
    </div><!-- slider -->
    <div>
    	<div class="slider-img ">
    	<img src="images/2.0.png">	
    	<div class="slider-text">
    	<div class="container" id="slide">	
    		<div class="col-md-8 textside position-relative">
            <div class="content text-center">
              <h6 class="mb-0 ">CelestiQ</h6>
             <p1> <h1 class="mb-0 ">Video based interviews</h1></p1>
              <a class="more_btn" href="#">Join Us Now</a>
            </div>
          </div>
    	</div>
    		
    	</div>	
    	</div>	<!-- img -->
    </div><!-- slider -->
     <div>
    	<div class="slider-img ">
    	<img src="images/3.jpg">	
    	<div class="slider-text">
    	<div class="container" id="slide">	
    		<div class="col-md-8 textside position-relative">
            <div class="content text-center">
              <h6 class="mb-0">CelestiQ</h6>
              <h1 class="mb-0">An AI Powered Interviewer</h1>
              <a class="more_btn" href="#">Join Us Now</a>
            </div>
          </div>
    		
    	</div>
    		
    	</div>	
    	</div>	<!-- img -->
    </div><!-- slider -->
     
     </div>
</div><!-- main-slider --> 
<div class="About us">
    <div class = "container">
        <div class = "row">
            <div class = "col-xs-12 col-sm-12 col-md-6 col-lg-6">
                
                <img src="images/about_us.png" alt="About us" class="img-fluid" height="250"  width="500">
                </div>
                <div class = "col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h1>About Us</h1>
                    <p>
                    At CelestiQ, we believe that technology should serve as a bridge between complex innovation and everyday human needs. Our journey began at the Sharad Institute of Technology College of Engineering, Yadrav, with a simple goal: to build a solution that doesn’t just look good on paper but solves a real-world challenge.
                    In today’s fast-paced world, traditional hiring is often slow, manual, and prone to human bias. We developed CelestiQ – AI Powered Interviewer to transform the recruitment cycle into a data-driven, efficient, and fair process.</p>
                    <a href="about.html" class="more_btn">Read More</a>
                </div>
        </div>
</div>

<br><br><hr>
<center><h1>Services for Companies & HR Departments</h1></center><br>
<div class ="Services">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    
                    <div class="cards">

                        <div class="card" style="width: 18rem">
                            <div class="card-body">
                                <h5 class="card-title">AI Powered Interviewer</h5>
                                <img src ="images/card3.png" alt="Card image cap" width="200" >
                                <p class="card-text">CelestiQ’s AI-powered interviewer is a tool that can conduct interviews with candidates, providing a more efficient and effective way to assess their skills and qualifications.</p>
                            </div>
                        </div>
            </div>
        </div>
 <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                   
                    <div class="cards">

                        <div class="card" style="width: 18rem">
                            <div class="card-body">
                                <h5 class="card-title">AI-Powered Video Interviewing</h5>
                                <img src ="images/card2.png" alt="Card image cap" width="200" >
                                <p class="card-text">CelestiQ’s AI-powered interviewer is a tool that can conduct interviews with candidates, providing a more efficient and effective way to assess their skills and qualifications.</p>
                            </div>
                        </div>
            </div>
        </div>
 <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    
                    <div class="cards">

                        <div class="card" style="width: 18rem">
                            <div class="card-body">
                                <h5 class="card-title">Standardized Technical Testing</h5>
                                <img src ="images/card1.png" alt="Card image cap" width="200" >
                                <p class="card-text">Administer automated Aptitude Tests to evaluate logical reasoning and technical knowledge without manual supervision..</p>
                            </div>
                        </div>
            </div>
        </div>

    </div>
</div>
        
</div>
<br> <hr>
<br>
<div class="Contact">
    <div class = "container">
        <div class = "row">
            <div class = "col-xs-12 col-sm-12 col-md-6 col-lg-6">
                
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15286.22003689829!2d74.45833544882503!3d16.699136848074637!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc11df2e6e2c273%3A0x6a8d058242dfdf90!2sSangli%20Naka%20Bus%20Stop!5e0!3m2!1sen!2sin!4v1767430240348!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class = "col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h1>Contact Us</h1>
                    <h2> Email: titanthanosai5557@gmail.com</h2>
                    <h3> Phone: +91 9860117828</h3>
                    <h3> Address: Sangli Naka Bus Stop</h3>
                    <br>
                    <form method = "POST" action = "index.php">
                        <input type="text" name = "name" placeholder="Name">
                        <input type="email" name = "email" placeholder="Email">
                        <input type="text" name = "subject" placeholder="Subject">
                        <textarea name = "message" placeholder="Message"></textarea>
                        <input type="submit" name="submit" value="Submit">
                        
                    </form>
                </div>
        </div>
</div>
<br><br><hr>
<br>
<div class ="">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    
                    <div class="cards">

                        <div class="card" style="width: 18rem">
                            <div class="card-body">
                                
                                <img src ="images/logo.png" alt="Card image cap" width="80" >
                                <h5 class="card-title">CelestiQ</h5>
                                <p class="card-text">-Online GD <br>
                                    -Online Amptitude Test<br>
                                    -Online Video Based Interview</p>
                                

                            </div>
                        </div>
            </div>
        </div>
 <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                   
                    <div class="cards">

                        <div class="card" style="width: 18rem">
                            <div class="card-body">
                                <h5 class="card-title">Quicklinks</h5>
                                
                                <p>Privacy Policy: How we handle candidate data and video recordings.Terms of Service: Guidelines for using the CelestiQ platform.Support Center: Technical help for the web application.</p>
                            </div>
                        </div>
            </div>
        </div>
 <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    
                    <div class="cards">

                        <div class="card" style="width: 18rem">
                            <div class="card-body">
                                <h5 class="card-title">Address</h5>
                                
                                <p>Sangli Naka Bus Stop Ichalkaranji Sangli Road, Asara Nagar, Ichalkaranji, Maharashtra 416121.</p>
                            </div>
                        </div>
            </div>
        </div>











</body>
</html>


