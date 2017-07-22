<!DOCTYPE html>
<html>
<head>
	<?php 
		$title = "Обратная связь";
		require_once 'blocks/head.php';
	?>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
   <script>
      $(document).ready(function(){
         
         $('#done').click(function(){
            $('#error').hide();
            var name = $('#name').val();
            var email = $('#email').val();
            var subject = $('#subject').val();
            var message = $('#message').val();
            var fail = '';
            if(name.length < 3){
               fail = "Простите, но имя должно быть не меньше 3 символов";
            }else if(email.split('@').length -1 == 0 || email.split('.').length -1 == 0){
               fail = "Простите, но вы ввели не коректный Email";
            }else if(subject.length < 5){
               fail = "Простите, но тема вашего сообщения должна быть не меньше 5 символов";
            }else if(message.length < 20){
               fail = "Простите, но сообщение должно быть не меньше 20 символов";
            }
            if(fail != ""){
               $('#error').html(fail + "<div class='clear'><br></div>");
               $('#error').show();
               return false;
            }
            $.ajax ({
               url: "/ajax/feedback.php",
               type: 'POST',
               cache: false,
               data: {'name': name, 'email': email, 'subject': subject, 'message': message},
               dataType: 'html',
               success: function (data){
                      $('#error').html(data + "<div class='clear'><br></div>");
                      $('#error').show();
               }
            });
         });
      });
   </script>
</head>
<body>
   <?php require_once 'blocks/header.php'; ?>
   <div id="wrapper">
      <div id="leftCol">
         <label for="name"><h3>Ваше <span class="blue">имя</span>:</h3></label>
         <input type="text" placeholder="Имя" id="name" name="name" class="text">
         <label for="email"><h3>Ваш <span class="blue">email</span>:</h3></label>
         <input type="text" placeholder="Email" name="email" id="email" class="text">
         <label for="Subject"><h3><span class="blue">Тема</span> вашего сообщения:</h3></label>
         <input type="text" placeholder="Тема или Заголовок" class="text" id="subject" name="subject">
         <label for="message"><h3>Ваше <span class="blue">сообщение</span> (<span class="red">от 20 до 500 символов</span>):</h3></label>
         <textarea maxlength="500" placeholder="Напишите ваше сообщение сюда" id="message" cols="50" rows="10"></textarea>
         <div id="error"><span class="red"></span></div>
         <input type="button" name="done" id="done" value="Готово">
      </div>
   	<?php require_once 'blocks/rightCol.php'; ?>
   </div>
	<?php require_once 'blocks/footer.php'; ?>
</body>
</html>