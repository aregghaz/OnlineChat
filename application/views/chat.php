<!DOCTYPE html>
<html>
<head>
    <title>Basic chat</title>
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
    .ui.input {
        font-size: 1em;
        margin: 10px auto;
        display: table;
    }
    .ui.positive.button {

        margin: 0 auto;
        display: block;
    }
</style>
<body>
<!-------------- checking user ------------------>
<?php

if (empty($_SESSION['userNick'])) {

    $userNick = $_POST['username'];
}
?>
<!-------------- end checking user ------------------>
<div class="ui relaxed divided list" id="">
    <!-------------- crating basic chat ------------------>
<?php

    foreach ($chat as $item):
        ?>
        <div class="item">
            <i class="large github middle aligned icon"></i>
            <div class="content">
                <a class="header"> <?php echo $item['nick']; ?></a>
                <div class="description"><?php echo date("H:i:s", strtotime($item['time']));?><br><?php echo $item['text']; ?>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
</div>
    <!-------------- crating basic chat button ------------------>
<?php
$hidden = array('username' => $userNick);
echo form_open('Chat/message_send', "", $hidden);
?>
<div class="ui input focus">
    <?php
    $data = array(
        'name' => 'user',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'Enter your message',
    );
    echo form_input($data);
    ?>
</div>
<?php
$data = array(
    'name'          => 'button',
    'class'         => 'positive ui button',
    'value'         => 'true',
    'type'          => 'submit',
    'content'       => 'send'
);
echo form_button($data);
?>
    <!--------------end crating basic chat ------------------>
<h3 class="ui center aligned header">
    <a href="/onlinechat/">Back to home page</a>
</h3>

</body>
</html>
