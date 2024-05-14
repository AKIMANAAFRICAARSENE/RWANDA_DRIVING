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
        <form action="" method="post">
            <h2>Update Candidate Grades</h2>
            <label for="candidate_nation_id">National Id :</label><br>
            <input type="number" name="nationalid" value="<?php echo "$nationalid" ?>" readonly required><br>
            <label for="FirstName">First Name :</label><br>
            <input type="text" name="fname" value="<?php echo "$FirstName" ?>" readonly required><br>
            <label for="LastName">Last Name :</label><br>
            <input type="text" name="lname" value="<?php echo "$LastName" ?>" readonly required><br>
            <label for="category">Category :</label><br>
            <select name="category" id="" required>
                <option value="">Select Category</option>
                <option value="A" <?php if ($cat == 'A') {
                                        echo 'selected';
                                    } else {
                                        echo "";
                                    } ?>>A</option>
                <option value="B" <?php if ($cat == 'B') {
                                        echo 'selected';
                                    } else {
                                        echo "";
                                    } ?>>B</option>
                <option value="C" <?php if ($cat == 'C') {
                                        echo 'selected';
                                    } else {
                                        echo "";
                                    } ?>>C</option>
                <option value="D" <?php if ($cat == 'D') {
                                        echo 'selected';
                                    } else {
                                        echo "";
                                    } ?>>D</option>
                <option value="E" <?php if ($cat == 'E') {
                                        echo 'selected';
                                    } else {
                                        echo "";
                                    } ?>>E</option>
                <option value="F" <?php if ($cat == 'F') {
                                        echo 'selected';
                                    } else {
                                        echo "";
                                    } ?>>F</option>
            </select><br>
            <label for="Marks">Add Marks :</label><br>
            <input type="text" maxlength="3" value="" name="Marks" required><br>
            <button type="submit" name="submit">Add Marks</button>
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
			 `obtained_marks`='$Marks',
			 `decision`='$decision'
			 WHERE `candidate_nation_id`='$id'";
            if ($db->query($update)) {
                header("location:../../exam.php");
            } else {
                echo "error:" . $update . "<br>" . $db->error;
            }
        } else {

            $insert = "INSERT INTO grade(`candidate_nation_id`,`license_exam_category`,`obtained_marks`,`decision`)
			VALUES('$nationalid','$category','$Marks','$decision')";
            if ($db->query($insert)) {
                header("location:../../exam.php");
            } else {
                echo "error" . $insert . "<br>" . $db->error;
            }
        }
    }
}
?>