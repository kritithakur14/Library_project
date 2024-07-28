<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Feedback Form</title>
</head>
<body>
   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
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
                        <a class="nav-link active" href="feedbackform.php">Feedback</a>
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
        
        //Connecting the table
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email=$_POST['email'];
            $name=$_POST['name'];
            $comment=$_POST['comment'];
            $feed_type=$_POST['feedback_type'];
            
            $sql="INSERT INTO `feedback` (`name`, `email`, `comments`, `feedback_type`)
             VALUES ('$name', '$email', '$comment', '$feed_type');";
            $result=mysqli_query($conn,$sql);
            if($result){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your entry is sucessfully submitted.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                
            }
            else{
    
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Password does not match.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
  
    ?>
    <!-- Main content  -->
    <div class="container mt-2 shadow-lg feedback-container">
        <div class="row">
            <div class="col-md-3"></div>
                <h2 class="text-black">Feedback Form</h2>
                <p class="text-black">We welcome your comments and suggestion!</p>
                <hr>
                <form action="/project/project_file/Library_project/partials/feedbackform.php" method="post">
                    <div class="text-black">
                        <h5>What kind of comment would you like to send?</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="radio" name="feedback_type" id="feed1" class= "pointer" value="suggestion">&nbsp;&nbsp;<label for="feed1" >Suggestion</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="feedback_type" id="feed2" class="pointer" value="complaint">&nbsp;&nbsp;<label for="feed2">Complaint</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="feedback_type" id="feed3" class= "pointer" value="problem">&nbsp;&nbsp;<label for="feed3">Problem</label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="feedback_type" id="feed4" class="pointer" value="praise">&nbsp;&nbsp;<label for="feed4">Praise</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3 text-black">
                        <label for="formGroupExampleInput" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your full name." required="">
                    </div>
                    <div class="mb-3 text-black"> 
                
                        <label for="formGroupExampleInput2" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter your e-mail address. " required="">
                    </div>
                    <div class="form-group mb-2 text-black">
                        <label class="form-label">Describe Feedback:</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" name="comment" id="floatingTextarea" required=""></textarea>
                        <label for="floatingTextarea">Comment</label>
                    </div>
                    
                    <div class="col-auto button">
                        <button type="submit" class='btn btn-primary'>Submit</button>
                    </div> 
                </form>
        </div>
    </div>
    
</body>
</html>