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
    <link rel="stylesheet" href="./fontawesome-free-6.5.1-web/fontawesome-free-6.5.1-web/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>R D L</title>
    <style>
        .container1 {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center ;
            margin-left: 80px;
            width: 90vw;
        }
        .content {
            background-color: #3465a1e0;
            color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        p{
            font-size: large;
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
                    <li><a href="./report.php">Report</a></li>
                </ul>
                <div>
                <a href="./auth/logout.php" class="btn btn-primary">Sign Out</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container1">
        <div class="content">
            <h1>Rwanda Driving License System</h1>
            <p>The driving license system in Rwanda is designed to ensure that all drivers meet the necessary requirements to operate vehicles safely on the roads. The system includes various types of licenses depending on the category of vehicle an individual wishes to drive.</p>
            <h2>License Categories</h2>
            <p>Rwanda offers different categories of driving licenses, including:</p>
            <ul>
                <li><strong>Category A:</strong> Motorcycles</li>
                <li><strong>Category B:</strong> Light vehicles (e.g., cars)</li>
                <li><strong>Category C:</strong> Heavy vehicles (e.g., trucks)</li>
                <li><strong>Category D:</strong> Passenger vehicles (e.g., buses)</li>
            </ul>
            <h2>Obtaining a Driving License</h2>
            <p>To obtain a driving license in Rwanda, applicants must follow these steps:</p>
            <ol>
                <li><strong>Register:</strong> Register at the Rwanda National Police (RNP) driving license center.</li>
                <li><strong>Theory Test:</strong> Pass a written theory test covering road signs, traffic laws, and safe driving practices.</li>
                <li><strong>Practical Test:</strong> Pass a practical driving test to demonstrate the ability to control the vehicle and follow traffic regulations.</li>
                <li><strong>Medical Examination:</strong> Undergo a medical examination to ensure fitness to drive.</li>
            </ol>
            <h2>Renewal and Replacement</h2>
            <p>Driving licenses in Rwanda are valid for a specified period and must be renewed before expiration. Lost or damaged licenses can be replaced by applying at the RNP driving license center and providing the necessary documentation.</p>
            <h2>Penalties and Enforcement</h2>
            <p>Rwanda has strict penalties for traffic violations, including fines, license suspension, and imprisonment for severe offenses. The RNP actively enforces traffic laws to enhance road safety.</p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QiPT2DEVIftZpR2AFmkbh7zF1TeZst+a2peQs5ueFhIpu0MO5TIC/N+qkR6pc0qM" crossorigin="anonymous"></script>

</body>
</html>
