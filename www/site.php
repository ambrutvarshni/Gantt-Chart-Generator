<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Input Form</title>
    <style>
        /* CSS styles */
        body {
            background-color: peachpuff; /* Set background color */
            font-family: Arial, sans-serif; /* Change font style */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Center content vertically */
        }

        .container {
            background-color: lightcyan; /* Set container background color */
            border-radius: 20px; /* Add curved corners */
            padding: 20px; /* Add padding */
            text-align: center; /* Align text in center */
        }

        .title {
            background-color: burlywood; /* Set title background color */
            color: white; /* Set title text color */
            border-top-left-radius: 20px; /* Add curved corners */
            border-top-right-radius: 20px;
            padding: 20px; /* Add padding */
            margin-bottom: 20px;
        }

        .submit-button {
            background-color: lightcyan; /* Set submit button background color */
            color: black; /* Set submit button text color */
            border: none; /* Remove border */
            border-radius: 20px; /* Add curved corners */
            padding: 10px 20px; /* Add padding */
            cursor: pointer; /* Set cursor to pointer */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">
            <h2>Task Input Form</h2>
        </div>
        
        <form method="post" action="process.php">
            <label for="num_tasks">Number of Tasks:</label>
            <input type="number" id="num_tasks" name="num_tasks" min="1" required><br><br>
            
            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>
</body>
</html>
