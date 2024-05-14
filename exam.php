<?php
include "./auth/session-handler.php";
include "./db/db.php";

$sql = mysqli_query($db, "SELECT * FROM `grade` INNER JOIN `candidate` on grade.candidate_nation_id = candidate.candidate_nation_id");
$tbody = '';

if ($sql) {
    $a = 0;
    $num_rows = mysqli_num_rows($sql);

    if ($num_rows > 0) {

        while ($candidate = mysqli_fetch_assoc($sql)) {
            $a++;
            $tbody .= ' <tr>
            <th>' . $a . '</th>
            <th>' . $candidate['candidate_nation_id'] . '</th>
            <th>' . $candidate['first_name'] . '</th>
            <th>' . $candidate['last_name'] . '</th>
            <th>' . $candidate['dob'] . '</th>
            <th>' . $candidate['phone_number'] . '</th>
            <th>' . $candidate['gender'] . '</th>
            <th>' . $candidate['license_exam_category'] . '</th>
            <th>' . $candidate['obtained_marks'] . '</th>
            <th>' . $candidate['decision'] . '</th>
            <td><a href="./api/candidate/grade.php?id=' . $candidate['candidate_nation_id'] . '">Add-Grade</a></td>
            
        </tr>';
        }
    } else {
        $tbody .= "<tr><td colspan='4'>no record</td></tr>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
    <style>
        table {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <nav>
        <div class="container">
            <div class="nav-wrapper">
                <div class="logo-wrapper">
                    <img class="logo-mobile" src="./logo.png" alt="Workflow" />
                    <img class="logo-desktop" src="./logo.png" alt="Workflow" />
                </div>
                <ul class="nav-links">
                    <li><a href="./home.php">Home</a></li>
                    <li><a href="./candidates.php">Candidates</a></li>
                    <li><a href="./exam.php" class="active">Exam</a></li>
                    <!-- <li><a href="./failed.php">Failed</a></li>
                    <li><a href="./passed.php">Passed</a></li> -->
                    <li><a href="./report.php">Report</a></li>
                </ul>
                <div class="auth-links">
                    <a href="./auth/logout.php" class="btn btn-primary">Sign Out</a>
                </div> 
            </div>
        </div>
    </nav>
    <div class="container">
        <table border="2" class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>candidate National id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>License Category</th>
                    <th>Marks</th>
                    <th>Decision</th>
                    <th colspan="3">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                echo $tbody;
                ?>
            </tbody>
        </table>

    </div>
</body>

</html>