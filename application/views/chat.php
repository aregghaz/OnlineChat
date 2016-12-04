<!DOCTYPE html>
<html>
<head>
    <title>403 Forbidden</title>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
</head>
<body>

<?php

if (empty($nickname)) {

    echo 'sxal ka';
}
else {
    $nicname = $nickname;
}


?>

<?php if ($chat) { ?>
    <?php foreach ($chat as $item): ?>
        <?php echo $item['time']; ?>
        <?php echo $item['nick']; ?>

        <?php echo $item['text']; ?><br>
    <?php endforeach; ?>
<?php }; ?>
<?php $hidden = array('username' => $nicname); ?>
<?php echo form_open('Chat/index2', "", $hidden); ?>

<input type="text" title="text" name="user">
<button type="submit" name="send">send</button>


</body>
</html>
