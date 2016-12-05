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

        display: list-item;
    !important;
        margin: 0 auto;
    !important;
    }

    form, button, input {
        display: list-item;
    !important;
        margin: 0 auto;
    !important;
    }
</style>
<body>
<!-------------- checking user ------------------>
<?php

if (empty($_SESSION['userNick'])) {

    $userNick = $_POST['username'];
} else {
    $userNick = $_SESSION['userNick'];
}

?>
<!-------------- end checking user ------------------>
<div class="ui relaxed divided list" id="">
    <!-------------- crating basic chat ------------------>
    <?php
    if (!empty($chat)) {
    foreach ($chat as $item):
        ?>
        <div class="item">
            <i class="large github middle aligned icon"></i>
            <div class="content">
                <a class="header"> <?php echo $item['nick']; ?></a>
                <div class="description"><?php echo date("H:i:s", strtotime($item['time']));
                    echo $item['text']; ?>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
</div>
    <!-------------- crating basic chat button ------------------>
<?php
$hidden = array('username' => $userNick);
echo form_open('Chat/sendingMessage', "", $hidden);
?>

<input type="text" title="text" name="user">
    <button type="submit" name="send">send</button>

    <!--------------end crating basic chat ------------------>
<?php
echo form_close();
}
else {
    ?>
    <!-------------- crating registration chat ------------------>

    <div class="ui relaxed divided list" id="">
        <?php foreach ($nameTable as $item): ?>
            <div class="item">
                <i class="large github middle aligned icon"></i>
                <div class="content">
                    <a class="header"> <?php echo $item['nick']; ?></a>
                    <div class="description"><?php echo date("H:i:s", strtotime($item['time']));
                        echo $item['text']; ?>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-------------- crating registration chat button ------------------>

    <?php
    $hidden = array('username' => $userNick);
    echo form_open('Chat/newChatSendMessage', "", $hidden);
    ?>

    <input type="text" title="text" name="user">
    <button type="submit" name="send">send</button>
    <?php
    echo form_close();
}
?>
<!--------------end crating registration chat ------------------>


<!-------------- crating  button to crating table ------------------>
<?php
echo form_close();
if (isset($_SESSION['userNick'])) {
    echo form_open('Chat/CreateTable');
    ?>
    <input type="text" name="nameTable" title="nameTable" required>
    <button type="submit" name="randomUser">CreateTable</button>
    <?php
}
echo form_close();
?>

<!--------------end crating  button to crating table ------------------>
<a href="http://127.0.0.1/onlinechat/">back to home page</a>
</body>
</html>
