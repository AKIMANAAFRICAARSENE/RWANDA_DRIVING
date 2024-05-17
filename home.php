<div?php
    include "./auth/session-handler.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./fontawesome-free-6.5.1-web/fontawesome-free-6.5.1-web/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>R D L</title>
    <style>
 /* {
    color: black;
    font-size: 20px;
    font-family: monospace;
    line-height: 25px;
    background-color: white;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    height: 100vh;
} */

.divs{
    display: flex;
    width: 100%;
    justify-content: space-between;
    /* background: #000; */
    height: 70vh;

}
h1{
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 30px;
  color: black;
}
.content1{
    background-color: #0072fb;
    display: flex;
    flex-direction: column;
    justify-content: center;
    border-radius: 10px;
    margin-left: 20px;
    width: 50%;
    box-shadow: 0 1px 2px 0 #000;
    margin-top: 60px;
    height:500px;
    
    
}
.content1 p{
    display: block;
    color: white;
    font-size: 20px;

}
.footer-social{
    margin-right:30px;
    margin-top: 16%;
    /* height: %; */
}
.footer-social ul {
    width: 350px;
    background: white;
    list-style-type: none;
    padding: 0;
    box-shadow: 0 1px 2px 0 #1971c2;
    border-radius: 10px;

}

.footer-social ul li {
    display: block;
    padding: 10px;
    font-size: 20px;
    font-weight: bold;
    margin-right: 10px;
}

.footer-social ul li:last-child {
    margin-right: 0;
}

.footer-social ul li a {
    color: #0072fb;
    font-size: 20px;
}

.footer-social ul li a i {
    transition: color 0.3s ease;
    font-size: 30px;
}

.footer-social ul li a i:hover {
    color: #4f46e5;
}

    </style>
</head>
<body>
    <nav>
        <div class="container">
            <div class="nav-wrapper">
                <div class="logo-wrapper">
                    <img class="logo-mobile" src="./logo.png" alt="" />
                    <img class="logo-desktop" src="./logo.png" alt="" />
                </div>
                <ul class="nav-links">
                    <li><a href="./home.php" class="active">Home</a></li>
                    <li><a href="./candidates.php">Candidates</a></li>
                    <li><a href="./exam.php">Exam</a></li>
                    <!-- <li><a href="./failed.php">Failed</a></li>
                    <li><a href="./passed.php">Passed</a></li> -->
                    <li><a href="./report.php">Report</a></li>
                </ul>
                <div>
                <a href="./auth/logout.php" class="btn btn-primary">Sign Out</a>
                </div>
            </div>
        </div>
    </nav>

    <h1>Welcome to Rwanda Driving License System</h1>
    <div class="divs">
        <div class="content1">
            <p>> Register candidates for a Rwanda Driving License,</p> 
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, quia error, nesciunt natus numquam voluptatibus placeat veniam cumque dolor deleniti sed adipisci repellat suscipit doloribus velit fugiat quam nam eos?</p>
            <p>> Record the exam results for the candidate </p>
        </div>
        <div class="footer-social">
            <ul>
                <li><a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>&nbsp; FaceBook</li>
                <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>&nbsp; Twitter</li>
                <li><a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>&nbsp; Instagram</li>
                <li><a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>&nbsp; LinkedIN</li>
            </ul>
        </div>
    </div>
</body>
</html>
