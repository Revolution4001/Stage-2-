<?php


require_once('session.php');

    if (isset($_POST['login'])&&isset($_POST['pass']))
    {
        $sth = $pdo->prepare('INSERT INTO `users`(`login`, `pass`) VALUES (:login,:pass)');
        $sth->bindParam(':login',$_POST['login'],PDO::PARAM_STR);
        $sth->bindParam(':pass', md5($_POST['pass']),PDO::PARAM_STR);
        $sth->execute();

        header('Location: index.php');
    }



?>


<form action="add_user.php" method="post">
    ADD NEW USER: <br/><br/>
    LOGIN:  <input type="text" name="login"><br/><br/>
    PASS:   <input type="password" name="pass"><br/><br/>
    <input type="submit" value="Add User">

</form>
