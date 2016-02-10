<table class="table table-striped" cellpadding=0 cellspacing=10>
    <tr>
        <th>#</th>
        <th>Name</th>

        <th>Email</th>
        <th>Group</th>
    </tr>
    <?php foreach ($users as $user):?>
        <tr>
            <td><?php echo $user['id']?></td>
            <td><a href="/auth/user/<?php echo $user['id']?>"><?php echo $user['first_name']?> <?php echo $user['last_name']?></a></td>

            <td><?php echo $user['email'];?></td>
            <td><?php echo $user['group_description'];?></td>

        </tr>
    <?php endforeach;?>
</table>