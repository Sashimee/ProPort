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
    <?php
    // DB settings
    include_once('db.php');
    // Variables
    $email = $taskForm = $formToRender = $taskListRender = $logoutRender = '';
    $validation = true;
    $signInForm = '<div class="sign-in"> 
                        <h2>Connect</h2>
                        <form action="/projects/toodood/index.php" method="post">
                            <input type="text" name="email" id="email" placeholder="Use your e-mail as a login..."><br>
                            <input type="password" name="pwd" id="pwd" placeholder="Password"><br>
                            <input type="submit" name="sign-in" value="Enter">
                            <input type="submit" value="Switch to sign-up" name="to-sign-up">
                         </form>
                    </div>';
    $signUpForm = '<div class="sign-up">
                        <h2>Create account</h2>
                        <form action="/projects/toodood/index.php" method="post">
                            <input type="text" name="email" id="email" placeholder="Use your e-mail as a login..."><br>
                            <input type="password" name="pwd" id="pwd" placeholder="Password"><br>
                            <input type="password" name="pwd-confirm" id="pwd-confirm" placeholder="Confirm Password"><br>
                            <input type="submit" name="sign-up" value="Enter">
                            <input type="submit" value="Switch to sign-in" name="to-sign-in">
                        </form>
                       </div>';
    $addTaskForm = '<form action="/projects/toodood/index.php" method="post">
                            <input type="text" name="newtask">
                            <input type="submit" name="add-task" value="Add">
                        </form>';

    // ! IS USER LOGGED IN ?
    if (isset($_COOKIE['session_id'])) {
        $cookieId = filter_var($_COOKIE['session_id'], FILTER_SANITIZE_EMAIL);
        // Check if cookie id is valid
        $dbConnection = mysqli_connect(DB_SERVER, DB_USER, DB_PWD, DB_NAME);
        $query = "SELECT * FROM user";
        $response = mysqli_query($dbConnection, $query);
        while ($line = mysqli_fetch_assoc($response)) {
            if ($line['session_id'] === $cookieId) {
                $formToRender = $addTaskForm;
                session_id($cookieId);
                // Retrieve tasklist
                $queryTaskList = "SELECT task.task_title, task.task_text, task.id FROM ((task INNER JOIN task_list ON task.id=task_list.task_id) INNER JOIN user ON task_list.user_id=user.id) WHERE user.session_id='" . session_id() . "'";
                $taskList = mysqli_query($dbConnection, $queryTaskList);
                while ($line = mysqli_fetch_assoc($taskList)) {
                    $taskListRender .= '<form action="/projects/toodood/index.php" method="post">';
                    $taskListRender .= '<input type="text" name="to-delete" value="' . $line['id'] . '"  style="display:none;">';
                    $taskListRender .= '<label>' .  $line['task_title'] . '</label>';
                    $taskListRender .= '<input type="submit" name="delete-task" value="Done"></form>';
                }
                $logoutRender = '<br><form action="/projects/toodood/index.php" method="post">
                                         <input type="submit" name="logout" value="logout">
                                     </form>';
            }
        }
        mysqli_close($dbConnection);
        if (isset($_POST['add-task'])) {
            $taskToAdd = filter_var($_POST['newtask'], FILTER_SANITIZE_STRING);
            $dbConnection = mysqli_connect(DB_SERVER, DB_USER, DB_PWD, DB_NAME);
            $query = "INSERT INTO task(task_title) VALUES ('" . $taskToAdd . "')";
            $newResult = mysqli_query($dbConnection, $query);
            $newTaskId = mysqli_insert_id($dbConnection);
            $userIDquery = "SELECT id FROM user WHERE session_id='" . $cookieId . "'";
            $idQueryResult = mysqli_query($dbConnection, $userIDquery);
            $newUserID = '';
            while ($line = mysqli_fetch_assoc($idQueryResult)) {
                $newUserID = $line['id'];
            }
            $taskLinkquery = "INSERT INTO task_list(task_id, user_id) VALUES ('" . $newTaskId . "','" . $newUserID . "')";
            mysqli_query($dbConnection, $taskLinkquery);
            mysqli_close($dbConnection);
            header("Refresh:0");
        }
        if (isset($_POST['delete-task'])) {
            $dbConnection = mysqli_connect(DB_SERVER, DB_USER, DB_PWD, DB_NAME);
            $query = "DELETE FROM task WHERE id='" . $_POST['to-delete'] . "'";
            mysqli_query($dbConnection, $query);
            mysqli_close($dbConnection);
            header("Refresh:0");
        }
        if (isset($_POST['logout'])) {
            $dbConnection = mysqli_connect(DB_SERVER, DB_USER, DB_PWD, DB_NAME);
            $query = "UPDATE user SET session_id='' WHERE session_id='" . $cookieId . "'";
            $response = mysqli_query($dbConnection, $query);
            mysqli_close($dbConnection);
            setcookie('session_id', '', time() - 3600);
            session_unset();
            session_destroy();
            header("Refresh:0");
        }
    } else {
        if (isset($_POST['sign-up'])) {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $pwd = filter_var($_POST['pwd'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pwdConfirm = filter_var($_POST['pwd-confirm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if (strlen($email) < 8 || strlen($email) > 50 || strpos($email, '@') == false) {
                $validation = false;
            }
            if ($pwd != $pwdConfirm) {
                $validation = false;
            }
            if ($validation == true) {
                $pwdHash = password_hash($pwd, PASSWORD_BCRYPT);
                $dbConnection = mysqli_connect(DB_SERVER, DB_USER, DB_PWD, DB_NAME);
                $query = "SELECT email FROM user";
                $queryAllUsers = mysqli_query($dbConnection, $query);
                $duplicate = false;
                while ($line = mysqli_fetch_assoc($queryAllUsers)) {
                    if ($line['email'] == $email) {
                        $duplicate = true;
                    }
                }
                if (!$duplicate) {
                    $query = "INSERT INTO user(email, pwd) VALUES ('" . $email . "','" . $pwdHash . "')";
                    $queryResult = mysqli_query($dbConnection, $query);
                    if ($queryResult) {
                        // ! Message create account success
                        $formToRender = $signInForm;
                    }
                }
                mysqli_close($dbConnection);
                // ! INSERT CODE TO NO DUPLICATE MAIL
            }
        } elseif (isset($_POST['sign-in'])) {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $pwd = filter_var($_POST['pwd'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $dbConnection = mysqli_connect(DB_SERVER, DB_USER, DB_PWD, DB_NAME);
            $query = "SELECT * FROM user";
            $response = mysqli_query($dbConnection, $query); //SELECT Querry
            $loginResult = "";
            while ($line = mysqli_fetch_assoc($response)) {
                if ($line['email'] === $email && password_verify($pwd, $line['pwd'])) {
                    session_start();
                    setcookie('session_id', session_id(), time() + 60 * 60 * 24 * 7);
                    $loginQuery = "UPDATE user SET session_id='" . session_id() . "' WHERE email='" . $email . "'";
                    $loginResult = mysqli_query($dbConnection, $loginQuery);
                }
            }
            if ($loginResult) {
                header("Refresh:0");
            } else {
                $formToRender = $signInForm;
            }
            mysqli_close($dbConnection);
        } elseif (isset($_POST['to-sign-up'])) {
            $formToRender = $signUpForm;
        } elseif (isset($_POST['to-sign-in'])) {
            $formToRender = $signInForm;
        } else {
            $formToRender = $signInForm;
        }
    }
    ?>
    <main>
        <div class="boxwrapper">
            <h1>TooDooD</h1>
            <section class="welcome box">
                <?php
                echo $formToRender;
                echo $taskListRender;
                echo $logoutRender;
                ?>
            </section>
        </div>
    </main>
    <script src="/scripts/menu.js"></script>
</body>

</html>