<style>
    #table {

        margin-bottom: 50px;
    }
</style>
<div class="ui relaxed divided list" id="table">
    <?php if ($nameTable) {
        foreach ($nameTable as $item):
            $hidden = array('tableName' => $item['nameTable']);
            echo form_open('Chat/newChat', "", $hidden) ?>
            <div class="item">
                <i class="large github middle aligned icon"></i>
                <div class="content">
                    <button class="header" name="add"> <?php echo $item['nameTable']; ?></button>
                    <div class="description">  <?php echo $item['nameUser']; ?></div>

                </div>
            </div>
            <?php echo form_close();
        endforeach;
    }; ?>
</div>