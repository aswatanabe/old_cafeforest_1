<?php

//変数の初期化
$data = null;
$file_handle = null;
$exploded_data = null; //
$coffee_image = null;
$cake_image = null;
$new_monthly = array(); //新しく入力された情報を格納
$backnumber = array(); //全バックナンバーを格納
//$filename = "/home/web2225/public_html/cafeforest/admin/backnumber.txt"; //バックナンバー用のファイル名
// $filename = "D:/XAMPP/htdocs/data/cafeforest-monthly/cafeforest/admin/backnumber.txt"; //バックナンバー用のファイル名
// $filename = "../admin/backnumber.txt"; //バックナンバー用のファイル名
$filename = dirname(__FILE__) . "/../admin/backnumber.txt"; //バックナンバー用のファイル名

if ($file_handle = fopen($filename, 'r')) {
    while ($data = fgets($file_handle)) {

        //explode関数を使ってカンマで句を分割で分割
        $exploded_data = explode(",", $data);

        //$new_monthlyに連想配列の形でファイルの情報を格納
        $new_monthly = array(
            'year' => $exploded_data[0],
            'month' => $exploded_data[1],
            'coffee_name' => $exploded_data[2],
            'coffee_price' => $exploded_data[3],
            'coffee_image' => $exploded_data[4],
            'coffee_text' => $exploded_data[5],
            'cake_name' => $exploded_data[6],
            'cake_price' => $exploded_data[7],
            'cake_image' => $exploded_data[8],
            'cake_text' => $exploded_data[9]
        );

        //$backnumberに$new_monthlyを格納
        array_unshift($backnumber, $new_monthly);
    }

    //ファイルを閉じる
    fclose($file_handle);
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <meta name="description" content="東京都北区のカフェ「Cafe Forest（カフェフォレスト）」では、月替わりで、パティシエ創作ケーキと、ケーキの味にあわせてブレンドした自家焙煎のコーヒーを提供しています。カジュアルな雰囲気の中で、豆焙煎業が注文を受けてからドリップする本格的なコーヒーをお楽しみください。">
    <meta name="keywords" content="月替わり,パティシエ,創作,ケーキ,味に合わせ,ブレンド,自家焙煎,カジュアル,豆焙煎業,注文を受けてから,ドリップ,本格的">
    <title>今月のコーヒー＆ケーキ | Cafe Forest</title>
    <link rel="stylesheet" href="../CSS/general.css">
    <link rel="stylesheet" href="../CSS/box.css">
</head>

<body class="monthly">
    <header>
    <a href="../index.html"><img src="../images/logo.svg" width="auto" height="100px" alt="ロゴ"></a>
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
            <li><a href="../contact/index.html">お問い合わせ</a></li>
        </ul>
        </nav>
    </header>
    <main>
        <h1>今月のコーヒー＆ケーキ</h1>
        <?php if (!empty($backnumber)) : ?>
            <section>
                <p>月替わりのパティシエオリジナルケーキとコーヒーをご紹介。</p>
                <p>コーヒーは、ケーキの味にあわせて焙煎士がブレンドしています。</p>
                <article>
                    <h2><?= $backnumber[0]['year'] ?>年<?= $backnumber[0]['month'] ?>月</h2>
                    <section>
                        <p><img src="<?= $backnumber[0]['coffee_image'] ?>" /></p>
                        <h3><?= $backnumber[0]['coffee_name'] ?></h3>
                        <p>￥<?= $backnumber[0]['coffee_price'] ?></p>
                        <p><?= $backnumber[0]['coffee_text'] ?></p>
                    </section>
                    <section>
                        <p><img src="<?= $backnumber[0]['cake_image'] ?>" /></p>
                        <h3><?= $backnumber[0]['cake_name'] ?></h3>
                        <p>￥<?= $backnumber[0]['cake_price'] ?></p>
                        <p><?= $backnumber[0]['cake_text'] ?></p>
                    </section>
                </article>
                <p><a href="../coupon/index.html">クーポンを見る</a></p>
            </section>
            <aside>
                <h2>過去のコーヒー＆ケーキ</h2>

                <?php
                $i = 0;
                foreach ($backnumber as $bn) {
                    if ($i != 0 && $i < 12) {
                ?>

                        <article>
                            <h3><?= $bn['year'] ?>年<?= $bn['month'] ?>月</h3>
                            <section>
                                <p><img src="<?= $bn['coffee_image']; ?>" /></P>
                                <h4><?= $bn['coffee_name'] ?></h4>
                                <p>￥<?= $bn['coffee_price'] ?></p>
                                <p><?= $bn['coffee_text'] ?></p>
                            </section>
                            <section>
                                <p><img src="<?= $bn['cake_image']; ?>" /></p>
                                <h4><?= $bn['cake_name'] ?></h4>
                                <p>￥<?= $bn['cake_price'] ?></p>
                                <p><?= $bn['cake_text'] ?></p>
                            </section>
                        </article>

                <?php
                    }
                    $i++;
                }
                ?>
            </aside>
        <?php endif; ?>
        <p>表記はすべて税込価格です。</p>
    </main>
    <footer>
        <p><small><a href="../law/index.html">特定商取引法に基づく表示</a></small></p>
        <p><small>©2022 Cafe Forest.</small></p>
    </footer>
</body>
</html>