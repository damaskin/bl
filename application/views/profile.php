<?php
if (!$this->ion_auth->logged_in())
{
    echo "No login";
} else {?>

    <ul>
        <li>[id]-<?=$users->id;?></li>
        <li>[ip_address]-<?=$users->ip_address;?></li>
        <li>[username]-<?=$users->username;?></li>
        <li>[password]-<?=$users->password;?></li>
        <li>[salt]-<?=$users->salt;?></li>
        <li>[email]-<?=$users->email;?></li>
        <li>[activation_code]-<?=$users->activation_code;?></li>
        <li>[forgotten_password_code]-<?=$users->forgotten_password_code;?></li>
        <li>[remember_code]-<?=$users->remember_code;?></li>
        <li>[created_on]-<?=$users->created_on;?></li>
        <li>[last_login]-<?=$users->last_login;?></li>
        <li>[active]-<?=$users->active;?></li>
        <li>[first_name]-<?=$users->first_name;?></li>
        <li>[last_name]-<?=$users->last_name;?></li>
        <li>[company]-<?=$users->company;?></li>
        <li>[phone]-<?=$users->phone;?></li>
    </ul>

    <?php
}
?>

