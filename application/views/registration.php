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
    <button class="ui button" name="add" type="submit">Submit</button>
</div>

<?php echo form_close(); ?>
<?php session_destroy(); ?>


<?php $hidden = array('username' => "",); ?>
<?php $attributesID = array('class' => 'form_open', 'id' => 'myform'); ?>
<?php echo form_open('Chat/indexrandom', $attributesID, $hidden);

?>
<script>
    function getRndInteger(min, max) {
        return Math.floor(Math.random() * (max - min)) + min;
    }
    var usev = getRndInteger(100, 1000);
    console.log(usev);
    var myfomyform = document.getElementById('myform');
    var myfomyformInput  = myfomyform.getElementsByTagName('input');

    myfomyformInput[0].setAttribute('value',"user"+ usev);
    console.log(myfomyformInput);
</script>


<p>Or you can chat incognito</p>
<button type="submit" name="add">GO</button>
<?php echo form_close(); ?>

<?php echo form_open('Chat/CreateTable'); ?>
<button type="submit" name="ccc">go</button>

</body>
</html>
