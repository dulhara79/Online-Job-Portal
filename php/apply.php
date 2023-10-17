<?php
include 'connect.php';

if (isset($_POST ['submit'])) 
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $sex = $_POST['sex'];
    $dob = $_POST['dob'];
    $education = $_POST['education'];
    $cv = $_FILES['cv']['name'];

    $sql = "INSERT INTO job_applications(first_name, last_name,address, sex, dob, education, cv) 
    VALUES ('$first_name','$last_name',' $address',' $sex','$dob','$education','$cv') ";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        echo"sucess" ;
    }
    else{
        die(mysqli_error($con));
    }

}

?>  

<!DOCTYPE html> 
<html>
<head>
    <title>Job Application</title>
    <link rel="stylesheet" type="text/css" href="apply.css">
    

</head> 
<body>
    <div class="container">
            <header>
                <h1>Job Application Form</h1>
            </header>
            
            <form id="applicationForm" method="post" >
                
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" required>

                        
                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" required>
                        
                        <label for="address">Address:</label>
                        <input type="text" name="address" required>
                        
                        <label for="sex">Sex:</label>
                        <select name="sex">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        
                        <label for="dob">Date of Birth:</label>
                        <input type="date" name="dob" required>
                        
                        <label for="education">Highest Education Level:</label>
                        <input type="text" name="education" required>
                       
                        
                        <label for="cv">Upload CV:</label>
                        <input type="file" name="cv" accept=".pdf, .doc, .docx">
                        
                        <a href="display.php"><button type="submit" class="subbtn" name="submit">Submit</button></a>


                    </form>
                    
        </div>
 
    

</body>
</html>
