<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-6" aria-expanded="false"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="<?= base_url() ?>">BlackList</a></div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
            <ul class="nav navbar-nav">
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li><a href="<?= base_url() ?>auth/user_list">Users list</a></li>
                <li><a href="/items/add">Add item</a></li>
            </ul>

            <!--Проверяем если вошли-->
            <?php if (!$this->ion_auth->logged_in()) { ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?= base_url() ?>auth/login">Login</a></li>
<!--                    <li><a href="#" data-toggle="modal" data-target="#login_modal">Login</a></li>-->
                    <li><a href="<?= base_url() ?>auth/create_user">Registration</a></li>

                </ul>
            <?php } else { ?>
                <ul class="nav navbar-nav navbar-right">

                    <?//= $users->id; ?>
                    <!--<p class="navbar-text">Hello, </p>-->
                    <li><a href="/auth/profile"><?=$users->id;?> - <?=$users->first_name;?> <?=$users->last_name;?></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            User menu
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/auth/profile">My Profile</a></li>
                            <li><a href="/auth/edit_user/<?=$users->id;?>">Edit Profile</a></li>
                            <li><a href="/auth/change_password">Change Password</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/auth/logout">Logout</a></li>
                        </ul>
                    </li>

                </ul>
            <?php } ?>

        </div>

    </div>
</nav>

<div class="container">

<?//=$login_modal_form?>