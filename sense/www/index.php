<!DOCTYPE html>
<html>
<head>
	<?php 
      require_once 'fun/fun.php';
      $news = getNews(3);
		$title = "Смысл Жизни!";
		require_once 'blocks/head.php';
     
	?>
</head>
<body>
   <?php require_once 'blocks/header.php'; ?>
   <div id="wrapper">
   		<div id="leftCol">
         <?php
            for ($i = 0; $i < count($news); $i++) { 
               if($i == 0 || $i%3 === 0){
                  echo "<div id=\"bigarticle\">";
               }else{
                  echo "<div class=\"article\">";
               }
               echo '<a href="article.php?id='.$news[$i]["id"].'"><img src="img/articles/'.$news[$i]["id"].'.png" alt="Сдесь должна быть картинка с красивой цитатой...">
               <h2>'.$news[$i]["title"].'</h2>
               <p>'.$news[$i]["text"].'</p>
               <div class="more">Читать полносьтю</div></a></div>';
               /*if($i == 0 || $i%3 === 0){
                  echo "<div class=\"clear\"><br></div>";
               }*/
            }
         ?>
   		</div>
   		<?php require_once 'blocks/rightCol.php'; ?>
   </div>
	<?php require_once 'blocks/footer.php'; ?>
</body>
</html>