<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
    <style>
        body {
            background-color: #8C706D;
            font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: #F2E2CE;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h3 {
            color: #402E3A;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #261A1A;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #261A1A;
            color: #F2E2CE;
        }

        input[type="submit"]:hover {
            background-color: #402E3A;
        }
    </style>
</head>
<body>
    <form action="login-process.php" method="post">
        <h3>Employee Login</h3>
        Username: <input type="text" name="form-username" required maxlength="10" minlength="5" pattern="^[a-zA-Z]{5,10}$">
        <br>
        Password: <input type="password" name="form-password" required maxlength="25" pattern="^.{0,25}$">
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
