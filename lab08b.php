<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #4285f4;
            color: #ffffff;
        }

        table.multiplication-table {
            width: 80%;
            margin: 50px auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ffffff;
        }

        th.yellow-cell, td.yellow-cell {
            background-color: #f4b400;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
        }
    </style>

    <title>PP - Lab 8b</title>
</head>
<body>

<?php
    // Validate and get input values
    if (!empty($_POST['num1']) && !empty($_POST['num2'])) {
        $num1 = intval($_POST['num1']);
        $num2 = intval($_POST['num2']);

        // Validate the input numbers
        if ($num1 >= 3 && $num1 <= 12 && $num2 >= 3 && $num2 <= 12) {
            // Generate multiplication table
            echo "<h2>Multiplication Table ($num1 x $num2)</h2>";
            echo "<table class='multiplication-table'>";

            // Table header
            echo "<tr>";
            echo "<th class='yellow-cell'></th>"; // Empty cell for the top-left corner
            for ($i = 1; $i <= $num2; $i++) {
                echo "<th class='yellow-cell'>$i</th>";
            }
            echo "</tr>";

            // Table body
            for ($i = 1; $i <= $num1; $i++) {
                echo "<tr>";
                echo "<td class='yellow-cell'>$i</td>"; // Leftmost column with yellow background
                for ($j = 1; $j <= $num2; $j++) {
                    echo "<td>" . ($i * $j) . "</td>";
                }
                echo "</tr>";
            }

            echo "</table>";
        } else {
            // Invalid input, display error message
            echo "<h2 style='text-align: center; margin-top: 30px;'>Invalid input! Numbers must be between 3 and 12.</h2>";
            echo "<p style='text-align: center;'><a href='lab08.php'>Go back to the form</a></p>";
        }
    } else {
        // Input not set, display error message
        echo "<h2 style='text-align: center; margin-top: 30px;'>Error! Please enter valid numbers.</h2>";
        echo "<p style='text-align: center;'><a href='lab08.php'>Go back to the form</a></p>";
    }
?>



</body>
</html>
