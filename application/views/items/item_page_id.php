<?php if ($items[$id_item - 1]['active']==1) { ?>

    <h1>Item page - <?=$items[$id_item-1]['title']?></h1>
    <ul>
        <li>id - <?= $items[$id_item - 1]['id'] ?></li>
        <li>id - <?= $items[$id_item - 1]['title'] ?></li>
    </ul>


    <h2>Comments</h2>

    <?php
    $a = 0;
    foreach($comments as $comment):
        if ($comment['id_item'] == $items[$id_item - 1]['id']) {
            $a = $a + 1;
            $id_user=$comment['id_user'];
            ?>

            <ul>
                <li>
                    <div><?=$comment['id']?></div>
                    <div><?=$comment['id_item']?></div>
                    <div><?=$comment['id_user']?></div>
                    <div><?=$comment['text']?></div>
                    <div><?=$comment['date']?></div>
<!--                    <div><a href="/auth/user/--><?//=$comment['id_user']?><!--">--><?//=print_r($users[$id_user-1]->username)?><!--</a></div>-->
                </li>
            </ul>



        <?php } endforeach; ?>


    <?php if ($a==0) {?>
        No comments
    <?php } ?>

    <?php if ($this->ion_auth->logged_in()) { ?>

        <?php echo form_open('items/item/'.$id_item); ?>
        <h3>Add comments</h3><hr/>
        <?php if (isset($message)) { ?>
            <CENTER><h3 style="color:green;">Data inserted successfully</h3></CENTER><br>
        <?php } ?>

        <?php echo form_label('text :'); ?> <?php echo form_error('text'); ?><br />
        <?php echo form_textarea(array('id' => 'text', 'name' => 'text')); ?><br />


        <?php echo form_input(array('id' => 'id_user', 'name' => 'id_user', 'value' => $users->id, 'type' => 'hidden')); ?>
        <?php echo form_input(array('id' => 'id_item', 'name' => 'id_item', 'value' => $id_item, 'type' => 'hidden')); ?>
        <?php echo form_input(array('id' => 'date', 'name' => 'date', 'value' => date('Y-m-d'), 'type' => 'hidden')); ?>

        <?php echo form_input(array('id' => 'submit', 'type' => 'submit', 'name' => 'btn_comment', 'value' => 'Submit')); ?>
        <?php echo form_close(); ?><br/>

    <?php } else { ?>

        For add comment = ligin

    <?php } ?>





<?php } else { ?>

    This item active = 0 -(

<?php } ?>


