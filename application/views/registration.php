<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
    <style>
        .form {
            width: 300px;
            margin: 30px auto;
        }

    </style>
</head>
<body>

<?php echo form_open('Chat/reg'); ?>
<div class="form ui form">
    <div class="field">
        <?php
        echo form_label('First Name', 'name');
        $data = array(
            'name' => 'name',
            'placeholder' => 'Name',
            'required' => 'required'
        );
        echo form_input($data)
        ?>
    </div>
    <div class="field">

        <?php echo form_label('Nick Name', 'regNicName');
        $data = array(
            'name' => 'regNicName',
            'placeholder' => 'Nickname',
            'required' => 'required'
        );
        echo form_input($data)
        ?>
    </div>
    <?php
    $data = array(
        'name' => 'add',
        'class' => 'positive ui button',
        'value' => 'true',
        'type' => 'submit',
        'content' => 'Enter'
    );
    echo form_button($data);
    ?>
</div>

<?php
echo form_close();

$hidden = array('user' => "",);
$attributesID = array('class' => 'form_open', 'id' => 'myForm');
echo form_open('Chat/incognito', $attributesID, $hidden);
?>


<div class="form">
    <P>Or</P>
    <?php
    $data = array(
        'name' => 'add',
        'class' => 'ui black button',
        'value' => 'true',
        'type' => 'submit',
        'content' => 'You can chat incognito'
    );
    echo form_button($data);
    ?>

    <?php echo form_close(); ?>
</div>


<script>

    function getRndInteger(min, max) {
        return Math.floor(Math.random() * (max - min)) + min;
    }
    var usev = getRndInteger(100, 1000);
    console.log(usev);
    var myForm = document.getElementById('myForm');
    var myFormInput = myForm.getElementsByTagName('input');

    myFormInput[0].setAttribute('value', "user" + usev);

</script>
</body>
</html>
