
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gantt Chart</title>
    <style>
        /* Styles for the Gantt chart container */
        body {
            background-color: #FFDAB9; /* Set background color */
            font-family: Arial, sans-serif; /* Change font style */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .gantt-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 500px; /* Adjust height as needed */
            width: 100%; /* Make it occupy the full width of the page */
            overflow-x: auto; /* Allow horizontal scrolling if content overflows */
        }

        /* Styles for the Gantt chart itself */
        .gantt-table {
    border: 2px solid black; /* Set border color to black */
    border-collapse: collapse;
    width: 100%;
    text-align: center;
    font-size: 14px;
}


        .gantt-table th,
        .gantt-table td {
            border: 2px solid #ddd; /* Increase border thickness */
            padding: 8px;
        }

        .gantt-bar {
            background-color: #00FFFF;
            height: 10px;
        }

        h1 {
            background-color: burlywood; /* Set title background color */
            color: white; /* Set title text color */
            text-align: center; /* Align text in center */
            padding: 20px; /* Add padding */
            border-top-left-radius: 20px; /* Add curved corners */
            border-top-right-radius: 20px;
            margin-bottom: 20px;
            width: 100%;
        }
    </style>
</head>

<body>
    <h1>Gantt Chart</h1>

    <?php
    // Helper function to format date
    function formatDate($date) {
        $date_obj = new DateTime($date);
        return $date_obj->format('m/d/Y');
    }

    // Helper function to calculate duration
    function calculateDuration($start_date, $end_date) {
        $start_obj = new DateTime($start_date);
        $end_obj = new DateTime($end_date);
        $diff = $end_obj->diff($start_obj);
        return $diff->days + 1; // Add 1 day to include the end date
    }

    // Check if form data is submitted using POST method
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['num_tasks'])) {
        $task_names = array();
        $start_dates = array();
        $end_dates = array();

        for ($i = 1; $i <= $_POST['num_tasks']; $i++) {
            $task_names[] = $_POST["task_name_$i"];
            $start_dates[] = $_POST["start_date_$i"];
            $end_dates[] = $_POST["end_date_$i"];
        }

        // Calculate overall start and end dates
        $overall_start_date = min($start_dates);
        $overall_end_date = max($end_dates);
    } else {
        // Handle the case where no data is submitted
        echo "No task data submitted!";
        exit;
    }
    ?>

    <div class="gantt-container">
        <table class="gantt-table">
            <thead>
                <tr>
                    <th>Task Name</th>
                    <th>Start Date</th>
                    <th>Duration (days)</th>
                    <?php
                    // Generate table header with all dates from start to end
                    $current_date = new DateTime($overall_start_date);
                    while ($current_date <= new DateTime($overall_end_date)) {
                        echo "<th>" . $current_date->format('m/d/Y') . "</th>";
                        $current_date->modify('+1 day');
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through each task and generate table rows
                for ($i = 0; $i < count($task_names); $i++) {
                    echo "<tr>";
                    echo "<td>" . $task_names[$i] . "</td>";
                    echo "<td>" . formatDate($start_dates[$i]) . "</td>";
                    echo "<td>" . calculateDuration($start_dates[$i], $end_dates[$i]) . "</td>";

                    // Generate table cells for each date
                    $current_date = new DateTime($overall_start_date);
                    while ($current_date <= new DateTime($overall_end_date)) {
                        $cell_date = $current_date->format('Y-m-d');
                        if ($cell_date >= $start_dates[$i] && $cell_date <= $end_dates[$i]) {
                            echo "<td class='gantt-bar'></td>";
                        } else {
                            echo "<td></td>";
                        }
                        $current_date->modify('+1 day');
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
