<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charフォームset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>常設施設紹介</title>
    <link rel="stylesheet" href="css/style.css" >

</head>
<body>

<div class="wrapper">
<h1>染織関連の<br>常設展示のある施設を教えてください</h1>
<p>結果は<a href="select.php">こちらから</a></p>
<form action="insert.php" method="post" enctype="multipart/form-data">
<h2>施設名</h2>
<p class="answer"><input type="text" name="facility_name"></p>

<h2>都道府県</h2>
<select name="pref" class="answer">
  <option value="" selected>都道府県</option>
  <option value="北海道">北海道</option>
  <option value="青森県">青森県</option>
  <option value="岩手県">岩手県</option>
  <option value="宮城県">宮城県</option>
  <option value="秋田県">秋田県</option>
  <option value="山形県">山形県</option>
  <option value="福島県">福島県</option>
  <option value="茨城県">茨城県</option>
  <option value="栃木県">栃木県</option>
  <option value="群馬県">群馬県</option>
  <option value="埼玉県">埼玉県</option>
  <option value="千葉県">千葉県</option>
  <option value="東京都">東京都</option>
  <option value="神奈川県">神奈川県</option>
  <option value="新潟県">新潟県</option>
  <option value="富山県">富山県</option>
  <option value="石川県">石川県</option>
  <option value="福井県">福井県</option>
  <option value="山梨県">山梨県</option>
  <option value="長野県">長野県</option>
  <option value="岐阜県">岐阜県</option>
  <option value="静岡県">静岡県</option>
  <option value="愛知県">愛知県</option>
  <option value="三重県">三重県</option>
  <option value="滋賀県">滋賀県</option>
  <option value="京都府">京都府</option>
  <option value="大阪府">大阪府</option>
  <option value="兵庫県">兵庫県</option>
  <option value="奈良県">奈良県</option>
  <option value="和歌山県">和歌山県</option>
  <option value="鳥取県">鳥取県</option>
  <option value="島根県">島根県</option>
  <option value="岡山県">岡山県</option>
  <option value="広島県">広島県</option>
  <option value="山口県">山口県</option>
  <option value="徳島県">徳島県</option>
  <option value="香川県">香川県</option>
  <option value="愛媛県">愛媛県</option>
  <option value="高知県">高知県</option>
  <option value="福岡県">福岡県</option>
  <option value="佐賀県">佐賀県</option>
  <option value="長崎県">長崎県</option>
  <option value="熊本県">熊本県</option>
  <option value="大分県">大分県</option>
  <option value="宮崎県">宮崎県</option>
  <option value="鹿児島県">鹿児島県</option>
  <option value="沖縄県">沖縄県</option>
</select>

<h2>住所</h2>
<p class="answer"><input type="text" name="facility_add"></p>

<h2>URL</h2>
<p class="answer"><input type="url" name="facility_url"></p>

<h2>営業時間</h2>
<p class="half"><input type="time" name="open_time">～<input type="time" name="close_time"></p>

<h2>休日</h2>
<p class="answer"><input type="text" name="closed_day"></p>
<h2>予約</h2>
<p>
<input type="radio" name="reservation" id="reservation_type01" value="予約必須">予約必須
<input type="radio" name="reservation" id="reservation_type02" value="予約可能">予約可能
<input type="radio" name="reservation" id="reservation_type03" value="予約不要">予約不要
</p>
<h2>展示タイプ</h2>
<p>
<input type="hidden" name="exhibition_type01" value="0" />
<input type="checkbox" name="exhibition_type01" value="模型展示">模型展示
<input type="hidden" name="exhibition_type02" value="0" />
<input type="checkbox" name="exhibition_type02" value="素材展示">素材展示
<input type="hidden" name="exhibition_type03" value="0" />
<input type="checkbox" name="exhibition_type03" value="体験展示">体験展示
<input type="hidden" name="exhibition_type04" value="0" />
<input type="checkbox" name="exhibition_type04" value="パネル展示">パネル展示</p>
<h2>種別</h2>
<p>
<input type="hidden" name="category_type01" value="0" />
<input type="checkbox" name="category_type01" value="織り">織り
<input type="hidden" name="category_type02" value="0" />
<input type="checkbox" name="category_type02" value="染め">染め
<input type="hidden" name="category_type03" value="0" />
<input type="checkbox" name="category_type03" value="刺繍">刺繍
<input type="hidden" name="category_type04" value="0" />
<input type="checkbox" name="category_type04" value="キルト">キルト
<input type="hidden" name="category_type05" value="0" />
<input type="checkbox" name="category_type05" value="アート">アート
<input type="hidden" name="category_type06" value="0" />
<input type="checkbox" name="category_type06" value="染織史">染織史
<input type="hidden" name="category_type07" value="0" />
<input type="checkbox" name="category_type07" value="服飾">服飾
<input type="hidden" name="category_type08" value="0" />
<input type="checkbox" name="category_type08" value="産業">産業
<input type="hidden" name="category_type09" value="0" />
<input type="checkbox" name="category_type09" value="民俗">民俗
<input type="hidden" name="category_type10" value="0" />
<input type="checkbox" name="category_type10" value="民族">民族
<input type="hidden" name="category_type11" value="0" />
<input type="checkbox" name="category_type11" value="その他">その他
<p>その他の方はこちらにご入力ください。</p>
<p class="answer"><input type="text" name="category_txt"></p>
</p>
<h2>写真撮影</h2>
<p>
<input type="radio" name="picture" id="picture_type01" value="撮影可能">撮影可能
<input type="radio" name="picture" id="picture_type01" value="撮影不可">撮影不可
<input type="radio" name="picture" id="picture_type01" value="撮影については未確認">撮影については未確認
</p>
<h2>展示の様子</h2>
<input type="file" name="image">
<h2>展示内容について</h2>
<p class="answer"><textarea name="exhibition_info" cols="30" rows="10"></textarea></p>

    <button type="submit">送信</button>
    </form>

</div>
</body>
</html>