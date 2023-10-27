<!DOCTYPE html>
<html lang="en">


<body>
    <h1>Hello, {{ $nom }}!</h1>
    <p>You've received a new email with the following details:</p>

    <ul>
        <li>Email Address: {{ $emailAddress }}</li>
        <li>Subject: {{ $subject }}</li>
        <li>Video: {{ $video }}</li>
    </ul>

    <p>Thank you for using our service!</p>
</body>

</html>
