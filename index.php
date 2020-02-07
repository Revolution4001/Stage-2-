<!DOCTYPE html>
<html lang="pl">

    <head>
        <meta charset="utf-8">
        <title>ANDROMEDA SKLEP INTERNETOWY</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="keywords" content="gry, gry komputerowe, wersje cyfrowe, top 10 gier, top gry, buy games, tanie gry,
        cross platform games"/>
        <meta name="description" content="Sklep internetowy z wszystkimi dostępnymi na rynku grami zarówno w wersji pudełkowej jak i elektronicznej.
        Najlepsze okazje cenowe i przeróżne promocje serdecznie zapraszam do zakupów"/>
    </head>


<body>

<?php


    session_start();
    include ('base.php');

    // Add Game if user is logged




    $table = $pdo->query('SELECT * FROM `games`');

    echo '<h1>LIST OF ALL GAMES</h1>';

    if (isset($_SESSION['logged']) && $_SESSION['logged']== true)
    {
        echo '<a href="add.php">ADD GAME</a><br/><br/>';
        echo '<a href="add_user.php">ADD USER</a><br/><br/>';
        echo '<a href="log_out.php">LOG OUT</a><br/><br/>'; // In construction :) next time
    }
    else
    {
        echo '<a href="session.php">LOG IN</a><br/><br/>';
    }


    echo '<table border="1">';

    echo '<tr>';

        echo '<th>Name</th>';
        echo '<th>Producer</th>';
        echo '<th>Publisher</th>';
        echo '<th>Type</th>';
        echo '<th>Platform</th>';
        echo '<th>Price</th>';
        echo '<th>Age_requirements</th>';
        echo '<th>Digital</th>';
        echo '<th>Options</th>';


    echo '</tr>';

    foreach ($table->fetchAll() as $key => $value)
    {
        echo '<tr>';

            echo '<td>'.$value['name'].'</td>';
            echo '<td>'.$value['producer'].'</td>';
            echo '<td>'.$value['publisher'].'</td>';
            echo '<td>'.$value['type'].'</td>';
            echo '<td>'.$value['platform'].'</td>';
            echo '<td>'.$value['price'].'</td>';
            echo '<td>'.$value['age_requirements'].'</td>';
            echo '<td>'.$value['digital'].'</td>';
            echo '<td><a href="del.php?id='.$value['id'].'">DELETE</a> | <a href="add.php?id='.$value['id'].'">EDIT</a></td>';

        echo '</tr>';

    }

    echo  '</table>';


?>


</body>


</html>
