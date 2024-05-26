<?php
// Step 1: Read the JSON file
$jsonContent = file_get_contents('books.json');

// Step 2: Decode JSON data to PHP array
$phpArray = json_decode($jsonContent, true);

// Check if the conversion was successful
if ($phpArray === null && json_last_error() !== JSON_ERROR_NONE) {
    // Handle error
    echo 'Error decoding JSON: ' . json_last_error_msg();
} else {
    // Step 3: Function to safely convert any value to a string
    function safe_htmlspecialchars($value) {
        if (is_array($value) || is_object($value)) {
            return htmlspecialchars(json_encode($value));
        }
        return htmlspecialchars((string) $value);
    }

    // Step 4: Display the PHP array as an HTML table
    echo '<table border="1">';
    echo '<tr>';
    foreach ($phpArray as $key => $value) {
        echo '<th>' . safe_htmlspecialchars($key) . '</th>';
    }
    echo '</tr>';
    echo '<tr>';
    foreach ($phpArray as $key => $value) {
        echo '<td>' . safe_htmlspecialchars($value) . '</td>';
    }
    echo '</tr>';
    echo '</table>';
}
?>
