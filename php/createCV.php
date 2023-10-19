<?php
include "config.php";

if (isset($_POST['submit'])) {
    $cv_id = $_POST['cv_id'];
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $familyname = $_POST['familyname'];
    $email = $_POST['email'];
    $phoneNum = $_POST['phoneNum'];
    $address = $_POST['address'];
    $post_code = $_POST['post-code'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $school = $_POST['school'];
    $uni = $_POST['university'];
    $skills = $_POST['skills'];

    $sql = "INSERT INTO `cv` (cv_id, user_id, name, fam_name, email, contact_num, address, city, post_code, gender, school, uni, skills) 
            VALUES ('$cv_id', '$user_id', '$name', '$familyname', '$email', '$phoneNum', '$address', '$city', '$post_code', '$gender', '$school', '$uni', '$skills')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo '<script>alert("CV created and inserted successfully!");</script>';
    } else {
        die(mysqli_error($con));
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Create a CV</title>
    <link rel="stylesheet" href="../css/admin-style.css">
    <script src="../js/admin-script.js"></script>
    <style>
        label {
            display: block;
            margin-top: 10px;
        }

        form {
            width: 50%;
            margin: 0 auto;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h1>Create CV</h1>
    <img class="admin-logo" src="../images/logo.jpg" alt="LOGO" onclick="reloadpage();">
    <div class="nav-bar-div">
        <ul>
            <li><a class="active" href="dashboard.php">DashBoard</a></li>
            <li><a href="admin-reg-user.php">Register Users</a></li>
            <li><a href="admin-reg-company.php">Register company</a></li>
            <li><a href="feedback-Admin.php">Feedback</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#about">Log in</a></li>
            <li><a href="#about">Sign up</a></li>
        </ul>
    </div>
    <fieldset>
        <legend><h2>Create CV</h2></legend>
        <form action="" method="POST">

            <fieldset>
                <legend>Personal details</legend>
                <label for="Name" class="cv-label">CV ID</label>
                <input type="text" name="cv_id" class="input-cv-data"><br>

                <label for="Name" class="cv-label">USER ID</label>
                <input type="text" name="user_id" class="input-cv-data"><br>

                <label for="Name" class="cv-label">Name</label>
                <input type="text" name="name" class="input-cv-data"><br>

                <label for="family-name" class="cv-label">Family name</label>
                <input type="text" name="familyname" class="input-cv-data"><br>
                
                <label for="email" class="cv-label">Email Address</label>
                <input type="email" name="email" class="input-cv-data"><br>

                <label for="phoneNum" class="cv-label">Contact Number</label>
                <input type="text" name="phoneNum" class="input-cv-data"><br>

                <label for="address" class="cv-label">Address</label>
                <textarea name="address"id="address-cv" class="input-cv-data" cols="100" rows="5"></textarea>

                <label for="Post-code" class="cv-label">Post code</label>
                <input type="text" name="post-code" class="input-cv-data"><br>

                <label for="city" class="cv-label">City</label>
                <input type="text" name="city" class="input-cv-data"><br>

                <label for="gender" class="cv-label">Gender</label>
                <label for="gender" class="cv-label">Male</label>
                <input type="radio" name="gender" class="input-cv-data" value="Male">
                <label for="gender" class="cv-label">Female</label>
                <input type="radio" name="gender" class="input-cv-data" value="Female"><br>

                <!-- Other input fields for personal details -->

            </fieldset>

            <fieldset>
                <legend>Education</legend>
                <label for="school" class="cv-label">School</label>
                <textarea name="school" id="school-id" cols="100" rows="10"></textarea><br>

                <label for="university" class="cv-label">University</label>
                <textarea name="university" id="university-id" cols="100" rows="10"></textarea><br>
            </fieldset>

            <fieldset>
                <legend>Skills</legend>
                <label for="skills" class="cv-label">Skills</label>
                <textarea name="skills" id="skills-id" cols="100" rows="10"></textarea><br>
            </fieldset>

            <input type="submit" class="submit-btn" value="Submit" name="submit">
        </form>
    </fieldset>
</body>

</html>
