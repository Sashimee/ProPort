<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Baskewitsch Alexandre - Portfolio, developer</title>
    <!--OG Tags-->
    <meta property="og:title" content="Alexandre Baskewitsch - Full Stack Developer" />
    <meta property="og:description" content="For the moment HTML - CSS - JS are used. PHP incomming soon(tm). I use this portfolio to display my abilities and to concatenate what I learned at Fit4CodingJobs." />
    <meta property="og:image" content="https://alex.baskewitsch.lu/img/screenshot.png" />
    <!--Font import - 2 for text and 1 for raw code-->
    <link href="https://fonts.googleapis.com/css?family=Fira+Code|Montserrat|Open+Sans&display=swap" rel="stylesheet" />
    <!--Link to main css-->
    <link rel="stylesheet" href="style/main.css" />
    <!--Link to home css-->
    <link rel="stylesheet" href="style/home.css">
    <!--Link to font Awesome free cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>

<body>
    <?php include('/var/www/php_include/menu.php') ?>
    <main>
        <div class="boxwrapper smaller">
            <section class="top image see-through-box"></section>
            <section class="top image see-through-box"></section>
            <section class="mid image see-through-box"></section>
            <section class="low image see-through-box"></section>
            <section class="welcome box">
                <h1>Welcome</h1>
                <p>Be welcomed to my <strong>awesome</strong> portfolio site.</p>
                <div class="actionboxes">
                    <div class="project">
                        <h3>Stay up-to-date</h3>
                        <div class="cntr">
                            <a href="projects/projects.php" class="call-to-action">Latest projects</a>
                        </div>
                    </div>
                    <div class="github">
                        <h3>Take a look behind the scenes</h3>
                        <div class="cntr">
                            <a href="https://github.com/Sashimee" class="call-to-action">Visit my github !</a>
                        </div>
                    </div>

                </div>
            </section>
            <section class="low image see-through-box"></section>
            <section class="mid image see-through-box"></section>
            <section class="top image see-through-box"></section>
            <section class="top image see-through-box"></section>
        </div>
        <div class="boxwrapper">
            <section class="top image see-through-box"></section>
            <section class="top image see-through-box"></section>
            <section class="mid image see-through-box"></section>
            <section class="low image see-through-box"></section>
            <section class="low image see-through-box"></section>
            <section class="low image see-through-box"></section>
            <section class="mid image see-through-box"></section>
            <section class="top image see-through-box"></section>
            <section class="top image see-through-box"></section>
        </div>
    </main>
    <script src="scripts/menu.js"></script>
</body>

</html>