<?php
session_start();

// Initialize the students session array if it doesn't exist
if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = [];
}

// Check if form data was submitted and store it in the session
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Add new student details to the students session array
    $_SESSION['students'][] = [
        'name' => htmlspecialchars($_POST['name'] ?? 'Not provided'),
        'age' => htmlspecialchars($_POST['age'] ?? 'Not provided'),
        'gender' => htmlspecialchars($_POST['gender'] ?? 'Not provided'),
        'course' => htmlspecialchars($_POST['course'] ?? 'Not provided'),
        'campus' => htmlspecialchars($_POST['campus'] ?? 'Not provided'),
    ];

    // Redirect to prevent form resubmission on page reload
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Submitted Details</title>
    <?php include('../layout/style.php'); ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa;
            color: #333;
        }
        .container-fluid h1,
        .breadcrumb-item {
            color: #0277bd;
        }
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #d0f0f6;
        }
        .card-header {
            background-color: #b3e5fc;
            color: #0277bd;
        }
        table#datatablesSimple {
            width: 100%;
            background-color: #ffffff;
            color: #333;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }
        table#datatablesSimple th,
        table#datatablesSimple td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table#datatablesSimple th {
            background-color: #81d4fa;
            color: #333;
        }
    </style>
</head>
<body class="sb-nav-fixed">
    <?php include('../layout/header.php'); ?>

    <div id="layoutSidenav">
        <?php include('../layout/navigation.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Show Details</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Show Data</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Student Information Table
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Course</th>
                                        <th>Campus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($_SESSION['students'])) {
                                        foreach ($_SESSION['students'] as $student) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($student['name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($student['age']) . "</td>";
                                            echo "<td>" . htmlspecialchars($student['gender']) . "</td>";
                                            echo "<td>" . htmlspecialchars($student['course']) . "</td>";
                                            echo "<td>" . htmlspecialchars($student['campus']) . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td class='no-data' colspan='5'>No data available.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php include('../layout/footer.php'); ?>
        </div>
    </div>
    <?php include('../layout/script.php'); ?>
</body>
</html>