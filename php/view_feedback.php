<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Feedback</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .action-buttons a {
            display: inline-block;
            margin: 0 5px;
            padding: 8px 12px;
            text-decoration: none;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .edit {
            background-color: #2196F3;
        }

        .delete {
            background-color: #f44336;
        }

        .action-buttons a:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="w3-center">Feedback List</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Feedback</th>
                <th>Suggestions</th>
                <th>Action</th>
            </tr>

            <?php
            require 'config.php';

            $result = mysqli_query($con, "SELECT * FROM poll");

            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['feedback'] . "</td>";
                echo "<td>" . $row['suggestions'] . "</td>";
                echo "<td class='action-buttons'>";
                echo "<a href='edit_feedback.php?id=" . $row['id'] . "' class='edit w3-button w3-blue'>Edit</a>";
                echo "<a href='delete_feedback.php?id=" . $row['id'] . "' class='delete w3-button w3-red'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>

        </table>
    </div>
</body>

</html>
