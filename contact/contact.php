<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Baskewitsch Alexandre - Portfolio, developer</title>
    <!--Font import - 2 for text and 1 for raw code-->
    <link href="https://fonts.googleapis.com/css?family=Fira+Code|Montserrat|Open+Sans&display=swap" rel="stylesheet" />
    <!--Link to font Awesome free cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <!--Link to main css-->
    <link rel="stylesheet" href="/style/main.min.css" />
    <!--Import of contact CSS-->
    <link rel="stylesheet" href="/style/contact.min.css">
</head>

<body>
    <?php
    $dNone = 'style="display: none;"';
    $dBlock = 'style="display: block;"';
    $redClass = 'red-border';
    $redBorder = 'class="' . $redClass . '"';
    $formStyle = '';
    $msgStyle = $dNone;
    $validation = true;
    $fName = $lName = $eMail = $company = $message = $phoneNumber = '';
    $fNameStyle = $lNameStyle = $eMailStyle = $companyStyle = $messageStyle = $phoneStyle = 'class="blue-border"';
    if (isset($_POST['submit'])) {
        $fName = filter_var($_POST['f-name'], FILTER_SANITIZE_STRING);
        $lName = filter_var($_POST['l-name'], FILTER_SANITIZE_STRING);
        $eMail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $company = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
        $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
        $phoneNumber = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
        if ($fName == '') {
            $fNameStyle = $redBorder;
            $validation = false;
        }
        if ($lName == '') {
            $lNameStyle = $redBorder;
            $validation = false;
        }
        if ($message == '') {
            $messageStyle = $redBorder;
            $validation = false;
        }
        if (strlen($eMail) < 8 || strlen($eMail) > 50 || strpos($eMail, '@') == false) {
            $eMailStyle = $redBorder;
            $validation = false;
        }
        if ($validation == true) {
            $toOwner = "alex@baskewitsch.lu";
            $toContact = $eMail;
            $subjectOwner = "New contact : " . $fName . " " . $lName;
            $subjectContact = "Thank you for your message - ABA";
            $messageOwner = "
            <html>
            <head>
            <title>HTML email</title>
            </head>
            <body>
            <h1>Message summary</h1>
            <p>First Name : " . $fName . "</p>
            <p>Last Name : " . $lName . "</p>
            <p>Company : " . $company . "</p>
            <p>Phone : " . $phoneNumber . "</p>
            <p>E-mail : " . $eMail . "</p>
            <p>Message : " . $message . "</p>
            </body>
            </html>
            ";
            $messageContact = "
            <html>
            <head>
            <title>HTML email</title>
            </head>
            <body>
            <p> Dear " . $fName . " " . $lName . ",</p>
            <p>I will get back to you as soon as possible.</p>
            <p>You submitted that you work for : " . $company . "</p>
            <p>You submitted that your phone number is : " . $phoneNumber . "</p>
            <p>Your message was : " . $message . "</p>
            </body>
            </html>
            ";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <alex@baskewitsch.lu>' . "\r\n";
            mail($toOwner, $subjectOwner, $messageOwner, $headers);
            mail($toContact, $subjectContact, $messageContact, $headers);
            $formStyle = $dNone;
            $msgStyle = $dBlock;
        }
    }
    ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/php_include/menu.php'); ?>
    <main>
        <div class="boxwrapper">
            <section class="welcome box">
                <h2>Alexandre <strong>BASKEWITSCH</strong></h2>
                <h3>Full Stack Developer</h3>
                <hr>
                <h1>Contact</h1>
                <div class="form-wrapper" <?php echo $formStyle ?>>
                    <form action="contact.php" method="post">
                        <input type="text" name="f-name" id="f-name" placeholder="First Name ... *" <?php echo $fNameStyle ?> value="<?php echo $fName ?>">
                        <input type="text" name="l-name" id="l-name" placeholder="Last Name ... *" <?php echo $lNameStyle ?> value="<?php echo $lName ?>">
                        <input type="text" name="company" id="company" placeholder="Company ..." <?php echo $companyStyle ?> value="<?php echo $company ?>">
                        <input type="text" name="email" id="email" placeholder="E-mail ... *" <?php echo $eMailStyle ?> value="<?php echo $eMail ?>">
                        <input type="tel" name="phone" id="phone" placeholder="Phone Number ..." <?php echo $phoneStyle ?> value="<?php echo $phoneNumber ?>">
                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Please write your message here ... *" <?php echo $messageStyle ?>><?php echo $message ?></textarea>
                        <p class="required">* = Required</p>
                        <input class="send-btn" type="submit" name="submit" value="Send">
                    </form>
                </div>
                <div <?php echo $msgStyle ?>>
                    <p>Thank you for your request !</p>
                    <p>You will shortly receive a summary of your message per e-mail.</p>
                </div>
                <hr>
                <div class="cntr">
                    <a href="https://github.com/Sashimee"><i class="fab fa-github cntc"></i></a>
                    <a href="https://www.linkedin.com/in/abask/" target="_blank"><i class="fab fa-linkedin-in cntc"></i></a>
                </div>
            </section>
        </div>
    </main>
    <script src="/scripts/menu.js"></script>
</body>

</html>