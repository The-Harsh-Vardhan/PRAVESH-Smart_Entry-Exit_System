<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reason for Leaving</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F2C464; 
            margin: 0;
            padding: 0;
            height: 100vh; 
            display: flex;
            justify-content: center; 
            align-items: center;
        }

        h1 {
            color: #333;
            text-align: center;
            position: relative; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100px; 
            margin: 0; 
        }

        .logo {
            position: absolute;
            right: 20px; 
            top: 10px; 
            height: 50px; 
        }

        .container {
            max-width: 600px;
            width: 100%; 
            background: #eda200; 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        textarea, input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #5cb85c; 
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            display: block; 
            margin: 0 auto; 
        }

        input[type="submit"]:hover {
            background-color: #4cae4c; 
        }

        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>
            Reason for Leaving
            <img src="Logo1.png" alt="Logo" class="logo">
        </h1>
        <?php
        if (isset($_GET['card_uid'])) {
            $uid = htmlspecialchars($_GET['card_uid']); 
            ?>
            <form action="submit_form.php" method="post">
                <input type="hidden" name="uid" value="<?php echo $uid; ?>">
                <label for="reason">Reason for Leaving:</label>
                <textarea id="reason" name="reason" rows="4" cols="50" required></textarea>
                
                <label for="return_time">Expected Return Time (in hr):</label>
                <input type="text" id="return_time" name="return_time" required>
                
                <input type="submit" value="Submit">
            </form>
            <?php
        } else {
            echo "<p class='error'>Error: UID not provided in the URL.</p>";
        }
        ?>
    </div>
</body>
</html>