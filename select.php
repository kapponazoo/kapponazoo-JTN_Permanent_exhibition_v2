<?php

//1. POSTデータ取得

//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DB_CONECT:'.$e->getMessage());
}

//２．データ登録SQL作成
$sql = "SELECT * FROM jtn_an_table";
$stmt = $pdo->prepare("$sql");
$status = $stmt->execute(); //ture or false
// 全データの件数を取得
$total = $stmt->fetchColumn();

//３．データ表示
// $view=""; //無視
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("sQL_ERROR:".$error[2]);
}

// ページサイズとページ番号を設定
$pageSize = 2;
$pageNum = isset($_GET['page']) ? $_GET['page'] : 1;

// データの取得範囲を計算
$offset = ($pageNum - 1) * $pageSize;



//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
//JSONい値を渡す場合に使う
// $json = json_encode($values,JSON_UNESCAPED_UNICODE);

$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
// ページリンクの生成
$prevPageLink = $pageNum > 1 ? '?page=' . ($pageNum - 1) : '';
$nextPageLink = $pageNum < ceil($total / $pageSize) ? '?page=' . ($pageNum + 1) : '';

// ページ番号一覧の生成
$pageList = range(1, ceil($total / $pageSize));

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>テキスタイルの常設展示</title>
<link rel="stylesheet" href="css/style.css" >
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">



<!-- Main[Start] -->
<div class="wrapper">

<h1>テキスタイルの常設展示が見られる施設</h1>

      <a class="navbar-brand" href="index.php">データ登録</a>

<?php foreach($values as $value){ ?>


<h2><?=$value["facility_name"]?></h2>
<table>
<tr><th>都道府県</th><td><?=$value["pref"]?></td></tr>
<tr><th>住所</th><td><?=$value["facility_add"]?></td></tr>
<tr><th>URL</th><td>
  <a href="<?=$value["facility_url"]?>" target_blank><?=$value["facility_url"]?></a></td></tr>
<tr><th>開館時間</th><td><?=$value["open_time"]?>～<?=$value["close_time"]?></td></tr>
<tr><th>休日</th><td><?=$value["closed_day"]?>
<tr><th>施設の予約について</th><td><?=$value["reservation"]?></td></tr>
<tr><th>展示の種類</th><td><?=$value["exhibition_type01"]?><?=$value["exhibition_type02"]?><?=$value["exhibition_type03"]?><?=$value["exhibition_type04"]?></td></tr>
<tr><th>キーワード</th><td><?=$value["category_type01"]?><?=$value["category_type02"]?><?=$value["category_type03"]?><?=$value["category_type04"]?><?=$value["category_type05"]?><?=$value["category_type06"]?><?=$value["category_type07"]?><?=$value["category_type08"]?><?=$value["category_type09"]?><?=$value["category_type10"]?><?=$value["category_type11"]?><?=$value["category_txt"]?></td></tr>
<tr><th>写真撮影について</th><td><?=$value["picture"]?></td></tr>
<tr><th>展示について</th><td><?=$value["exhibition_info"]?></td></tr>
<tr><th>展示の様子</th><td><img src="images/<?=$value["image"]?>" width="200px"></td></tr></table>

<?php } ?>

</div>
<!-- Main[End] -->


<script>
  //JSON受け取り



</script>
</body>
</html>
