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
    <link rel="stylesheet" href="../style/main.css" />
    <!--Import of ajax CSS-->
    <link rel="stylesheet" href="../style/ajax.css">
    <!--Link to font Awesome free cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>

<body>
    <?php include('/var/www/php_include/menu.php') ?>
    <main>
        <div class="boxwrapper smaller">
            <h1>Poke-selector</h1>
            <section class="welcome box">
                <h2>Get the name of the attacks of your favourite pokeymon and its picture.</h1>
                    <div class="flexer">
                        <form action="#">
                            <select name="pokemons" id="pokemon-list">
                                <option value="first-select-item">Please choose a pokemon</option>
                            </select>
                            <input type="submit" class="call-to-action" value="Go !">
                        </form>
                        <div>
                            <ul class="pokelist">
                                <li id="li-mockup">Choose a pokemon first</li>
                            </ul>
                        </div>
                    </div>
            </section>
        </div>
    </main>
    <script src="../scripts/menu.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../scripts/ajax.js"></script>
</body>

</html>