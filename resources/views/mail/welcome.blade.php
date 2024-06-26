<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Email</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding: 20px;
            background-color: #3b82f6;
            color: #ffffff;
            border-radius: 8px 8px 0 0;
        }

        .content {
            padding: 20px;
        }

        .footer {
            text-align: center;
            padding: 20px;
            background-color: #f9fafb;
            border-radius: 0 0 8px 8px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3b82f6;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1 class="text-2xl font-bold">Welcome to Our Platform!</h1>
        </div>
        <div class="content">
            <p class="text-lg">Hi there,{{ $user->name }}</p>
            <p class="text-lg">We're excited to have you on board. Thank you for joining our platform. We're committed to
                providing you with the best experience possible.</p>
            <p class="text-lg">To get started, please verify your email address by clicking the button below:</p>
            <a href="https://your-verification-link.com" class="button">Verify Email</a>
            <p class="text-lg">If you have any questions, feel free to reply to this email or contact our support team.
            </p>
            <p class="text-lg">Best regards,<br>The Team</p>
        </div>
        <div class="footer">
            <p class="text-sm text-gray-600">&copy; 2024 Your Company. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
