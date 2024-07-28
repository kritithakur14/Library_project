<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Sign Up</title>
</head>
<body>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- php code start here -->

     <!-- Nav bar -->
     <nav class="navbar navbar-expand-lg navbar-dark bglavender">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Let's Read</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about.html">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/categories.html">Action</a></li>
                            <li><a class="dropdown-item" href="/categories.html">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/categories.html">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="feedbackform.php">Feedback</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn animated-btn" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <?php
    // Connect to the database
    $servername= "localhost";
    $username= "root";
    $password= "";
    $database= "library";

    //create a connection
    $conn = mysqli_connect($servername, $username, $password, $database );
    if(!$conn){
        die("Sorry we fail to connect.". mysqli_connect_error());
    }
    else{
        //Connecting the table
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email=$_POST['email-id'];
            $fname=$_POST['first_name'];
            $lname=$_POST['last_name'];
            $pass=$_POST['password'];  
            $phone=$_POST['phone'];
            $conpass=$_POST['cpassword'];
            $sql="INSERT INTO `user` (`password`, `first_name`, `last_name`, `phone`, `signup_date`, `email_id`) 
            VALUES ('$pass','$fname', '$lname', '$phone', current_timestamp(), '$email');";
            $result=mysqli_query($conn,$sql);
            if($pass==$conpass){
        
                if($result){
                    echo 'successful';
                }
                else{
                    echo "The record was not successfully inserted";
                }
            }
            else{
        
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Password does not match.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
      
    }
    ?>

    <!-- main content -->
    <form action="/project/project_file/Library_project/partials/signup.php" method="post">
        <div class="container mt-2 shadow-lg feedback-container">
            <div class="row">
             <div class="col-md-3"></div>
                <h2 class="text-black">Sign Up</h2>
                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname" name="first_name" required="">
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="last_name" required="">
                    </div>

                
                <div class="mb-3">
                    <label for="InputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="Email1" name="email-id" aria-describedby="emailHelp" required="">
                </div>
                <div class="mb-3">
                    <label for="InputEmail1" class="form-label">Phone No.</label>
                    <input type="number" class="form-control" id="phone" name="phone">
                </div>
                <div class="mb-3">
                    <label for="InputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="InputPassword1" name="password" required="">
                </div>
                <div class="mb-3">
                    <label for="InputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="InputPassword1" name="cpassword" required="">
                </div>
                <div class="col-auto button">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
    </form>
</body>
</html>