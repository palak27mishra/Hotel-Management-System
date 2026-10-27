
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Found</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #d9d9d9;
            font-family: Arial, sans-serif;
        }

        .message-box {
            width: 90%;
            max-width: 550px;
            padding: 35px 25px;
            text-align: center;
            background-color: #f2f2f2;
            border: 3px solid #009999;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            overflow-wrap: anywhere;
        }

        h2 {
            color: #006666;
            font-size: 28px;
            margin-top: 0;
        }

        .message {
            font-size: 20px;
            margin: 25px 0;
        }

        .login-link {
            display: inline-block;
            padding: 12px 20px;
            background-color: #009999;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            transition: background-color 0.2s ease;
        }

        .login-link:hover {
            background-color: #006666;
        }

        @media (max-width: 480px) {
            .message-box {
                padding: 25px 15px;
            }

            h2 {
                font-size: 23px;
            }

            .message {
                font-size: 17px;
            }
        }
    </style>
</head>

<body>
    <div class="message-box">
        <h2>Admin Account</h2>

        <?php
            $conn = new mysqli("localhost", "root", "", "iwp");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM temp";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_row($result);

                $sql = "DELETE FROM temp";
                mysqli_query($conn, $sql);

                echo '<p class="message">Your password is: '
                    . htmlspecialchars($row[0], ENT_QUOTES, 'UTF-8')
                    . '</p>';
            } else {
                echo '<p class="message">No account information was found.</p>';
            }

            $conn->close();
        ?>

        <a class="login-link" href="admin_login.php">
            Return to Admin Login
        </a>
    </div>
</body>
</html>
