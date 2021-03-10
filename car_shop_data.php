<?php

include 'simple_html_dom.php';

$html = file_get_html('https://itp.ne.jp/keyword/?areaword=&keyword=%E4%B8%AD%E5%8F%A4%E8%BB%8A%E3%83%BB%E8%B2%B7%E5%8F%96');

$articles = $html->find('article.m-article-card__body');

$carShopInfoList = [];
foreach ($articles as $article) {
  $title = $article->find('.m-article-card__header__title__link')[0]->innertext;
  $captionNodes = $article->find('.m-article-card__lead__caption');
  $captions = [];
  foreach ($captionNodes as $captionNode) {
    $captions[] = $captionNode->innertext;
  }
  $reverse_captions = array_reverse($captions);
  
  $address = str_replace(' 【住所】', '', $reverse_captions[0]);
  
  $tell = str_replace(' 【電話番号】 ', '', $reverse_captions[1]);
 
  $carShopInfoList[] = [
    'shop_name' => $title,
    'address' => $address,
    'tell' => $tell
  ];
}





