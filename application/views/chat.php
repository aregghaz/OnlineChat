<!DOCTYPE html>
<html>
<head>
    <title>403 Forbidden</title>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
</head>
<style>
    .ui.list {
        font-size: 1em;
        width: 400px;
        border: 1px solid black;
        display: inline-block;

    }
    .ui.list {

        display: list-item; !important;
        margin: 0 auto;!important;
    }
    form, button, input {
        display: list-item; !important;
        margin: 0 auto;!important;
    }
</style>
<body>

<?php

if (empty($nickName)) {

    $nicName = $_POST['username'];
}
else {
    $nicName = $nickName;
}


?>
<div class="ui relaxed divided list" id="">
    <?php if ($chat) { ?>
    <?php foreach ($chat as $item): ?>
    <div class="item">
        <i class="large github middle aligned icon"></i>
        <div class="content">
            <a class="header"> <?php echo $item['nick']; ?></a>
            <div class="description"><?php  echo date("H:i:s", strtotime($item['time'])); ?>  <?php echo $item['text']; ?></div>

        </div>
    </div>
        <?php endforeach; ?>
    <?php }; ?>
</div>



<?php $hidden = array('username' => $nicName); ?>
<?php echo form_open('Chat/index2', "", $hidden); ?>

<input type="text" title="text" name="user">
<button type="submit" name="send">send</button>
<?php
    echo form_close();
    if(isset($_SESSION['nickName']))
{
    echo form_open('Chat/CreateTable'); ?>
        <button type="submit" name="randomUser">CreateTable</button>
<?php
}
?>

</body>
</html>
