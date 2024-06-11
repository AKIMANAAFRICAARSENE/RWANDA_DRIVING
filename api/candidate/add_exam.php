<?php
include "../../db/db.php";
$id = $_GET['id'];
$cat = "";
$grade = "";

$gr = mysqli_query($db, "SELECT * FROM `grade` WHERE candidate_nation_id='$id'");

if ($gr) {
    $select = mysqli_query($db, "SELECT * FROM `candidate` WHERE candidate_nation_id='$id'");
    while ($row = mysqli_fetch_array($gr)) {
        $cat = $row["license_exam_category"];
        $grade = $row['obtained_marks'];
    }
} else {
    $select = mysqli_query($db, "SELECT * FROM `grade` INNER JOIN `candidate` on grade.candidate_nation_id = candidate.candidate_nation_id WHERE grade.candidate_nation_id='$id'");
}
while ($row = mysqli_fetch_array($select)) {
    $nationalid = $row['candidate_nation_id'];
    $FirstName = $row['first_name'];
    $LastName = $row['last_name'];
    $Gender = $row['gender'];
    $DOB = $row['dob'];
    $ExamDate = $row['exam_date'];
    $PhoneNumber = $row['phone_number'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add candidate</title>
</head>

<body>
    <a href="List_of_all_candidated.php"><img src="../image/back.png" alt=""></a>
    <div class="candidate">
    <form action="" method="post" style="max-width: 400px; margin: 0; padding: 0 20px;">
    <h2 style="text-align: left;">Update Candidate Grades</h2>
    <label for="candidate_nation_id" style="text-align: left;">National Id:</label><br>
    <input type="number" name="nationalid" value="<?php echo htmlspecialchars($nationalid); ?>" readonly required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>
    <label for="FirstName" style="text-align: left;">First Name:</label><br>
    <input type="text" name="fname" value="<?php echo htmlspecialchars($FirstName); ?>" readonly required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>
    <label for="LastName" style="text-align: left;">Last Name:</label><br>
    <input type="text" name="lname" value="<?php echo htmlspecialchars($LastName); ?>" readonly required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>
    <label for="category" style="text-align: left;">Category:</label><br>
    <select name="category" required style="width: 100%; padding: 8px; margin-bottom: 10px;">
        <option value="">Select Category</option>
        <option value="A" <?php if ($cat == 'A') echo 'selected'; ?>>A category</option>
        <option value="B" <?php if ($cat == 'B') echo 'selected'; ?>>B category</option>
        <option value="C" <?php if ($cat == 'C') echo 'selected'; ?>>C category</option>
        <option value="D" <?php if ($cat == 'D') echo 'selected'; ?>>D category</option>
    </select><br><br>
    <button type="submit" name="submit" style="width: 100%; background-color: #1971c2; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer;">Add Exam</button>
</form>



    </div>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $nationalid = $_POST['nationalid'];
    $category = $_POST['category'];
    $Marks = $_POST['Marks'];
    $id = $_GET['id'];
    if ($Marks >= 12) {
        $decision = "Pass";
    } else {
        $decision = "Failed";
    }
    if ($_GET['id']) {

        $check = mysqli_query($db, "SELECT * FROM `grade` INNER JOIN `candidate` on grade.candidate_nation_id = candidate.candidate_nation_id WHERE grade.candidate_nation_id='$id'");
        if (mysqli_num_rows($check) > 0) {
            $decision = "";
            if ($Marks >= 12) {
                $decision = "Pass";
            } else {
                $decision = "Failed";
            }
            $update = "UPDATE `grade`
			 SET `license_exam_category`='$category',
			 `decision`='$decision'
			 WHERE `candidate_nation_id`='$id'";
            if ($db->query($update)) {
                header("location:../../candidates.php");
            } else {
                echo "error:" . $update . "<br>" . $db->error;
            }
        } else {

            $insert = "INSERT INTO grade(`candidate_nation_id`,`license_exam_category`,`obtained_marks`,`decision`)
            VALUES('$nationalid','$category','$Marks','$decision')";
            if ($db->query($insert)) {
                header("location:../../candidates.php");
            } else {
                echo "error" . $insert . "<br>" . $db->error;
            }
        }
    }
}
?>