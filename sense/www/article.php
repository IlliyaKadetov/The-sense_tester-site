<!DOCTYPE html>
<html>
<head>
	<?php
      require_once 'fun/fun.php';
      $news = getNews(1, $_GET["id"]);
		$title = $news[0]["title"];
		require_once 'blocks/head.php';
   ?>
</head>
<body>
   <?php require_once 'blocks/header.php'; ?>
   <div id="wrapper">
   		<div id="leftCol">
         <?php
               echo '<div id="bigarticle"><img src="img/articles/'.$news[0]["id"].'.png" alt="Сдесь должна быть картинка с красивой цитатой...">
               <h2>'.$news[0]["title"].'</h2>
               <p>'.$news[0]["full_text"].'</p></div>';
         ?>
   		</div>
   		<?php require_once 'blocks/rightCol.php'; ?>
   </div>
	<?php require_once 'blocks/footer.php'; ?>
</body>
</html>