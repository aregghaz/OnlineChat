<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
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

    .ui.list, .input {

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
<?php
if ($_SESSION['userNick']) {

    $userNick = $_SESSION['userNick'];
}

?>
<!-------------- crating registration user sending message chat button ------------------>

<!-------------- crating registration chat ------------------>

<div class="ui relaxed divided list" id="">
    <?php foreach ($chat as $item): ?>
        <div class="item">
            <i class="large github middle aligned icon"></i>
            <div class="content">
                <a class="header"> <?php echo $item['nick']; ?></a>
                <div class="description"><?php echo date("H:i:s", strtotime($item['time'])); ?>
                    <br><?php echo $item['text']; ?>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php
$hidden = array('username' => $userNick);

echo form_open('Chat/send_message', "", $hidden);
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

<input type="hidden" name="tableName" value="<?php if (!empty($_POST['tableName'])) echo $_POST['tableName'] ?>">
<?php
$data = array(
    'name' => 'send',
    'class' => 'positive ui button',
    'value' => 'true',
    'type' => 'submit',
    'content' => 'send'
);
echo form_button($data);
echo form_close();
?>
<!--------------end crating registration chat ------------------>
<!-------------- crating  button to crating table ------------------>
<?php
echo form_close();
if (isset($_SESSION['userNick'])) {


    $attributes = array('enctype' => 'multipart/form-data');
    echo form_open('Chat/create_table',  $attributes );
    ?>
    <div class="ui input focus">
        <?php
        $data = array(
            'name' => 'nameTable',
            'placeholder' => 'Table Name',
            'required' => 'required'
        );
        echo form_input($data);
        ?>
    </div>
<div class="ui input focus">
    <?php
    $data = array(
        'name' => 'tableImage',

        'type' => 'file',
        'required' => 'required',
    );
    echo form_input($data);
    ?>

</div>
    <?php
    $data = array(
        'name' => 'CreateTable',
        'class' => 'positive ui button',
        'value' => 'true',
        'type' => 'submit',
        'content' => 'CreateTable'
    );
    echo form_button($data);
    echo form_close();
}
?>

<!--------------end crating  button to crating table ------------------>
<h3 class="ui center aligned header">
    <a href="/onlinechat/">Back to home page</a>
</h3>
</body>
</html>
