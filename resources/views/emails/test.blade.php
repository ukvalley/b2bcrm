<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <p>Dear {{ $name }},</p>
<br>
    <p>Thank you for registering with our platform.</p>
    <p>Your account has been successfully created.</p>
    <?php if (isset($email) && !empty($email)) { ?>
        <p>Email: {{$email}}</p>
    <?php }
    if (isset($password) && !empty($password)) { ?>
        <p>Password: {{$password}}</p>
    <?php } ?>
    <p>We look forward to providing you with a great experience.
    <p>If you have any questions or need assistance, feel free to contact us.</p>
<br>
    <p>Best regards,</p>
    <p>Canada Immigration & Visa Services</p>
</body>

</html>