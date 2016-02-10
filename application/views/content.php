
<script>
//    $(function(){
//
//
//        var item_id = 33;
//        var user_id =  '127.0.0.1';
//
//        $('.like-btn').click(function(){
//            alert('like');
//            $('.dislike-btn').removeClass('dislike-h');
//            $(this).addClass('like-h');
//            $.ajax({
//                type:"POST",
//                url:"rating/post",
//                data:{btn: 'like', ip: user_id, id_item: item_id},
//                cache:false,
//                success:
//                    function(){
//                        alert(1);  //as a debugging message.
//                    }
//            });
//
//        });
//        $('.dislike-btn').click(function(){
//            alert('dislike');
//            $('.like-btn').removeClass('like-h');
//            $(this).addClass('dislike-h');
//            $.ajax({
//                type:"POST",
//                url:"rating/post",
//                data:{btn: 'dislike', ip: user_id, id_item: item_id},
//                cache:false,
//                success:
//                    function(){
//                        alert(2);  //as a debugging message.
//                    }
//            });
//
//        });
//
//
//    });
</script>

<hr/>
<div class="row">
    <div class="col-xs-4">
        <?php foreach($categories as $category): ?>
                <ul>
                    <li>
<!--                        <div>--><?//=$category['id']?><!--</div>-->
<!--                        <div>--><?//=$category['id_category']?><!--</div>-->
                            <div><a href="items/category/<?=$category['id_category']?>"><?=$category['id_category']?> <?=$category['title_category']?></a></div>
<!--                        <div>--><?//=$category['active']?><!--</div>-->
                    </li>
                </ul>
            <?php endforeach; ?>
    </div>
    <div class="col-xs-8">

        <?php
        $a = 0;

        foreach($items as $item):?>


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
                        <div><a href="/items/item/<?=$item['id']?>">Details</a></div>
                        <div style="color: red;">

                            <?php



                                $this->db->where('ip', $users->id);
                                $this->db->where('id_item', $item['id']);
                                $this->db->where('rate', '2');
                                $query = $this->db->get('ratings');

                                $row_like = $query->num_rows();

                                echo $row_like;

                                $this->db->where('ip', $users->id);
                                $this->db->where('id_item', $item['id']);
                                $this->db->where('rate', '1');
                                $query = $this->db->get('ratings');

                                $row_dislike = $query->num_rows();

                                echo $row_dislike;




                            ?>



                            <div class="clear"></div>
                            <div class="

                            like-btn
                            <?php if($row_like == 1){ echo 'like-h like-h_'.$item['id'];} ?>
                            <?php if($row_like == 0){ echo 'like-btn_'.$item['id'];} ?>
                            ">Like</div>
                            <div class="
                            dislike-btn
                            <?php if($row_dislike == 1){ echo 'dislike-h dislike-h_'.$item['id'];} ?>
                            <?php if($row_dislike == 0){ echo 'dislike-btn_'.$item['id'];} ?>
                            "></div>
                            <div class="clear"></div>

                        </div>
                        <hr/>
                    </li>
                </ul>


            <?php if (!$this->ion_auth->logged_in()) { ?>
            <script>
                $(function(){
                    var item_id = <?=$item['id']?>;


                    $('.like-btn_'+item_id).click(function(){
                        alert('Голосовать можно только авторезированным пользователям.');
                        return false;
                    });
                    $('.dislike-btn_'+item_id).click(function(){
                        alert('Голосовать можно только авторезированным пользователям!');
                        return false;
                    });
                });
            </script>
            <?php } else { ?>

            <script>
                $(function(){
                    var item_id = <?=$item['id']?>;
                    var user_id =  <?=$users->id;?>;


                    $('.like-btn_'+item_id).click(function(){
                        //alert('like');
                        $('.dislike-btn').removeClass('dislike-h');
                        $(this).addClass('like-h');

                        if (!$(this).hasClass("active")) {
                            $.ajax({
                                type:"POST",
                                url:"items/post_raiting",
                                data:{btn: 'like', ip: user_id, id_item: item_id},
                                cache:false
                            });
                        }
                        $(this).addClass('active');



                    });
                    $('.dislike-btn_'+item_id).click(function(){
                        //alert('dislike');
                        $('.like-btn').removeClass('like-h');
                        $(this).addClass('dislike-h');


                        if (!$(this).hasClass("active")) {
                            $.ajax({
                                type:"POST",
                                url:"items/post_raiting",
                                data:{btn: 'dislike', ip: user_id, id_item: item_id},
                                cache:false
                            });
                        }
                        $(this).addClass('active');

                    });



                    //DELETE

                    $('.like-h_'+item_id).click(function(){
                        //alert('like');
                        $('.dislike-btn').removeClass('dislike-h');
                        $(this).addClass('like-h');
                        $.ajax({
                            type:"POST",
                            url:"items/del_raiting",
                            data:{btn: 'like', ip: user_id, id_item: item_id},
                            cache:false
                        });

                    });
                    $('.dislike-h_'+item_id).click(function(){
                        //alert('dislike');
                        $('.like-btn').removeClass('like-h');
                        $(this).addClass('dislike-h');
                        $.ajax({
                            type:"POST",
                            url:"items/del_raiting",
                            data:{btn: 'dislike', ip: user_id, id_item: item_id},
                            cache:false
                        });

                    });




                });
            </script>

            <?php } ?>

            <!-- RATING -->





            <!-- END RATING -->



            <?php endforeach; ?>


    </div>
</div>


