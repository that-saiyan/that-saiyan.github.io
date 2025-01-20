<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['name']) && !empty($_POST['message'])) {
        // Get and sanitize the inputs
        $name = htmlspecialchars($_POST['name']);
        $message = htmlspecialchars($_POST['message']);
        $timestamp = date("Y-m-d H:i:s");

        // Format the entry
        $entry = $timestamp . " - " . $name . ":\n" . $message . "\n\n";

        // Append the entry to the guestbook.txt file
        file_put_contents("guestbook.txt", $entry, FILE_APPEND);

        // Redirect back to the guestbook page
        header("Location: guestbook.php");
        exit();
    } else {
        echo "Please fill in all fields.";
    }
}
?>
