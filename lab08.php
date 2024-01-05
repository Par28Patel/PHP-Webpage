<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            position: relative; /* Ensure correct positioning of the counter */
        }

        .container {
            width: 100%;
            box-sizing: border-box;
            padding: 20px;
            height: 500px; /* Adjust the height as needed */
            border: 2px solid black;
        }

        #container1 {
            text-align: center;
            font-size: 60px; /* Adjust the font size as needed */
            position: relative;
            background-repeat: no-repeat; /* Prevent background image from repeating */
            background-size: cover; /* Cover the entire container */
            width: 100%; /* Ensure it takes up the entire width */
            box-sizing: border-box;
            padding: 20px;
            height: 500px; /* Adjust the height as needed */
            border: 2px solid black;
        }

        #container2 {
            text-align: center;
            background-color: #f4b400;
        }

        #container2 form {
            display: inline-block;
            background-color: #4285f4; /* Blue background color */
            padding: 40px; /* Increased padding */
            border-radius: 8px;
            color: #ffffff; /* White text color */
            margin: 20px; /* Increased margin */
            text-align: left; /* Align text to the left for better readability */
        }

        #container2 form label {
            display: block;
            margin-bottom: 10px; /* Adjust as needed */
            font-size: 24px;
        }

        #container2 form input {
            width: 100%; /* Make input fields take full width */
            box-sizing: border-box;
            margin-bottom: 20px; /* Increased margin-bottom for input fields */
            padding: 10px; /* Increased padding for input fields */
            font-size: 24px;
        }

        #container2 form button {
            background-color: #f4b400; /* Yellow background color */
            color: #000000; /* Black text color */
            padding: 15px 25px; /* Increased padding for the button */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 24px;
        }

        #hitCounter {
            font-size: 18px; /* Adjust the font size as needed */
            opacity: 0.85; /* Adjust the opacity as needed */
            position: fixed;
            bottom: 10px;
            right: 10px;
            background-color: #4285f4;
            color: #ffffff;
            padding: 5px;
            border-radius: 5px;
        }

        #halloweenImage {
            position: fixed;
            top: 10px;
            right: 10px;
            max-width: 150px; /* Adjust the max-width as needed */
            opacity: 0.8; /* Adjust the opacity as needed */
        }

        #container3 {
            background-color: #2d2d2d; /* Dark background color for Halloween theme */
            color: #ff9900; /* Orange text color for Halloween theme */
        }
    </style>
    
    <title>PP - Lab 8</title>
</head>
<body>

    <?php
        // Get the current hour
        $currentHour = date("G");

        if ($currentHour >= 5 && $currentHour < 12) {
            $TODImage = "morningP.jpg";
            $TODMessage = "Good morning";
            $fontColor = "red"; // Adjust the color for morning
        } elseif ($currentHour >= 12 && $currentHour < 18) {
            $TODImage = "afternoonP.jpg";
            $TODMessage = "Good afternoon";
            $fontColor = "purple"; // Adjust the color for afternoon
        } elseif ($currentHour >= 18 && $currentHour < 21) {
            $TODImage = "eveningP.jpg";
            $TODMessage = "Good evening";
            $fontColor = "blue"; // Adjust the color for evening
        } else {
            $TODImage = "nightP.jpg";
            $TODMessage = "Goodnight";
            $fontColor = "yellow"; // Adjust the color for night
        }

        // Cookie hit counter
        $counter = 0;

        if (isset($_COOKIE['hit_counter'])) {
            $counter = intval($_COOKIE['hit_counter']);
        }

        // Increment the counter and set the cookie
        $counter++;
        setcookie('hit_counter', $counter, time() + 24 * 3600); // Expire in 24 hours

        // Halloween image
        $halloweenImage = isset($_GET['image']) ? $_GET['image'] : null;
    ?>

    <div id="container1" class="container" style="background-image: url('<?php echo $TODImage; ?>'); color: <?php echo $fontColor; ?>;">
        <!-- Display the greeting on top of the background image -->
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <?php echo $TODMessage; ?>
        </div>
    </div>

    <div id="container2" class="container">
        <h1>Multiplication table generator</h1>
        <form action="lab08b.php" method="post">
            <label for="num1">Enter first number (3-12):</label>
            <input type="number" name="num1" id="num1">

            <label for="num2">Enter second number (3-12):</label>
            <input type="number" name="num2" id="num2">

            <button type="submit">Create Table</button>
        </form>
    </div>

    <!-- New div for hit counter -->
    <div id="hitCounter">
        <!-- Display hit counter -->
        <p>Counter: <?php echo $counter; ?></p>
    </div>

    <!-- Halloween image -->
    <?php if ($halloweenImage): ?>
        <img id="halloweenImage" src="<?php echo $halloweenImage; ?>" alt="Halloween Image">
    <?php endif; ?>

    <!-- Container 3 with Halloween theme -->
    <div id="container3" class="container">
        <h1>Halloween images</h1>

        <h2>Paste one of the following at the end of the link of this page for a fun halloween gif</h2>
        <p>For a ghoul: ?image=ghoul.gif</p>
        <p>For a mummy: ?image=mummy1.gif</p>
        <p>For a monster: ?image=monster.gif</p>
        <br>
        <br>
        <?php
            // Map the provided image names to actual file names
            $imageMap = [
                'ghoul.gif' => 'ghoul.gif',
                'mummy1.gif' => 'mummy1.gif',
                'monster.gif' => 'monster.gif',
            ];

            // Check if a valid Halloween image is specified
            if (array_key_exists($halloweenImage, $imageMap)) {
                $currentImage = $imageMap[$halloweenImage];
            } else {
                $currentImage = "no-image"; // Default text if no image is specified
            }
        ?>

        <!-- Display the current Halloween image -->
        <p>Current Halloween image on webpage: <?php echo $currentImage; ?></p>
    </div>
</body>
</html>
