<?php

/* All form fields are automatically passed to the PHP script through the array $HTTP_POST_VARS. */
$email = $POST_['email'];
$subject = $POST_['subject'];
$message = $POST_['message'];

/* PHP form validation: the following lines will check if the information in the input fields is valid. This check uses regular expressions to verify the input data. Have in mind that PHP form validation is performed AFTER the form details have been submitted. It's best if it's used with JavaScript form validation, which is executed in the visitor's browser. */
if (!preg_match("/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/", $email)) {
    echo "<h4>Invalid email address</h4>";
    echo "<a href='javascript:history.back(1);'>Back</a>";
} elseif ($subject == "") {
    echo "<h4>No subject</h4>";
    echo "<a href='javascript:history.back(1);'>Back</a>";
}

/* Sends the mail and outputs the "Thank you" string if the mail is successfully sent, or the error string otherwise. */
elseif (mail($email,$subject,$message)) {
    echo "<h4>Thank you for sending email</h4>";
} else {
    echo "<h4>Can't send email to $email</h4>";
}
?>