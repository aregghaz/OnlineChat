<div class="ui relaxed divided list" id="table">
    <?php

    if (!empty($publictable)) {
        foreach ($publictable as $item):
            $hidden = array('publicTable' => $item['id']
            );
            echo form_open('Chat/for_all_user', "", $hidden) ?>

            <div class="ui horizontal list">
                <div class="item">
                    <img class="ui mini circular image" src="/OnlineChat/uploads/<?php if(!empty($item['file_name'])) {echo $item['file_name'];} else { echo '/1.jpg';} ?>">
                    <div class="content">
                        <div class="ui sub header"><?php echo $item['nameUser']; ?></div>
                        <button class="header" name="add"> <?php echo $item['nameTable']; ?></button>
                    </div>
                </div>
            </div>
            <?php echo form_close();
        endforeach;

    }
    ?>
</div>