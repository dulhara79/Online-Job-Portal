<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    <title>Search Jobs</title>  
    <style>
        body {
            background-image: url('C:\Users\user\OneDrive\Desktop\360_F_451832202_e1QKPBz6HJm25BlNZwi0OT1404WGMs1i.jpg'); /* image path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff; /* Text color */
            font-family: Arial, sans-serif; /* Set a default font */
        }

        .container {
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background for better readability */
            padding: 30px;
            border-radius: 10px;
            margin-top: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
        }

        .form-group {
            margin-bottom: 20px;
        }

        label, .btn {
            color: #fff; /* Text color */
        }

        select, input {
            color: #000; /* Text color */
            background-color: #fff; /* Background color */
            border: none; /* Remove default input border */
            border-radius: 5px; /* Add some rounding to the input fields */
            padding: 10px; /* Add some padding to the inputs */
            width: 100%; /* Make inputs fill container width */
        }

        button[type="submit"] {
            width: auto; /* Reset width for the search button */
            padding: 10px 20px; /* Add some padding to the button */
        }

        h1.agile_head {
            font-size: 32px; /* Increase font size for the heading */
            margin-bottom: 30px; /* Add space below the heading */
        }
    </style>
</head>

<body>

    <div class="container">

    <h1 class="agile_head text-center">Search your dream job here...</h1>

        <form method="post" action="search_results.php">
            <div class="form-group">
                <label for="Industry">Industry</label>  
                <select id="Industry" name="Industry" class="form-control">  
                    <option value="IT">Information Technology</option>
                    <option value="Marketing">Marketing and Advertising</option>
                    <option value="Finance">Finance and Accounting</option>
                    <option value="Customer">Customer Service</option>
                    <option value="Health">Healthcare</option>
                    <option value="Education">Education and Training</option>
                    <option value="Freelance">Freelance and Consulting</option>
                    <option value="Sales">Sales</option>
                </select>
            </div>

            <div class="form-group">
                <label for="profession">Profession</label>
                <input type="text" class="form-control" id="profession" placeholder="Enter your preferred job" name="profession" autocomplete="off">
            </div>
            
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" placeholder="Enter location" name="location" autocomplete="off">
            </div>

            <div class="form-group">
                <label for="salary">Salary</label>
                <input type="text" class="form-control" id="salary" placeholder="Enter salary range you wish to have" name="salary" autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary" name="search">Search</button>
        </form>
    </div>

</body>
</html>









