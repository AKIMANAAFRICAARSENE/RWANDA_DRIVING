<?php
    include "./auth/session-handler.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>R D L</title>
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

    <div class="content">
        <h1>Welcome to Rwanda Driving License System</h1>
        <p>This is the main content area where your main content goes.</p>
    </div>
</body>
</html>
