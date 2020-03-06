<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="shop.css">
</head>

<body>
    <?php
    $dNone = 'style="display: none;"';
    $dBlock = 'style="display: block;"';
    $redClass = 'red-border';
    $redBorder = 'class="' . $redClass . '"';
    $formStyle = $dBlock;
    $listStyle = $dNone;
    $validation = true;
    $fName = $lName = $eMail = $pwd = $pwdConfirm = $newsletter  = $condStyle = $conditions = '';
    $fNameStyle = $lNameStyle = $eMailStyle = $pwdStyle = $pwdConfirmStyle = 'class="blue-border"';
    if (isset($_POST['submit'])) {
        $fName = filter_var($_POST['f-name'], FILTER_SANITIZE_STRING);
        $lName = filter_var($_POST['l-name'], FILTER_SANITIZE_STRING);
        $eMail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $pwd = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $pwdConfirm = filter_var($_POST['password-confirm'], FILTER_SANITIZE_STRING);
        if (isset($_POST['newsletter'])) {
            $newsletter = $_POST['newsletter'];
        }
        if (isset($_POST['conditions'])) {
            $conditions = $_POST['conditions'];
        }
        if ($fName == '') {
            $fNameStyle = $redBorder;
            $validation = false;
        }
        if ($lName == '') {
            $lNameStyle = $redBorder;
            $validation = false;
        }
        if (strlen($eMail) < 8 || strlen($eMail) > 50 || strpos($eMail, '@') == false) {
            $eMailStyle = $redBorder;
            $validation = false;
        }
        if ($pwd != $pwdConfirm || strlen($pwd) < 8) {
            $pwdStyle = $redBorder;
            $pwdConfirmStyle = $redBorder;
            $validation = false;
        }
        if ($conditions == '') {
            $condStyle = 'style="color: red;"';
            $validation = false;
        }
        if ($validation == true) {
            $formStyle = $dNone;
            $listStyle = $dBlock;
            session_start();
            $_SESSION['id'] = time();
            $_SESSION['username'] = $fName;
            var_dump($_SESSION);
            $file_handler = fopen('session.txt', 'w');
            $session_content = $_SESSION['id'] . "\r\n";
            fwrite($file_handler, 'SessionID:' . $session_content);
            fwrite($file_handler, 'Username:' . ($fName . "\r\n"));
            fwrite($file_handler, 'Email:' . ($eMail . "\r\n"));
            fwrite($file_handler, 'Phone:' . ($lName . "\r\n"));
            fwrite($file_handler, 'Password:' . ($pwd . "\r\n"));
            fclose($file_handler);
        }
    }
    ?>
    <div class="form" <?php echo $formStyle ?>>
        <form action="shop.php" method="POST">
            <input type="text" name="f-name" placeholder="Username ..." <?php echo $fNameStyle ?> value="<?php echo $fName ?>"><br>
            <input type="text" name="email" placeholder="E-mail ..." <?php echo $eMailStyle ?> value="<?php echo $eMail ?>"><br>
            <input type="text" name="l-name" placeholder="Phone ..." <?php echo $lNameStyle ?> value="<?php echo $lName ?>"><br>
            <input type="password" name="password" placeholder="Password ..." <?php echo $pwdStyle ?> value="<?php echo $pwd ?>"><br>
            <input type="password" name="password-confirm" placeholder="Confirm Password ..." <?php echo $pwdConfirmStyle ?> value="<?php echo $pwdConfirm ?>"><br>
            <label for="newsletter">Subscribe to newsletter</label>
            <input type="checkbox" name="newsletter" id="newsletter"><br>
            <label for="conditions" <?php echo $condStyle ?>>I accept the conditions of use of the product</label>
            <input type="checkbox" name="conditions" id="conditions"><br>
            <input type="submit" name="submit" value="Send">
        </form>
    </div>
    <div <?php echo $listStyle ?>>
        <ul>
            <li>Username is : <?php echo $fName ?></li>
            <li>E-mail is : <?php echo $eMail ?></li>
            <li>Phone is : <?php echo $lName ?></li>
            <li>Password is : <?php echo $pwd ?></li>
            <li>Is that person subscribing to the newsletter ? <?php
                                                                if ($newsletter == 'on') {
                                                                    echo 'Yes';
                                                                } else {
                                                                    echo 'No';
                                                                }
                                                                ?></li>
            <li>Is that person accepting the conditions ? <?php
                                                            if ($conditions == 'on') {
                                                                echo 'Yes';
                                                            } else {
                                                                echo 'No';
                                                            }
                                                            ?></li>
            <li><a href="shop.php">Reload page</a></li>
        </ul>
    </div>

</body>

</html>