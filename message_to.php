<!DOCTYPE html>
<html>
<head>
  <title>SuperDating | Send message</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php

$message_to = $_POST['message_to'];

?>

      <!-- Private message form -->
        <div id="modal" class="modal">
          <form class="comment-form" action="send_message.php" method="post">
            <input class="hidden" type="text" name="message_to" value="<?php echo $message_to;?>">
            <textarea type="text" name="message" placeholder="Enter your message.."></textarea>
            <button type="submit" name="send">Send</button>
          </form>
        </div>

</body>
</html>
