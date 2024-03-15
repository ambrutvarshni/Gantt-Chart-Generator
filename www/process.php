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
            background-color: lightpink; /* Set container background color */
            padding: 20px; /* Add padding */
            border-radius: 20px; /* Add curved corners */
            text-align: left; /* Align content in center */
        }
        .submit-button {
            background-color: burlywood; /* Set submit button background color */
            color: white; /* Set submit button text color */
            border: none; /* Remove border */
            border-radius: 20px; /* Add curved corners */
            padding: 10px 20px; /* Add padding */
            cursor: pointer; /* Set cursor to pointer */
            margin-top: 20px; /* Add top margin */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Task Input Form</h2>
        <form method="post" action="generate_chart.php">
            <input type="hidden" name="num_tasks" value="<?php echo htmlspecialchars($_POST['num_tasks']); ?>">
            <?php
            // Generate input fields for task details
            for ($i = 1; $i <= $_POST['num_tasks']; $i++) {
                echo "<label for='task_name_$i'>Task Name $i:</label>";
                echo "<input type='text' id='task_name_$i' name='task_name_$i' required><br>";
                echo "<label for='start_date_$i'>Start Date $i:</label>";
                echo "<input type='date' id='start_date_$i' name='start_date_$i' required><br>";
                echo "<label for='end_date_$i'>End Date $i:</label>";
                echo "<input type='date' id='end_date_$i' name='end_date_$i' required><br>";
            }
            ?>
            <button type="submit" class="submit-button">Generate Gantt Chart</button>
        </form>
    </div>
</body>
</html>
