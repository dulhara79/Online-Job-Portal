
<?php
include 'connect.php'
?>



<!DOCTYPE html>
<html>
<head>
    <title>Job Portal - Apply Jobs</title>
    <link rel="stylesheet" type="text/css" href="savedjobs.css">
</head>
<body>
    <header>
        <h1>Saved Jobs</h1>
    </header>
    <div class="job-listing">
    <h2>Web Developer</h2>
    <p>Company: Tech Solutions Inc.</p>
    <p>Location:Kandy</p>
    <p>Salary: $80,000 per year</p>
    <p>Description: We are looking for a skilled web developer to join our team and work on exciting projects.</p>
    <a class="apply-button" href="apply.php">Apply Now</a>
    <a class="unsave-button" href="#" onclick="deleteJob(1)">Unsave Job</a>
</div>

<div class="job-listing">
    <h2>Software Engineer</h2>
    <p>Company: Software Innovations Ltd.</p>
    <p>Location: New York, NY</p>
    <p>Salary: $75,000 per year</p>
    <p>Description: Join our dynamic team of software engineers and work on cutting-edge software solutions.</p>
    <a class="apply-button" href="apply.php">Apply Now</a>
    <a class="unsave-button" href="#" onclick="deleteJob(2)">Unsave Job</a>
</div>

<div class="job-listing">
    <h2>Registered Nurse</h2>
    <p>Company: City Hospital</p>
    <p>Location: Los Angeles, CA</p>
    <p>Salary: $60,000 per year</p>
    <p>Description: City Hospital is seeking a compassionate and dedicated registered nurse to join our team.</p>
    <a class="apply-button" href="apply.php">Apply Now</a>
    <a class="unsave-button" href="#" onclick="deleteJob(3)">Unsave Job</a>
</div>

<div class="job-listing">
    <h2>Marketing Specialist</h2>
    <p>Company: Marketing Pro LLC</p>
    <p>Location: Mumbai</p>
    <p>Salary: $70,000 per year</p>
    <p>Description: Join our marketing team and drive innovative campaigns to promote our products and services.</p>
    <a class="apply-button" href="apply.php">Apply Now</a>
    <a class="unsave-button" href="#" onclick="deleteJob(4)">Unsave Job</a>
</div>

<div class="job-listing">
    <h2>Data Analyst</h2>
    <p>Company: Data Insights Corp</p>
    <p>Location: Colombo</p>
    <p>Salary: $65,000 per year</p>
    <p>Description: We are seeking a data analyst to analyze and extract insights from complex datasets.</p>
    <a class="apply-button" href="apply.php">Apply Now</a>
    <a class="unsave-button" href="#" onclick="deleteJob(5)">Unsave Job</a>
</div>

<footer>
<div class="footer-bottom">
    
      <p>&copy; 2023 JOBS.lk | Designed by JOBS.lk</p>
    </div>
    </footer>
    </body>
</html>
