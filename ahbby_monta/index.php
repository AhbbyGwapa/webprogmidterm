<?php
session_start();
include "config/database.php";

// Redirect users who are already logged in
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === "admin") {
        header("Location: admin/dashboard.php");
    } else {
        header("Location: student/dashboard.php");
    }
    exit;
}

$error = "";

if (isset($_POST['login'])) {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Prepare the SQL query
    $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("Database query error: " . mysqli_error($conn));
    }

    // Bind username and execute
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['full_name'] = $user['full_name'];
        $_SESSION['role'] = $user['role'];

        mysqli_stmt_close($stmt);

        if ($user['role'] === "admin") {
            header("Location: admin/dashboard.php");
        } else {
            header("Location: student/dashboard.php");
        }
        exit;
    }

    mysqli_stmt_close($stmt);
    $error = "Invalid Username or Password!";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Student Portal</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="login-box">
        <div class="card">
            <div class="card-body p-4">
                <h2 class="text-center">Student Portal</h2>
                <p class="text-center text-muted">
                    Admin and Student Login
                </p>

                <?php if ($error !== "") { ?>
                    <div class="alert alert-danger">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php } ?>

                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control"
                               name="username" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control"
                               name="password" required>
                    </div>

                    <button class="btn btn-primary w-100"
                            type="submit" name="login">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>