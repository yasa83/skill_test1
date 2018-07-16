<?php
    //削除する処理
    $dsn = 'mysql:dbname=skill_test1;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');


    $id = $_GET['id'];


    $sql = 'DELETE FROM `tasks` WHERE `id` = ?';
    // $sql = 'DELETE FROM `posts` WHERE `id` = ' . $_GET['id'];
    $data[] = $id;
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);



    $dbh = null;

    // リダイレクト 元のページに戻る処理
    header("Location: schedule.php");
    exit();

//htmlが後に続かないときは閉じtagがいらない