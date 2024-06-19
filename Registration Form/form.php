php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $country = htmlspecialchars(trim($_POST['country']));
    $state = htmlspecialchars(trim($_POST['state']));
    $city = htmlspecialchars(trim($_POST['city']));
    $occupation = htmlspecialchars(trim($_POST['occupation']));
    $education = htmlspecialchars(trim($_POST['education']));
    $dream = htmlspecialchars(trim($_POST['dream']));
    $date = htmlspecialchars(trim($_POST['date']));

    if (empty($name) || empty($gender) || empty($country) || empty($state) || empty($city) || empty($occupation) || empty($education) || empty($dream) || empty($date)) {
        echo "All fields are required.";
        exit;
    }

 
    $data = "Name: $name\nGender: $gender\nCountry: $country\nState: $state\nCity: $city\nOccupation: $occupation\nEducational Background: $education\nDream: $dream\nDate: $date\n\n";
    file_put_contents('members.txt', $data, FILE_APPEND | LOCK_EX);

   
    $to = 'admin@twtl.org';
    $subject = 'New TWTL Membership Form Submission';
    $message = $data;
    $headers = "From: webmaster@twtl.org";

    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for your submission!";
    } else {
        echo "There was an error sending your submission.";
    }
}
?>