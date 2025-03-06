<?php
/* Template Name: Maintenance Mode */

if (!current_user_can('administrator')) {
    // Set the header to indicate it's a maintenance page
    header('HTTP/1.1 503 Service Unavailable');
    header('Status: 503 Service Unavailable');
    header('Retry-After: 3600'); // Suggest to check again in 1 hour
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Maintenance Mode</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f3f3f3;
                color: #333;
                text-align: center;
                padding: 50px;
            }
            h1 {
                font-size: 3em;
                margin-bottom: 20px;
            }
            p {
                font-size: 1.2em;
            }
            .message {
                margin-top: 30px;
                padding: 15px;
                background-color: #f1c40f;
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <h1>We are currently performing maintenance</h1>
        <p>Our website is temporarily down for maintenance. Please check back soon.</p>
        <div class="message">
            <p>We apologise for the inconvenience. Thank you for your patience!</p>
        </div>
    </body>
    </html>
<?php
    // Exit after displaying the page
    exit();
}
?>
