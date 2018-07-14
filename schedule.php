<?php

 if(!empty($_POST)){
    $title = htmlspecialchars($_POST['title']);
    // $time = date('Y-m-d H:i:s');
    $date = date('Y-m-d');
    // $date = htmlspecialchars($_POST['date']);
    $detail = htmlspecialchars($_POST['detail']);

    // var_dump($_POST);exit();
    
  // ここにDBに登録する処理を記述する
   

    //１　データベースに接続する処理
    $dsn = 'mysql:dbname=skill_test1;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');

    // 呟かれたデータを受け取る


    //SQLに保存する
    $sql = 'INSERT INTO `tasks`(`title`, `date`,`detail`) VALUES (?, ? ,?)';
    $data[] =  $title;
    $data[] =  $date;
    $data[] = $detail;
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    }




    // データを取り出す
    $sql = 'SELECT * FROM `tasks` ORDER BY created DESC';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $comments = array();
    while (1) {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec == false) {
        break;
              }
    $comments[] = $rec;
              }

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
      <div class="col-xs-10 col-xs-offset-1">

        <h2 class="text-center content_header">タスク管理</h2>

        <div class="col-xs-4">
          <a href="post.php" class="btn btn-primary button">追加</a>
        </div>


          <?php var_dump( $comments);
          exit();  ?>
         
        <div class="col-xs-8">
          <?php foreach ($comments as $comment): ?>
          <div class="task">
            
            <h3><?php echo $comment['date']; ?></h3>
            <div class="content">
              <h3 style="font-weight: bold"><?php echo $comment['title']; ?></h3>
              <h4><?php echo $comment['detail']; ?></h4>
              
            </div>
          </div>
           <?php endforeach; ?>
            


          <div class="task">
            <h3>8月15日</h3>
            <div class="content">
              <h3 style="font-weight: bold;">明日映画に行く</h3>
              <h4>ノブさんと映画見に行くことになったが、気まずいら事前に誰かを誘いたい。太一にはもう聞いて見たが断られた。でも二人で行きたくないから必死に誰かを誘いたい</h4>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="assets/js/jquery-3.1.1.js"></script>
  <script src="assets/js/jquery-migrate-1.4.1.js"></script>
  <script src="assets/js/bootstrap.js"></script>
</body>
</html>