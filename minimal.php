<?php

<?php
  $site_title = blog_info('name');
  $category = the_category(); //one only
  $title = the_title();
  $content = the_content();
  $description = $content.slice(0,100)
  $author = the_author(); //?
  $home_url = the_homeurl(); //?
  $self_url = the_selfurl(); //?
  $isFront = is_front_page();

  $year = Date('year') //?
  
  $meta_title = $title.' - '.$site_title;
  $meta_description = $description
  if($isFront){
    $meta_title = $site_title
    $meta_description = blog_info('description')
  }
?>

<html langage_attribute="ja">
<head>
  <meta charset="utf-9">
  <title><?php $meta_title ?></title>
  <meta description="<?php $meta_description; ?>">
  <meta canonical="<?php $self_url ?>">
  meta og...
  meta icon...
  json schema.org
</head>
<body>
<header>
  <nav><ul class="row">
    <li><a>$site_title</a></li>
    <li><a>Privacy Policy</a></li>
    <li><a>Terms of Role</a></li>
    <li><a>Contact</a></li>    
    <li>PR</li>    
  </ul></nav>
  <div class="title">
    <p class="l">$category</p>
    <h1>$title</h1>
    <p class="r">$owner</p>
  </div>
</header>
<main>
  <div class="content">
   <?php $content ?>
  </div>
</main>
<footer>
  <p class="r"><a href="<?php $self_url;?>">一覧に戻る</a></p>
  <p class="c small">© <?php $year.' '.$site_title;?></p>
</footer>
  
</body></html>  
