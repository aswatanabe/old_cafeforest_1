<?php

$name = $_POST['name'];
$mail = $_POST['mail'];
$tel = $_POST['tel'];
$querytitle = $_POST['querytitle'];
$query = $_POST['query'];

?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<title>お問い合わせ内容の確認 | Cafe Forest</title>
	
	<link rel="stylesheet" href="../CSS/general.css" type="text/css">
	<link rel="stylesheet" href="../CSS/box.css"  type="text/css">

</head>

<body class="contact result">
	
	<header>
	<img src="../images/logo.svg" width="auto" height="100px" alt="ロゴ">
		<nav>
		<h2>サイトマップ</h2>
			<ul>
				<li><a href="../index.html">トップ</a></li>
				<li><a href="../coupon/index.html"><picture><source srcset="../images/banner_hanbun.png" media="(max-width: 730px)"><img src="../images/banner_h.png" alt="バナー"></picture></a></li>
				<li><a href="../coffee-info/index.html">自家焙煎コーヒー</a></li>
				<li><a href="../coffee-cake/monthly.php">今月のコーヒー＆ケーキ</a></li>
				<li><a href="../menu/index.html">メニュー</a></li>
				<li><a href="../store/index.html">通販</a></li><!--ハイライトかdisplay:none-->
				<li><a href="../tenpo/index.html">店舗紹介</a></li>
				<li><a href="#">お問い合わせ</a></li>
			</ul>
		</nav>
	</header>
	<main>
			<h1>お問い合わせ</h1>
			<p style="color: green;">入力内容をご確認の上、「送信」ボタンをクリックして下さい。<br></p>
			<form action="result.php" method="POST">
				<table border="0" >
				  <tr>
					<td class="item" >お名前</td>
					<td><?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8');?></td>
				  </tr>
				  <tr>
					<td class="item" >メールアドレス</td>
					<td><?php echo htmlspecialchars($mail, ENT_QUOTES, 'UTF-8');?></td>
				  </tr>
				  <tr>
					<td class="item" >電話番号</td>
				 	<td><?php echo htmlspecialchars($tel, ENT_QUOTES, 'UTF-8');?></td>
				  </tr>
				  <tr>
					<td class="item" >お問い合わせタイトル</td>
				  	<td><?php echo $querytitle;?></td>
				  </tr>
				  <tr>
					<td class="item" >お問い合わせ内容</td>
		      		 <td style="height:300px;">
				 		 <?php echo htmlspecialchars($query, ENT_QUOTES, 'UTF-8');?>
		      	 	 </td>
		      	 </tr>
		      	</table>
				<p style="text-align: center;"><input type="submit" value="送信" class="button"></p><br>
				<p><input type="button" value="戻る" onclick='history.back()' class="modoru"></p>
      		</form>
	</main>
		
	<footer>
		<p><small><a href="../law/index.html">特定商取引法に基づく表示</a></small></p>
		<p><small>Copyright © Cafe Forest. All Rights Reserved.</small></p>
	</footer>


</body>
</html>
