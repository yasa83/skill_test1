<?php
    //１　データベースに接続する処理
    $dsn = 'mysql:dbname=skill_test1;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');


    // DBからデータを取得する処理
    $sql = 'SELECT * FROM `tasks` WHERE `id` = ?';
    $data[] = $_GET['id'];
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    $comment = $stmt->fetch(PDO::FETCH_ASSOC);

    // header("Location: schedule.php");
    // exit();

$dbh = null;

    ?>




<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Skill Test</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body style="margin-top: 60px">
  <div class="container">
    <div class="row">
      <div class="col-xs-8 col-xs-offset-2 thumbnail">
        <h2 class="text-center content_header">タスク編集</h2>
         


        <form action="update.php" method="post">

          <div class="form-group">
          <div class="input-group">
             <label for="task">タスク</label>
            <input type="text" name="title" class="form-control" id="validate-text" placeholder="title" required value="<?php echo $comment['title'] ?>">
            <input type="hidden" name="id" value="<?php echo $comment['id'] ?>">
            
          </div>
          </div>

          <div class="form-group">
            <div class="input-group">
            <label for="date">日程</label>
            <input type="text" name="date" class="form-control" id="validate-text" placeholder="date" required value="<?php echo $comment['date'] ?>">
            <input type="hidden" name="id" value="<?php echo $comment['id'] ?>">
              
          </div>
          </div>

          <div class="form-group">
            <div class="input-group">
            <label for="detail">詳細</label>
            <input type="text" name="detail" class="form-control" id="validate-text" placeholder="detail" required value="<?php echo $comment['detail'] ?>">
            <input type="hidden" name="id" value="<?php echo $comment['id'] ?>">
              
          </div>
          </div>


          
          <input type="submit" class="btn btn-primary" value="編集">
        </form>

      </div>
    </div>
  </div>

</body>
</html>
        