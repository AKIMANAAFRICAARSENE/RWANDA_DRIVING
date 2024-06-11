<?php
include "./db/db.php";
include "./components.php";
include "./auth/session-handler.php";

// $sql = mysqli_query($db, "SELECT * FROM candidate");
$sql = mysqli_query($db, "SELECT * FROM `grade` INNER JOIN `candidate` on grade.candidate_nation_id = candidate.candidate_nation_id WHERE grade.decision='Pass'");

$tbody = '';

if ($sql) {
    $a = 0;
    $num_rows = mysqli_num_rows($sql);

    if($num_rows > 0){

        while($candidate = mysqli_fetch_assoc($sql)){
            $a++;
            $tbody .= ' <tr>
            <th>' . $a . '</th>
            <th>' . $candidate['candidate_nation_id'] . '</th>
            <th>' . $candidate['first_name'] . '</th>
            <th>' . $candidate['last_name'] . '</th>
            <th>' . $candidate['dob'] . '</th>
            <th>' . $candidate['phone_number'] . '</th>
            <th>' . $candidate['gender'] . '</th>
            <th>' . $candidate['exam_date'] . '</th>
            <th>' . $candidate['exam_category'] . '</th>
            <th>' . $candidate['exam_result'] . '</th>
            <th>' . $candidate['decision'] . '</th>
            
        </tr>';
        }
    } else {
        $tbody .= "<tr><td colspan='4'>no record</td></tr>";
    }
}
?>


<?php
// include "./auth/session-handler.php";
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
            <th>' . $candidate['exam_date'] . '</th>
            <th>' . $candidate['license_exam_category'] . '</th>
            <th>' . $candidate['obtained_marks'] . '</th>
            <th>' . $candidate['decision'] . '</th>
            
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
                    <li><a href="./exam.php">Exam</a></li>
                    <li><a href="./report.php" class="active">Report</a></li>
                </ul>
                <div class="auth-links">
                    <a href="./auth/logout.php" class="btn btn-primary">Sign Out</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <table border="2" class="table" id="printTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>candidate National id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Exam Date</th>
                    <th>License Category</th>
                    <th>Marks</th>
                    <th>Decision</th>
                </tr>
            </thead>
            <tbody>
                <?php
                echo $tbody;
                ?>
            </tbody>
        </table>
        <button onclick="printTable()" class="btn btn-primary">Print Table</button>
    </div>
    <script>
        function printTable() {
            var divToPrint = document.getElementById('printTable');
            var newWin = window.open('');
            // newWin.document.write('<html><head><title></title>');
            newWin.document.write('<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">');
            newWin.document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">');
            newWin.document.write('</head><body>');
            newWin.document.write(divToPrint.outerHTML);
            newWin.document.write('</body></html>');
            newWin.document.close();
            newWin.print();
            newWin.close();
        }
    </script>
</body>

</html>
