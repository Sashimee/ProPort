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
    <link rel="stylesheet" href="/style/main.css" />
    <!--Link to font Awesome free cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <!--Import of contact CSS-->
    <link rel="stylesheet" href="/style/contact.css">
</head>

<body>
    <?php
    function isOrder($input) // Check if input is ordered
    {
        $sorted = $input;
        $sorted = sortingAsc($sorted);
        if ($sorted === $input) {
            return 'Already sorted';
        } else {
            return 'This array is not sorted';
        }
    }
    function sortingAsc($arrayToSort) // Sort an array
    {
        for ($i = 0; $i < (count($arrayToSort) - 1); $i++) {
            for ($j = 0; $j < (count($arrayToSort) - 1); $j++) {
                if ($arrayToSort[$j] > $arrayToSort[$j + 1]) {
                    $temporary = $arrayToSort[$j + 1];
                    $arrayToSort[$i + 1] = $arrayToSort[$i];
                    $arrayToSort[$i] = $temporary;
                }
            }
        }
        return $arrayToSort;
    }

    $toSort = ""; //"" so that it is empty if nothing was submitted
    if (isset($_POST['submit'])) {
        $toSort = $_POST['to-sort'];
    }
    ?>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/php_include/menu.php');
    ?>
    <main>
        <div class="boxwrapper smaller">
            <section class="welcome box">
                <form action="page1.php" method="post">
                    <label for="to-sort">Please input your numbers here : (comma separated)</label><br>
                    <input type="text" name="to-sort" placeholder="1, 2, 3, ..." value="<?php echo $toSort ?>"><br>
                    <input type="submit" name="submit" value="Test">
                </form>
                <?php
                if (isset($_POST['submit'])) { // If submit check if the input is ordered
                    $noSpace = str_replace(' ', '', $toSort);
                    $workableArray = explode(',', $noSpace);
                    echo isOrder($workableArray);
                }
                ?>
            </section>
        </div>
        <div class="boxwrapper">

        </div>
    </main>
    <script src="../scripts/menu.js"></script>
</body>

</html>