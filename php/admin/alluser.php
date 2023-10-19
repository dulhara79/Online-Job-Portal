<!DOCTYPE html>
<html>
<head>
    <title>All Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 70%;
            margin: 20px auto;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            border-bottom: 2px solid #ddd;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
            color: blue;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
    include('../config.php');

    $query = "SELECT * FROM users";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die('Error: ' . mysqli_error($con));
    }
    ?>

    <h2>All Users</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Age</th>
            <th>Action</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['Id']}</td>";
            echo "<td>{$row['Username']}</td>";
            echo "<td>{$row['Email']}</td>";
            echo "<td>{$row['Mobile']}</td>";
            echo "<td>{$row['Age']}</td>";
            echo "<td><a href='updateuser.php?id={$row['Id']}'>Update</a> | <a href='deleteuser.php?id={$row['Id']}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>

    </table>

    <?php
    mysqli_close($con);
    ?>
</body>
</html>
