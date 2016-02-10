
<?php echo form_open('items/add'); ?>
<h1>Insert Data Into Database Using CodeIgniter</h1><hr/>
<?php if (isset($message)) { ?>
    <CENTER><h3 style="color:green;">Data inserted successfully</h3></CENTER><br>
<?php } ?>
<?php echo form_label('Title :'); ?> <?php echo form_error('title'); ?><br />
<?php echo form_input(array('id' => 'title', 'name' => 'title')); ?><br />

<?php echo form_label('Category :'); ?> <?php echo form_error('category'); ?><br />
<?php echo form_input(array('id' => 'category', 'name' => 'category')); ?><br />

<?php echo form_label('Location :'); ?> <?php echo form_error('location'); ?><br />
<?php echo form_input(array('id' => 'location', 'name' => 'location')); ?><br />

<?php echo form_label('text :'); ?> <?php echo form_error('text'); ?><br />
<?php echo form_textarea(array('id' => 'text', 'name' => 'text')); ?><br />


<?php echo form_input(array('id' => 'user_id', 'name' => 'user_id', 'value' => $users->id)); ?><br />

<?php echo form_submit(array('id' => 'submit', 'value' => 'Submit')); ?>
<?php echo form_close(); ?><br/>


