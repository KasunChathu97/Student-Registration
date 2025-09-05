<?php
// Database connection
$conn = new mysqli ("localhost", "root", "", "ums12");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize user data to null
$user = null;

// Handle login and fetch user data
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['show_profile'])) {
    $username = $_POST['username'];
    $userpass = $_POST['userpass'];

    // Verify the username and password
    $sql = "SELECT * FROM user_tbl u 
            JOIN login_tbl l ON u.user_email = l.login_email 
            WHERE u.user_email = ? AND l.login_pwd = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("SQL Error in verifying user: " . $conn->error);
    }

    // Hash the password before binding
    $hashedPassword = md5($userpass);
    $stmt->bind_param("ss", $username, $hashedPassword);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Fetch user data into $user variable
        $user = $result->fetch_assoc();
    } else {
        echo "<p style='color: red;'>Invalid username or password.</p>";
    }

    $stmt->close();
}

// Handle profile update
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update'])) {
    $user_id = $_POST['id'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_phone = $_POST['user_phone'];
    $user_nic = $_POST['user_nic'];
    $user_dob = $_POST['user_dob'];
    

    $updateSql = "UPDATE user_tbl SET user_name = ?, user_email = ?, user_phone = ?, user_nic = ?, user_dob = ?  WHERE id = ?";
    $updateStmt = $conn->prepare($updateSql);

    if (!$updateStmt) {
        die("SQL Error in updating profile: " . $conn->error);
    }

    $updateStmt->bind_param("sssssi", $user_name, $user_email, $user_phone, $user_nic, $user_dob, $user_id);

    if ($updateStmt->execute()) {
        echo "<p>Profile updated successfully!</p>";
        header("Refresh:0"); // Refresh the page to show updated data
    } else {
        echo "<p>Error updating profile: " . $updateStmt->error . "</p>";
    }

    $updateStmt->close();
}

// Handle profile deletion
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete'])) {
    $user_id = $_POST['id'];

    $deleteSql = "DELETE FROM user_tbl WHERE id = ?";
    $deleteStmt = $conn->prepare($deleteSql);

    if (!$deleteStmt) {
        die("SQL Error in deleting profile: " . $conn->error);
    }

    $deleteStmt->bind_param("i", $user_id);

    if ($deleteStmt->execute()) {
        echo "<p>Profile deleted successfully!</p>";
        $user = null; // Clear user data after deletion
    } else {
        echo "<p>Error deleting profile: " . $deleteStmt->error . "</p>";
    }

    $deleteStmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-button:hover {
            background-color: #0056b3;
        }
    </style>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 400px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
        input, button { width: 100%; padding: 8px; margin: 10px 0; }
        button { background-color: #4CAF50; color: white; border: none; }
        .form-section { margin-bottom: 40px; }
    </style>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color:rgba(0, 0, 0, 0.4);">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../../../home_1.php">DDA Campus</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-danger" href="../../../home.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php if (!$user): ?>
        <div class="container">
            <div class="card mt-3">
                <div class="card-header">
                    <h2 align="center">View Your Profile</h2>
                </div>
                    <form method="POST">
                        <input type="hidden" name="show_profile" value="1">
                        <label for="username">Username</label>
                        <input type="email" id="username" name="username" placeholder="Enter your email" required>
                        
                        <label for="password">Password</label>
                        <input type="password" id="userpass" name="userpass" placeholder="Enter your password" required>
                        
                        <div class="mt-3 text-end">
                            <button type="submit">Show Your Profile</button>
                        </div>

                        <div class="mt-3 text-end">
                            <a href="../std/manageuser.php" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
            </div>
        </div>
    <?php else: ?>
        <div class="container">
            <div class="card mt-3">
                <div class="card-header">
                    <h2 align="center">View Your Profile</h2>
                </div>
            <form method="POST">
                <input type="hidden" name="update" value="1">
                <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                
                <label for="user_name">Name</label>
                <input type="text" id="user_name" name="user_name" value="<?= htmlspecialchars($user['user_name']) ?>" required>
                
                <label for="user_email">Email</label>
                <input type="email" id="user_email" name="user_email" value="<?= htmlspecialchars($user['user_email']) ?>" required>
                
                <label for="user_phone">Phone</label>
                <input type="text" id="user_phone" name="user_phone" value="<?= htmlspecialchars($user['user_phone']) ?>" required>
                
                <label for="user_nic">NIC</label>
                <input type="text" id="user_nic" name="user_nic" value="<?= htmlspecialchars($user['user_nic']) ?>" required>
                
                <label for="user_dob">Date of Birth</label>
                <input type="date" id="user_dob" name="user_dob" value="<?= htmlspecialchars($user['user_dob']) ?>" required>
                
                <label for="courses">courses</label>
                <input type="text" id="courses" name="courses" value="<?= htmlspecialchars($user['courses']) ?>" disabled>

                <div class="mt-3 text-end">
                    <button type="submit">Save Changes</button>
                </div>

                <div class="mt-3 text-end">
                    <a href="user.php" class="btn btn-secondary">Back</a>
                </div>
            </form>
            

        </div>
    <?php endif; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        
        $('#btnSave').click(function() {
            $.ajax({
                url: "../../route/std/updatecode.php",
                method: "POST",
                data: $('#stdEditForm').serialize(),
                success: function(response) {
                    if (response == 1) {
                        alert("Success! Details updated.");
                        window.location.href = "mangestd.php";
                    } else {
                        alert("Error! Update failed.");
                    }
                }
            });
        });
    </script>
</body>
</html>
