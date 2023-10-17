<?php
require_once "conn.php";

$errorMsg = "";

// Check if company already exists
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $companyName = $_POST["companyName"];
    $checkCompanyQuery = "SELECT * FROM company WHERE name = ?";
    $stmt = mysqli_prepare($conn, $checkCompanyQuery);
    mysqli_stmt_bind_param($stmt, "s", $companyName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $errorMsg = "Company already exists.";
    }
}

// Continue with form processing if no company exists error
if (empty($errorMsg) && $_SERVER["REQUEST_METHOD"] == "POST") {

    // Get data from the form
    $workEmail = $_POST["workEmail"];
    $phoneNumber = $_POST["phoneNumber"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Validate inputs
    if (empty($companyName) || empty($workEmail) || empty($phoneNumber) || empty($password) || empty($confirmPassword)) {
        $errorMsg = "All fields are required.";
    }

    if (!filter_var($workEmail, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Invalid email format.";
    }

    if (!preg_match("/^\+94\d{9}/", $phoneNumber) && !preg_match("/^\d{10}/", $phoneNumber)) {
        $errorMsg = "Invalid phone number format.";
    }

    if ($password !== $confirmPassword) {
        $errorMsg = "Passwords do not match.";
    }

    // Upload logo if provided
    if (isset($_FILES["logo"]) && $_FILES["logo"]["error"] == UPLOAD_ERR_OK) {
        $allowedFormats = ['jpg', 'jpeg', 'png'];
        $maxFileSize = 2 * 1024 * 1024; // 2MB

        $target_dir = "../img/company/";
        $target_file = $target_dir . basename($_FILES["logo"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check file format
        if (!in_array($imageFileType, $allowedFormats)) {
            echo "Invalid file format. Only JPEG/JPG files are allowed.";
            exit;
        }

        // Check file size
        if ($_FILES["logo"]["size"] > $maxFileSize) {
            echo "File size exceeds the limit of 2MB.";
            exit;
        }

        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file)) {
            echo "Success\n File saved at : " . htmlspecialchars($target_file);
        } else {
            echo "Something went wrong. :(";
            exit;
        }
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into the company table
    $insertCompanyQuery = "INSERT INTO company (name, email, phone, pwd_hash, logo) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $insertCompanyQuery);
    mysqli_stmt_bind_param($stmt, "sssss", $companyName, $workEmail, $phoneNumber, $hashedPassword, $target_file);
    mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Registration</title>
    <link rel="stylesheet" href="../css/form.css">
</head>

<body>
    <!-- Display error message if exists -->
    <?php if (!empty($errorMsg)) : ?>
        <p class="error"><?php echo $errorMsg; ?></p>
    <?php endif; ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="companyName">Company Name:</label>
        <input type="text" id="companyName" name="companyName" value="<?php echo isset($companyName) ? htmlspecialchars($companyName) : ''; ?>" required><br>

        <label for="workEmail">Work Email:</label>
        <input type="email" id="workEmail" name="workEmail" value="<?php echo isset($workEmail) ? htmlspecialchars($workEmail) : ''; ?>" required><br>

        <label for="phoneNumber">Phone Number:</label>
        <input type="tel" id="phoneNumber" name="phoneNumber" value="<?php echo isset($phoneNumber) ? htmlspecialchars($phoneNumber) : ''; ?>" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required><br>

        <label for="logo">Company Logo (Optional):</label>
        <input type="file" id="logo" name="logo"><br>

        <input type="submit" value="Register">
    </form>
</body>

</html>
