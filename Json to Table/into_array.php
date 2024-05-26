<?php
// Read the JSON file
$jsonContent = file_get_contents('books.json');

// Decode JSON data to PHP array
$phpArray = json_decode($jsonContent, true);

// Check if the conversion was successful
if ($phpArray === null && json_last_error() !== JSON_ERROR_NONE) {
    // Handle error
    echo 'Error decoding JSON: ' . json_last_error_msg();
} else {
    // Print the PHP array
    print_r($phpArray);
}
?>
