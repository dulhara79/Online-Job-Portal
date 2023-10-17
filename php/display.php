<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="display.css">
    <title>Display Data</title>
</head>
<body>

<table class="table">
    <thead>
        <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Address</th>
            <th scope="col">Gender</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Education Level</th>
            <th scope="col">Operation</th>
        </tr>
    </thead>
    <tbody>

    <?php
    include 'connect.php';

    $sql = "select * from `job_applications`";
    $result = mysqli_query($con, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $address = $row['address'];
            $sex = $row['sex'];
            $dob = $row['dob'];
            $education = $row['education'];

            echo  '<tr>
                <th scope="row">'. $first_name .'</th>
                <td>'.$last_name .'</td>
                <td>'.$address .'</td>
                <td>'.$sex .'</td>
                <td>'.$dob .'</td>
                <td>'.$education .'</td>
                <td>
                    <button class="button-with"><a href="Update.php?updateid=' . $first_name . '">UPDATE</a></button><br>
                    <button class="button-with-link"><a href="delete.php?deleteid=' . $first_name . '">DELETE</a></button>
                </td>
            </tr>';
        }
    }
    ?>

    </tbody>
</table>

<div class="footer-bottom">
      <p>&copy; 2023 JOBS.lk | Designed by JOBS.lk</p>
    </div>
</body>
</html>
