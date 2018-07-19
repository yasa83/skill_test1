<?php

    $dsn = 'mysql:dbname=skill_test1;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');

    $title = htmlspecialchars($_POST['title']);
    $date = htmlspecialchars($_POST['date']);
    $date = htmlspecialchars($_POST['detail']);
    

    $id = htmlspecialchars($_POST['id']);

    
    
    // var_dump($hoge, $fuga);die();

    // DBからデータを取得する処理   
    // $var = 'hoge';
    // var_dump("$var", '$var');die();
    // $sql = 'UPDATE `posts` SET `nickname` = "' . $nickname .'", `comment` = "' . $comment . '" WHERE `id` =' . $id;
    //$sql = "UPDATE `posts` SET `nickname` = \"{$nickname}\", `comment` = \"{$comment}\" WHERE `id` = {$id}";
    $sql = 'UPDATE `tasks` SET `title` = ?, `date` = ?, `detail` = ? WHERE `id` = ?';
    //$sql = 'UPDATE `posts` SET `nickname` = :nickname, `comment` = :comment WHERE `id` = :id';
    $data = [$tasks, $date, $$detail, $id];
    $stmt = $dbh->prepare($sql);
    // $stmt->bindValue(':nickname', $nickname);
    // $stmt->bindValue(':comment', $comment);
    // $stmt->bindValue(':id', $id);
    // $stmt->execute();
    $stmt->execute($data);

    $dbh = null;

    header("Location: schedule.php");
    exit();