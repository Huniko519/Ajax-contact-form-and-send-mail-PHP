<?php

include 'config.php';
require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
include 'database.php';
$return = new stdClass();
$return->result = true;
$return->message = "true";
if (isset($_POST['submit'])) {
    $path = "";
    $name = "";
    if ($_FILES['file_upload']['name'] != NULL) {
        $path = "uploads/";
        if (!is_dir($path)) {
            mkdir($path);
        }
        $tmp_name = $_FILES['file_upload']['tmp_name'];
        $name = time() . $_FILES['file_upload']['name'];
        // Upload file
        move_uploaded_file($tmp_name, $path . $name);
     }


    $object = new stdClass();
    $object->name = $_POST['name'];
    $object->email = $_POST['email'];
    $object->subject = $_POST['subject'];
    $object->message = $_POST['message'];
    $object->gender = $_POST['gender'];
    $object->file_upload = $path . $name;
    if (!$object->email) {
        $return->result = false;
        $return->message = "Email is required!<br>";
        echo json_encode($return);
        exit;
    }
    //save data to database
    $result = @saveData($object);
    if (!$result) {
        $return->result = false;
    }
    // send mail client
    $result = sendMail(CF_CLIENT_EMAIL_TITLE, $object->email, $object->name, $object, "You've just contacted us with the folowing information:", CF_CLIENT_EMAIL_END_MESSAGE);
    if ($result  !== true) {
        $return->result = false;
        $return->message = "Can not sent email.";
    }
    //send mail admin
    $result = sendMail(CF_ADMIN_EMAIL_TITLE, CF_EMAIL_FROM, CF_EMAIL_FROM_NAME, $object, "New contacting us with the folowing information:");
    if ($result !== true) {
        $return->result = false;
    }
} else {
    $return->result = false;
    $return->message = "No Form Sumited!";
}
if ($return->result) {
    $return->message = "Thank you for contacting us!";
}
echo json_encode($return);
exit;

/**
 * * save data to database
 * */
function saveData($data) {
    $database = new Database();
    $database->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $result = $database->insert('information', $data);
    $database->close();
    return $result;
}

function sendMail($subject, $send_to, $sento_name, $data, $title = "", $message = "") {
    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = CF_HOST;
    $mail->SMTPAuth = true;
    $mail->Username = CF_USERNAME;
    $mail->Password = CF_PASSWORD;
    $mail->SMTPSecure = CF_SECURE;
    $mail->Port = CF_PORT;

    $mail->setFrom(CF_EMAIL_FROM, CF_EMAIL_FROM_NAME);
    $mail->addAddress($send_to, $sento_name);
    $mail->addReplyTo(CF_EMAIL_REPLYTO, CF_EMAIL_REPLYTO_NAME);
    $mail->addCC(CF_EMAIL_CC);
    $mail->addBCC(CF_EMAIL_BCC);
    if ($data->file_upload) {
        $mail->addAttachment($data->file_upload);
    }
    $mail->isHTML(true);

    $mail->Subject = $subject;
    $body = $title . '<br>';
    foreach ($data as $key => $val) {
        if ($key == "file_upload")
            continue;
        $body .='<b>' . ucfirst($key) . "</b>: " . $val . '<br>';
    }
    $body .= $message;
    $mail->Body = $body;

    if (!$mail->send()) {
        return 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        return true;
    }
}
