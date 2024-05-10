<?php
include "./db/db.php";
include "./components.php";

$sql = mysqli_query($db, "SELECT * FROM candidate");
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
            <td><a href="./api/candidate/update.php?id=' . $candidate['candidate_nation_id'] . '">update</a></td>
            <td><a href="./api/candidate/delete.php?id=' . $candidate['candidate_nation_id'] . '">delete</a></td>
            <td><a href="./api/candidate/grade.php?id=' . $candidate['candidate_nation_id'] . '">grade</a></td>
            
        </tr>';
        }
    } else {
        $tbody .= "<tr><td colspan='4'>no record</td></tr>";
    }
}

if (isset($_POST['submit'])) {
    $nid = $_POST['nid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $exam_date = $_POST['exam_date'];
    $phone = $_POST['phone'];

    $sql = mysqli_query($db, "INSERT INTO `candidate` (`candidate_nation_id`, `first_name`, `last_name`, `gender`, `dob`, `exam_date`, `phone_number`) VALUES ('$nid', '$fname', '$lname', '$gender', '$dob', '$exam_date', '$phone')");
    if ($sql = true) {
        header("Location: ./candidates.php");
    } else {
        echo "record not inserted" ;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>R D L</title>
    <style>
    form {
      display: flex;
      flex-direction: column;
      align-items: left;
      margin-left: 10px;
    }
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    select,
    textarea {
      width: 70%;
      padding: 12px;
      margin: 8px 0;
      box-sizing: border-box;
      border: none;
      outline: none;
      border-bottom: 2px solid #ccc;
      font-size: 20px;
      background-color: transparent;
    }
    input[type="date"],
    input[type="time"] {
      width: 70%;
      padding: 12px;
      margin: 8px 0;
      box-sizing: border-box;
      border: none;
      border-bottom: 2px solid #ccc;
      font-size: 20px;
      background-color: transparent;
    }
    button[type="submit"] {
      background-color: #0D6EFD;
      color: white;
      border: none;
      padding: 12px 20px;
      margin-top: 16px;
      cursor: pointer;
      border-radius: 5px;
      width: 15%;
      font-size: 20px;
      margin-left: 200px;
      margin-bottom: 10px;
    }
    button[type="submit"]:hover {
      background-color: #0D5DEA;
    }
    input::placeholder {
      color: black;
      font-size: 20px;
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
                    <li><a href="./candidates.php" class="active">Candidates</a></li>
                    <li><a href="./exam.php">Exam</a></li>
                    <li><a href="./failed.php">Failed</a></li>
                    <li><a href="./passed.php">Passed</a></li>
                    <li><a href="./report.php">Report</a></li>
                </ul>
                <div class="auth-links">
                <a href="./auth/logout.php" class="btn btn-primary">Sign Out</a>
                </div>
            </div>
        </div>
    </nav>
<div class="content">
    <h1>Add Candidate</h1>

    <form action="" method="POST">
        <input type="text" name="nid" placeholder="National ID" required>

        <input type="text" name="fname" placeholder="First Name" required>

        <input type="text" name="lname" placeholder="Last Name" required>

        <div class="col-md-6">
            <label class="form-label">Gender</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="male" ' . $maleChecked . '>
                    <label class="form-check-label" for="male" required>Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="female" ' . $femaleChecked . '>
                    <label class="form-check-label" for="female" required>Female</label>
                </div>
            </div>
        </div>

        <!-- <label>Gender</label>
        <label class="gender-label"><input type="radio" name="gender" value="male" class="form-check-input"> Male</label>
        <label><input type="radio" name="gender" value="female" class="form-check-input"> Female</label> -->

        <input type="date" name="dob"  placeholder="Date Of Birth">

        <input type="date" name="exam_date" placeholder="Exam Date">

        <input type="text" name="phone" placeholder="Phone Number">
        <button type="submit" name="submit">Add</button>
    </form>


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
                    <th>Exam Date</th>
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
</div>

</body>

</html>