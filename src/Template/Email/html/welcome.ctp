<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to <?= env("COMPANY_NAME") ?></title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        table {
            border-spacing: 0;
            width: 100%;
        }

        td {
            padding: 20px;
        }

        .email-container {
            background-color: #ffffff;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .email-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .email-header h1 {
            color: #4CAF50;
            font-size: 36px;
            margin: 0;
        }

        .email-body {
            color: #555555;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .email-body p {
            margin: 0 0 10px;
        }

        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            color: #ffffff;
            background-color: #4CAF50;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
        }

        .email-footer {
            text-align: center;
            font-size: 14px;
            color: #888888;
            margin-top: 30px;
        }

        .email-footer a {
            color: #4CAF50;
            text-decoration: none;
        }

        /* Mobile Responsiveness */
        @media screen and (max-width: 600px) {
            .email-container {
                padding: 15px;
            }

            .email-header h1 {
                font-size: 28px;
            }

            .cta-button {
                font-size: 16px;
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td>
                <div class="email-container">
                    <!-- Email Header -->
                    <div class="email-header">
                        <h1>Welcome to <?= env("COMPANY_NAME") ?>!</h1>
                    </div>

                    <!-- Email Body -->
                    <div class="email-body">
                        <p>Hi <?= ucwords($name) ?>,</p>
                        <p>Welcome to <?= env("COMPANY_NAME") ?>! We're excited to have you on board.</p>
                        <p>To get started, here are a few things you can do:</p>
                        <p>Your default password is 123456 you can change that after logging in.</p>
                        <p>We're here to support you every step of the way!</p>
                        <a href="[Onboarding Link]" class="cta-button">Get Started</a>
                    </div>

                    <!-- Email Footer -->
                    <div class="email-footer">
                        <p>If you have any questions, feel free to <a href="mailto:support@yourcompany.com">contact us</a>.</p>
                        <p>&copy; <?= $year ?> <?= env("COMPANY_NAME") ?>. All rights reserved.</p>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
