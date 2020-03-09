<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Baskewitsch Alexandre - Portfolio, developer</title>
    <!--Font import - 2 for text and 1 for raw code-->
    <link href="https://fonts.googleapis.com/css?family=Fira+Code|Montserrat|Open+Sans&display=swap" rel="stylesheet" />
    <!--Link to main css-->
    <link rel="stylesheet" href="/style/main.min.css" />
    <!--Import of blog CSS-->
    <link rel="stylesheet" href="/style/projects.min.css">
    <!--Link to font Awesome free cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>

<body>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/php_include/menu.php'); ?>
    <main>
        <div class="boxwrapper">
            <h1>Projects</h1>
            <section class="welcome box">
                <h2>TooDooD</h2>
                <p>Todo list with account creation. You need to login and you only have access to your own tasks</p>
                <p class="cntr">
                    <a href="/projects/TooDooD/index.php" class="call-to-action">Go</a>
                </p>
            </section>
            <section class="welcome box">
                <h2>PHP Input Validation</h2>
                <p>PHP Implementation of a subscription form.</p>
                <p class="cntr">
                    <a href="/projects/php/page2.php" class="call-to-action">Go</a>
                </p>
            </section>
            <section class="welcome box">
                <h2>Ajax call to a free API</h2>
                <p>Click on the button to see an example of an Ajax call to an API.</p>
                <p class="cntr">
                    <a href="/api-ajax-call-example/ajax.php" class="call-to-action">Go</a>
                </p>
            </section>
            <section class="welcome box">
                <h2>Sorting of an array</h2>
                <p>You can use this page to input a number array and check if it is sorted</p>
                <p class="cntr">
                    <a href="/projects/php/page1.php" class="call-to-action">Go</a>
                </p>
            </section>
        </div>
    </main>
    <script src="/scripts/menu.js"></script>
</body>

</html>