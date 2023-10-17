<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php 
    session_start();
    require 'config.php';
    if (isset($_GET['id'])) {
        $feedbackID = $_GET['id'];
        $result = mysqli_query($con,"SELECT * FROM poll WHERE id=$feedbackID");
        $row = mysqli_fetch_array($result);

        echo "<div class='form-container'>
                <h2>Edit Feedback</h2>
                <form action='update_feedback.php' method='POST'>
                    <div class='form-group'>
                        <label for='name'>Name</label>
                        <input type='text' name='name' id='name' value='".$row['name']."' required>
                    </div>
                    <div class='form-group'>
                        <label for='email'>Email</label>
                        <input type='text' name='email' id='email' value='".$row['email']."' required>
                    </div>
                    <div class='form-group'>
                        <label for='phone'>Phone</label>
                        <input type='text' name='phone' id='phone' value='".$row['phone']."' required>
                    </div>
                    <div class='form-group'>
                        <label for='feedback'>Feedback</label>
                        <input type='text' name='feedback' id='feedback' value='".$row['feedback']."' required>
                    </div>
                    <div class='form-group'>
                        <label for='suggestions'>Suggestions</label>
                        <input type='text' name='suggestions' id='suggestions' value='".$row['suggestions']."' required>
                    </div>
                    <input type='hidden' name='id' value='".$feedbackID."'>
                    <button type='submit'>Update</button>
                </form>
              </div>";
    } else {
        echo "Invalid feedback ID";
    }
    ?>
</body>

</html>
