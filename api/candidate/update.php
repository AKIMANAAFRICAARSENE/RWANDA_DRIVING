<?php
include_once "../../db/db.php";
$id = $_GET['id'];

$sql = mysqli_query($db, "SELECT * FROM candidate WHERE candidate_nation_id = '{$id}' ");
$form = '';
if ($sql == true) {
    $fetch = mysqli_fetch_assoc($sql);

    // Check if the fetched gender is 'male' or 'female' and set the appropriate radio button as checked
    $maleChecked = '';
    $femaleChecked = '';
    if ($fetch['gender'] === 'male') {
        $maleChecked = 'checked';
    } elseif ($fetch['gender'] === 'female') {
        $femaleChecked = 'checked';
    }

    $form = '<form action="" method="POST" class="row g-3">
        <div class="col-md-6">
            <label for="nid" class="form-label">National ID</label>
            <input type="text" name="nid" class="form-control" value="' . $fetch['candidate_nation_id'] . '" disabled>
        </div>
        <div class="col-md-6">
            <label for="fname" class="form-label">First Name</label>
            <input type="text" name="fname" class="form-control" value="' . $fetch['first_name'] . '">
        </div>
        <div class="col-md-6">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" name="lname" class="form-control" value="' . $fetch['last_name'] . '">
        </div>
        <div class="col-md-6">
            <label class="form-label">Gender</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="male" ' . $maleChecked . '>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="female" ' . $femaleChecked . '>
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="dob" class="form-label">Birth Date</label>
            <input type="date" name="dob" class="form-control" value="' . $fetch['dob'] . '">
        </div>
        <div class="col-md-6">
            <label for="exam_date" class="form-label">Exam Date</label>
            <input type="date" name="exam_date" class="form-control" value="' . $fetch['exam_date'] . '">
        </div>
        <div class="col-md-6">
            <label for="phone_number" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" value="' . $fetch['phone_number'] . '">
        </div>
        <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary btn btn-primary">Update</button>
        </div>
    </form>';

} else {
    echo "Not selected";
}
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $exam_date = $_POST['exam_date'];
    $phone = $_POST['phone'];

    $sql = mysqli_query($db, "UPDATE candidate SET first_name = '$fname', last_name = '$lname', dob = '$dob', exam_date = '$exam_date',gender = '$gender', phone_number = '$phone' WHERE candidate_nation_id = '{$id}'");
    if ($sql == true) {
        header("Location: ../../index.php");
        exit(); // Ensure no further code execution after redirection
    } else {
        echo "record not inserted";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R D L</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <?php echo $form; ?>
    </div>
</body>
</html>

