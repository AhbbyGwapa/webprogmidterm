<?php 
session_start();
include "../config/database.php";

$sql = "SELECT * FROM users WHERE role='student' ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

$studentNo = mysqli_query($conn, "SELECT student_no FROM users WHERE role='student'");
$subjects = mysqli_query($conn, "SELECT id FROM subjects");
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Subjects</title>
        <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"><link href="../assets/css/style.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-dark bg-primary">
            <div class="container">
                <span class="navbar-brand">Student Portal</span>
                <a href="../logout.php" class="btn btn-outline-light btn-sm">Logout</a>
            </div>
        </nav>
        <div class="container py-4"><div class="card mb-4">
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="card-body">
                <h3><?php echo htmlspecialchars($_SESSION['full_name'])?></h3>
                <p class="mb-0"><b>Student No.:</b><?php echo htmlspecialchars($row['student_no']); ?> </p>
                <p class="mb-0"><b>Username:</b> <?php echo htmlspecialchars($row['username']); ?></p>
            </div>
            <?php } ?>
        </div>
        <h3>My Enrolled Subjects</h3>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead><tr><th>Subject Code</th><th>Subject Name</th><th>Units</th></tr></thead>
                    <tbody>
                        <tr>
                            <td>IT101</td>
                            <td>Introduction to Computing</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>IT102</td>
                            <td>Computer Programming 1</td>
                            <td>3</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
