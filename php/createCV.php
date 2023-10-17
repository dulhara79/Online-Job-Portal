<!DOCTYPE html>
<html>
<head>
    <title>Create a CV</title>
    <link rel="stylesheet" href="../css/admin-style.css">
</head>
<body>
    <h1>Create CV</h1>
    <img class="admin-logo" src="logo.jpg" alt="">
    <div class="nav-bar-div">
        <ul>
            <li><a class="active" href="dashboard.php">DashBoard</a></li>
            <li><a href="admin-reg-user.php">Register Users</a></li>
            <li><a href="admin-reg-company.php">Register company</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#about">Log in</a></li>
            <li><a href="#about">Sign up</a></li>
        </ul>
    </div>
    <fieldset>
        <legend>Create CV</legend>
        <form action="cv.php" method="GET"></form>
        <fieldset>
            <legend>Personal details</legend>
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
            </form>
        </fieldset>
        <fieldset>
            <legend>Education</legend>
            <label for="school" class="cv-label">School</label>
            <textarea name="school" id="school-id" cols="100" rows="10"></textarea><br>

            <label for="university" class="cv-label">University</label>
            <textarea name="university" id="university-id" cols="100" rows="10"></textarea><br>
        </form>
        </fieldset>
        <fieldset>
            <legend>Skills</legend>
            <label for="skills" class="cv-label">Skills</label>
            <textarea name="skills" id="skills-id" cols="100" rows="10"></textarea><br>
        </form>
        </fieldset>
    </fieldset>
    <a href="createCV.php?file=createCV.php"><input type="submit" value="Download"></a>
    <?php
        if(!empty($_GET['file'])){
            $filename = basename($_GET['file']);
            $filepath = 'destination/' . $filename;
            if(!empty($filename) && file_exists($filepath)) {
                //define header
                header("Cash-Control: public");                
                header("Content-Description: File-Transfer");                
                header("Content-Desposition: attachment; filename=$filename");                
                header("Content-Type: application/zip");                
                header("Content-Transfer-Emcoding: binary");   
                
                readfile($filepath);
                exit;
            }
            else {
                echo "This file doesnot exist.";
            }
        }
    ?>    
</body>
</html>