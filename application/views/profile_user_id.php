<?php if (isset($data_users[$id_user-1])) {?>

<h1>Profile user - <?php echo $data_users[$id_user-1]->username; ?></h1>

<div>Data user:</div>
<ul>
    <li>id - <?php echo $data_users[$id_user-1]->id; ?></li>
    <li>group_id - <?php echo $data_users[$id_user-1]->group_id; ?></li>
    <li>username - <?php echo $data_users[$id_user-1]->username; ?></li>
    <li>email - <?php echo $data_users[$id_user-1]->email; ?></li>
</ul>

<?php } else { ?>
    Error! This user does not exist.
<?php } ?>
<?php
//
//print_r($data_users[$id_user-1]->username);
//
//?>
