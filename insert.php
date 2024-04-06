<?php
//1. POSTデータ取得
// var_dump($_POST);
// exit();


//[facility_name,pref,add,url,open_time,close_time,closed_day,exhibition_info,indate)VALUES(:name,:email,:age,:naiyou]
$facility_name = $_POST["facility_name"];
$pref = $_POST["pref"];
$facility_add = $_POST["facility_add"];
$facility_url = $_POST["facility_url"];
$open_time = $_POST["open_time"];
$close_time = $_POST["close_time"];
$closed_day = $_POST["closed_day"];

$reservation = $_POST["reservation"];

$exhibition_type01 = $_POST["exhibition_type01"];
$exhibition_type02 = $_POST["exhibition_type02"];
$exhibition_type03 = $_POST["exhibition_type03"];
$exhibition_type04 = $_POST["exhibition_type04"];

$category_type01 = $_POST["category_type01"];
$category_type02 = $_POST["category_type02"];
$category_type03 = $_POST["category_type03"];
$category_type04 = $_POST["category_type04"];
$category_type05 = $_POST["category_type05"];
$category_type06 = $_POST["category_type06"];
$category_type07 = $_POST["category_type07"];
$category_type08 = $_POST["category_type08"];
$category_type09 = $_POST["category_type09"];
$category_type10 = $_POST["category_type10"];
$category_type11 = $_POST["category_type11"];
$category_txt= $_POST["category_txt"];

$picture = $_POST["picture"];
// $image = $_POST["image"];
$exhibition_info = $_POST["exhibition_info"];


echo($exhibition_type01);
//2. チェックボックス空欄の処理
if ($exhibition_type01 == '0') {$exhibition_type01 = '' ;} else {$exhibition_type01 = '<span class="exhibition_type">'.$exhibition_type01 .'</span>';};
if ($exhibition_type02 == '0') {$exhibition_type02 = '' ;} else {$exhibition_type02 = '<span class="exhibition_type">'.$exhibition_type02 .'</span>';};
if ($exhibition_type03 == '0') {$exhibition_type03 = '' ;} else {$exhibition_type03 = '<span class="exhibition_type">'.$exhibition_type03 .'</span>';};
if ($exhibition_type04 == '0') {$exhibition_type04 = '' ;} else {$exhibition_type04 = '<span class="exhibition_type">'.$exhibition_type04 .'</span>';};

if ($category_type01 == '0') {$category_type01 = '' ;} else {$category_type01 = '<span class="exhibition_type">'.$exhibition_type01 .'</span>';};
if ($category_type02 == '0') {$category_type02 = '' ;} else {$category_type02 = '<span class="exhibition_type">'.$exhibition_type02 .'</span>';};
if ($category_type03 == '0') {$category_type03 = '' ;} else {$category_type03 = '<span class="exhibition_type">'.$exhibition_type03 .'</span>';};
if ($category_type04 == '0') {$category_type04 = '' ;} else {$category_type04 = '<span class="exhibition_type">'.$exhibition_type04 .'</span>';};
if ($category_type05 == '0') {$category_type05 = '' ;} else {$category_type05 = '<span class="exhibition_type">'.$exhibition_type05 .'</span>';};
if ($category_type06 == '0') {$category_type06 = '' ;} else {$category_type06 = '<span class="exhibition_type">'.$exhibition_type06 .'</span>';};
if ($category_type07 == '0') {$category_type07 = '' ;} else {$category_type07 = '<span class="exhibition_type">'.$exhibition_type07 .'</span>';};
if ($category_type08 == '0') {$category_type08 = '' ;} else {$category_type08 = '<span class="exhibition_type">'.$exhibition_type08 .'</span>';};
if ($category_type09 == '0') {$category_type09 = '' ;} else {$category_type09 = '<span class="exhibition_type">'.$exhibition_type09 .'</span>';};
if ($category_type10 == '0') {$category_type10 = '' ;} else {$category_type10 = '<span class="exhibition_type">'.$exhibition_type10 .'</span>';};
if ($category_type11 == '0') {$category_type11 = '' ;} else {$category_type11 = '<span class="exhibition_type">'.$exhibition_type11 .'</span>';};






//2. DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DB_CONECT:'.$e->getMessage());
}

//画像の受け取り
if (isset($_FILES['image'])) {//送信ボタンが押された場合
// var_dump($_FILES);
// exit();
  $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
  $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);//アップロードされたファイルの拡張子を取得
  $file = "images/$image";

  if (!empty($_FILES['image']['name'])) {//ファイルが選択されていれば$imageにファイル名を代入
      move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $image);//imagesディレクトリにファイル保存
      if (exif_imagetype($file)) {//画像ファイルかのチェック
          $message = '画像をアップロードしました';

      } else {
          $message = '画像ファイルではありません';
        }
      }};

//３．データ登録SQL作成
$sql = "INSERT INTO jtn_an_table(facility_name,pref,facility_add,facility_url,open_time,close_time,closed_day,reservation,exhibition_type01,exhibition_type02,exhibition_type03,exhibition_type04,category_type01,category_type02,category_type03,category_type04,category_type05,category_type06,category_type07,category_type08,category_type09,category_type10,category_type11,category_txt,picture,image,exhibition_info,indate)VALUES(:facility_name,:pref,:facility_add,:facility_url,:open_time,:close_time,:closed_day,:reservation,:exhibition_type01,:exhibition_type02,:exhibition_type03,:exhibition_type04,:category_type01,:category_type02,:category_type03,:category_type04,:category_type05,:category_type06,:category_type07,:category_type08,:category_type09,:category_type10,:category_type11,:category_txt,:picture,:image,:exhibition_info,sysdate());";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':facility_name', $facility_name , PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':pref', $pref, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':facility_add', $facility_add, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':facility_url', $facility_url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':open_time', $open_time, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':close_time', $close_time, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':closed_day', $closed_day, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':reservation', $reservation, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':exhibition_type01', $exhibition_type01, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':exhibition_type02', $exhibition_type02, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':exhibition_type03', $exhibition_type03, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':exhibition_type04', $exhibition_type04, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':category_type01', $category_type01, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':category_type02', $category_type02, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':category_type03', $category_type03, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':category_type04', $category_type04, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':category_type05', $category_type05, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':category_type06', $category_type06, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':category_type07', $category_type07, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':category_type08', $category_type08, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':category_type09', $category_type09, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':category_type10', $category_type10, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':category_type11', $category_type11, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':category_txt', $category_txt, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':picture', $picture, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':image', $image, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':exhibition_info', $exhibition_info, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //true or false

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}else{
  //５．index.phpへリダイレクト
header("Location: index.php");
exit();

}
?>
