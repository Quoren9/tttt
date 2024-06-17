<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
    $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
    $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $occupation = filter_input(INPUT_POST, 'occupation', FILTER_SANITIZE_STRING);
    $education = filter_input(INPUT_POST, 'education', FILTER_SANITIZE_STRING);
    $dream = filter_input(INPUT_POST, 'dream', FILTER_SANITIZE_STRING);
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);

    // Validate required fields
    if (empty($name) || empty($gender) || empty($country) || empty($state) || empty($city) || empty($occupation) || empty($education) || empty($dream) || empty($date)) {
        echo "All fields are required.";
        exit;
    }

    // Format the data
    $data = "Name: $name\nGender: $gender\nCountry: $country\nState: $state\nCity: $city\nOccupation: $occupation\nEducational Background: $education\nDream: $dream\nDate: $date\n\n";

    // Append data to the file
    if (file_put_contents('members.txt', $data, FILE_APPEND | LOCK_EX) === false) {
        echo "There was an error saving your submission.";
        exit;
    }

    // Email parameters
    $to = 'admin@twtl.org';
    $subject = 'New TWTL Membership Form Submission';
    $message = $data;
    $headers = [
        'From' => 'webmaster@twtl.org',
        'Reply-To' => 'webmaster@twtl.org',
        'X-Mailer' => 'PHP/' . phpversion()
    ];

    // Send the email
    $headersString = '';
    foreach ($headers as $key => $value) {
        $headersString .= "$key: $value\r\n";
    }

    if (mail($to, $subject, $message, $headersString)) {
        echo "Thank you for your submission!";
    } else {
        echo "There was an error sending your submission.";
    }
}
?>
