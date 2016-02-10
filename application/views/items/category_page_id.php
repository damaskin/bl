

<?php
$a = 0;
foreach($items as $item):
        if ($item['category_id'] == $id_item) {
            $a = $a + 1;
    ?>

    <ul>
        <li>
            <div><?=$item['id']?></div>
            <div><?=$item['user_id']?></div>
            <div><?=$item['category_id']?></div>
            <div><a href="/items/item/<?=$item['id']?>"><?=$item['title']?></a></div>
            <div><?=$item['text']?></div>
            <div><?=$item['date']?></div>
            <div><?=$item['active']?></div>
            <div><a href="/auth/user/<?=$item['user_id']?>"><?=$user[$item['user_id']-1]->username;?></a></div>
        </li>
    </ul>



<?php } endforeach; ?>

<?php if ($a==0) {?>
    Not items for id = <?=$id_item?>
<?php } ?>


<!--    --><?php //if(isset($items)) { ?>
<?//=print_r($items[$id_item]['category_id'])?><!--<Br/>-->
<!--            <div>Not items for id = --><?//=$id_item?><!--</div>-->
<!---->
<?php //} else {
//        echo 'error';
//    } ?>
