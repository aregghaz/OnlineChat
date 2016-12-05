<!DOCTYPE html>
<html>
<head>
    <title>registration</title>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
    <style>
        .form {
            width: 600px;
            margin: 30px auto;
        }

    </style>
</head>
<body>

<?php echo form_open('Chat/registration'); ?>
<div class="form ui form">
    <div class="field">
        <label>First Name</label>
        <input type="text" name="name" placeholder="Name" required>
    </div>
    <div class="field">
        <label>Nickname</label>
        <input type="text" name="Nickname" placeholder="Nickname" required>
    </div>

    <div class="field">
        <label>Password</label>
        <input type="PASSWORD" name="password" placeholder="password" required>
    </div>

    <div class="field">
        <label>required password</label>
        <input type="password" name="requiredPassword" placeholder="required password" required>
    </div>
    <button class="positive ui button" name="add" type="submit">Submit</button>
</div>

<?php
    echo form_close();
    session_destroy();
    $hidden = array('username' => "",);
    $attributesID = array('class' => 'form_open', 'id' => 'myForm');
    echo form_open('Chat/incognito', $attributesID, $hidden);
?>


<div class="form">
    <P>Or</P>
    <button class="ui black button" type="submit" name="add">You can chat incognito</button>
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
