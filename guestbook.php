<?php
// Read entries from guestbook.txt
$entries = [];
if (file_exists("guestbook.txt")) {
    $entries = file("guestbook.txt", FILE_IGNORE_NEW_LINES);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
    <style>
        body {
            font-family: Verdana, Tahoma, Arial, sans-serif;
            background-color: #eab4b4;
            margin: 0;
            padding: 0;
            cursor: url('resources/CURSOR/windows98.cur'), auto;
        }

        #header {
            background: #990000;
            color: white;
            padding: 10px 15px;
            text-align: left;
            font-size: 18px;
        }

        #navigation {
            background-color: #f2b2b2;
            padding: 10px;
            border-bottom: 2px solid #990000;
        }

        #navigation a {
            text-decoration: none;
            color: #990000;
            margin-right: 15px;
            font-weight: bold;
        }

        #navigation a:hover {
            text-decoration: underline;
        }

        #content {
            padding: 20px;
            box-sizing: border-box;
            background: rgba(230, 180, 180, 0.9);
            margin: 20px auto;
            width: 80%;
            border: 1px solid #990000;
            border-radius: 5px;
        }

        #guestbook-form {
            margin-bottom: 20px;
        }

        #guestbook-form label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        #guestbook-form input,
        #guestbook-form textarea {
            width: 100%;
            padding: 5px;
            border: 1px solid #990000;
            border-radius: 3px;
            background-color: #f2b2b2;
            color: #6d0000;
        }

        #guestbook-form button {
            margin-top: 10px;
            padding: 5px 10px;
            background: linear-gradient(to bottom, #990000, #6d0000);
            color: white;
            border: none;
            border-radius: 2px;
            cursor: pointer;
        }

        #guestbook-form button:hover {
            background: #6d0000;
        }

        #entries {
            margin-top: 20px;
        }

        .entry {
            border-bottom: 1px solid #990000;
            padding: 10px 0;
        }

        .entry:last-child {
            border-bottom: none;
        }

        .entry h4 {
            margin: 0 0 5px;
            color: #990000;
        }

        .entry p {
            margin: 0;
        }

        #footer {
            background: #f2b2b2;
            color: #6d0000;
            text-align: center;
            padding: 10px 0;
            border-top: 2px solid #990000;
        }
    </style>
</head>
<body>
    <div id="header">that-saiyan's Guestbook</div>
    <div id="navigation">
        <a href="index.html">Home</a>
        <a href="guestbook.php">Guestbook</a>
        <a href="about.html">About</a>
        <a href="#">Other</a>
    </div>
    <div id="content">
        <h2>Sign the Guestbook</h2>
        <form id="guestbook-form" action="submit.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Submit</button>
        </form>
        <div id="entries">
            <h3>Guestbook Entries</h3>
            <?php
            // Display all entries from guestbook.txt
            if (count($entries) > 0) {
                foreach ($entries as $entry) {
                    echo "<div class='entry'><p>$entry</p></div>";
                }
            } else {
                echo "<p>No entries yet.</p>";
            }
            ?>
        </div>
    </div>
    <div id="footer">© 2004-<span id="current-year"></span> That-Saiyan Softworks. All rights reserved.</div>
    <script>
        document.getElementById('current-year').textContent = new Date().getFullYear();
    </script>
</body>
</html>
