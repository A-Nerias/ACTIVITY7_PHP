<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student = [
        "name" => $_POST["name"],
        "age" => $_POST["age"],
        "gender" => $_POST["gender"],
        "course" => $_POST["course"],
        "campus" => $_POST["campus"]
    ];
if (isset($_POST['edit_index'])) {
        $index = $_POST['edit_index'];
        $_SESSION['entries'][$index] = compact('name', 'age', 'gender', 'campus', 'college');
    } else {
        
        $_SESSION['entries'][] = compact('name', 'age', 'gender', 'campus', 'college');
    }
    
    header('Location: ShowDetails.php');
    exit();


    $_SESSION['students'][] = $student;

    header("Location: ShowDetails.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Student Data Form</title>
    <?php include('../layout/style.php'); ?>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #e0f7fa;
        color: #333;
    }
    .form-card {
        max-width: 600px;
        margin: 50px auto;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    .form-header {
        background: #00acc1;
        color: #fff;
        padding: 20px;
        text-align: center;
    }
    .form-body {
        padding: 30px;
    }
    .form-body label {
        display: block;
        margin-bottom: 5px;
        color: #00acc1;
        font-weight: bold;
    }
    .form-body .form-control {
        width: 100%;
        padding: 8px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .form-footer {
        text-align: center;
        padding: 20px;
    }
    .btn-submit {
        background-color: #00acc1;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }
    .btn-reset {
        background-color: #b0bec5;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        margin-left: 10px;
    }
    .btn-submit:hover {
        background-color: #26c6da;
    }
    .btn-reset:hover {
        background-color: #90a4ae;
    }
    </style>
</head>
<body class="sb-nav-fixed">

    <?php include('../layout/header.php'); ?>

    <div id="layoutSidenav">
        <?php include('../layout/navigation.php'); ?>

        <div id="layoutSidenav_content">
            <main class="d-flex align-items-center justify-content-center">
                
                <div class="form-container">
                    <div class="form-card">
                        <div class="form-header">
                            <h2>Student Data</h2>
                        </div>
                        <div class="form-body">
                            <form action="ShowDetails.php" method="POST">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" required>

                                <label for="age">Age</label>
                                <input type="number" name="age" class="form-control" required>

                                <label for="gender">Gender</label>
                                <select name="gender" class="form-control" required>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                    <option value="Other">Other</option>
                                </select>

                                <label for="course">Course:</label>
                                <select name="course" required class="form-control">
                                    <option value="Bachelor of Science in Information System">Bachelor of Science in Information System</option>
                                    <option value="Bachelor of Science in Tourism Management">Bachelor of Science in Tourism Management</option>
                                    <option value="Bachelor of Science in Elementary Education">Bachelor of Science in Elementary Education</option>
                                    <option value="Bachelor of Political Science">Bachelor of Political Science</option>
                                    <option value="Bachelor of Science in Accountancy in Information System">Bachelor of Science in Accountancy in Information System</option>
                                </select>

                                <label for="campus">Campus:</label>
                                <select name="campus" required class="form-control">
                                    <option value="Santa Cruz Campus">Santa Cruz Campus</option>
                                    <option value="Torrijos Campus">Torrijos Campus</option>
                                    <option value="Gasan Campus">Gasan Campus</option>
                                    <option value="Boac Campus">Boac Campus</option>
                                </select>
                                <div class="form-footer">
                                    <button type="submit" class="btn-submit">Submit</button>
                                    <button type="reset" class="btn-reset">Clear</button>
                                </div>
                            </form>
                        </div>
                        <a href="ShowDetails.php">View Details</a>
                    </div>
                </div>
            </main>
            <?php include('../layout/footer.php'); ?>
        </div>
    </div>
    <?php include('../layout/script.php'); ?>
</body>
</html>