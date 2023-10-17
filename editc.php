<?php
session_start();

include("php/config.php");

if (!isset($_SESSION['valid_company'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Change Company Profile</title>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php"> Logo</a></p>
        </div>

        <div class="right-links">
            <a href="#">Change Profile</a>
            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php
            if (isset($_POST['update'])) {
                $company_name = $_POST['company_name'];
                $company_email = $_POST['company_email'];
                $company_mobile = $_POST['company_mobile'];

                $id = $_SESSION['company_id'];

                // Validate company mobile number
                if (!preg_match('/^\d{10}$/', $company_mobile)) {
                    echo "<div class='message'>
                              <p>Invalid Mobile Number</p>
                          </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                    die(); // Stop execution
                }

                $edit_query = mysqli_query($con, "UPDATE companies SET CompanyName='$company_name', CompanyEmail='$company_email', CompanyMobile='$company_mobile' WHERE CompanyId=$id ") or die("error occurred");

                if ($edit_query) {
                    echo "<div class='message'>
                            <p>Company Profile Updated!</p>
                          </div> <br>";
                    echo "<a href='home.php'><button class='btn'>Go Home</button>";
                }
            } elseif (isset($_POST['delete'])) {
                $id = $_SESSION['company_id'];
                $delete_query = mysqli_query($con, "DELETE FROM companies WHERE CompanyId=$id") or die("error occurred");

                if ($delete_query) {
                    echo "<div class='message'>
                            <p>Profile deleted successfully!</p>
                          </div> <br>";
                    echo "<script>setTimeout(function(){ window.location.href='index.php'; }, 2000);</script>";
                }
            } else {
                $id = $_SESSION['company_id'];
                $query = mysqli_query($con, "SELECT * FROM companies WHERE CompanyId=$id ");

                while ($result = mysqli_fetch_assoc($query)) {
                    $res_CName = $result['CompanyName'];
                    $res_CEmail = $result['CompanyEmail'];
                    $res_CMobile = $result['CompanyMobile'];
                }
            ?>
                <header>Change Company Profile</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="company_name">Company Name</label>
                        <input type="text" name="company_name" id="company_name" value="<?php echo $res_CName; ?>" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="company_email">Company Email</label>
                        <input type="text" name="company_email" id="company_email" value="<?php echo $res_CEmail; ?>" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="company_mobile">Company Mobile Number</label>
                        <input type="text" name="company_mobile" id="company_mobile" value="<?php echo $res_CMobile; ?>" autocomplete="off" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="update" value="Update" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn btn-danger" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete your profile?')" required>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</body>

</html>
