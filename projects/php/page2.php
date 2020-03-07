<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Baskewitsch Alexandre - Portfolio, developer</title>
    <!--Font import - 2 for text and 1 for raw code-->
    <link href="https://fonts.googleapis.com/css?family=Fira+Code|Spartan|Montserrat|Open+Sans&display=swap" rel="stylesheet" />
    <!--Link to main css-->
    <link rel="stylesheet" href="/style/main.min.css" />
    <!--Link to font Awesome free cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <!--Import of contact CSS-->
    <link rel="stylesheet" href="/style/php-project2.min.css">
</head>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/php_include/menu.php'); ?>
    <main>
        <div class="boxwrapper">
            <h1>PHP Input Validation</h1>
            <section class="welcome box">
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
                    }
                }
                ?>
                <div class="form" <?php echo $formStyle ?>>
                    <form action="page2.php" method="POST">
                        <input type="text" name="f-name" placeholder="First Name ..." <?php echo $fNameStyle ?> value="<?php echo $fName ?>"><br>
                        <input type="text" name="l-name" placeholder="Last Name ..." <?php echo $lNameStyle ?> value="<?php echo $lName ?>"><br>
                        <input type="text" name="email" placeholder="E-mail ..." <?php echo $eMailStyle ?> value="<?php echo $eMail ?>"><br>
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
                        <li>First Name is : <?php echo $fName ?></li>
                        <li>Last Name is : <?php echo $lName ?></li>
                        <li>E-mail is : <?php echo $eMail ?></li>
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
                        <li><a href="page2.php">Reload page</a></li>
                    </ul>
                </div>
            </section>
        </div>
    </main>
    <script src="/scripts/menu.js"></script>
</body>

</html>