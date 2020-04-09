<div class="row">
    <div class="col-md-12">

        <form  action="/panel/viewticket/?id=<?=$tickets['id']?>" method="post" data-fouc>


        <!-- Messages -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <a href="/panel/ticket" class="btn btn-light"><i class="icon-square-left mr-2"></i> НАЗАД</a>
                <h5 class="card-title">Тикет <?=$tickets['zagolovok']?></h5>

                <div class="header-elements">

                    <?php if($tickets['status'] == 2):?>
                        <span class="badge badge-secondary">ТИКЕТ ЗАКРЫТ</span>
                    <?php endif;?>


                    <?php if($tickets['status'] == 1):?>
                    <a href="/panel/viewticket/?id=<?=$tickets['id']?>&action=close"  class="btn bg-warning btn-labeled btn-labeled ml-auto"><i class="icon-magic-wand mr-2"></i> ЗАКРЫТЬ ТИКЕТ</a>
                    <?php endif;?>

                </div>



            </div>

            <div class="card-body">
                <ul class="media-list media-chat media-chat-scrollable mb-3">


<!--                    <li class="media content-divider justify-content-center text-muted mx-0">Today</li>-->


                    <?php

                    foreach ($messages as $key=>$val){

                        if ($val['author'] == "me"){
                            ?>


                            <li class="media">
                                <div class="mr-3 align-self-center">
                                    <img src="<?=$_SESSION['ulogin']['avatar']?>" class="rounded-circle" width="40" height="40" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="font-size-sm text-muted mt-2"><b><?=$_SESSION['ulogin']['username']?></b> - <?=$val['date']?><br>
                                    <div class="media-chat-item"><?=$val['message']?></div>

                                    </div>
                                </div>
                            </li>



                            <?php
                        }



                        if ($val['author'] == "admin"){
                            ?>

                            <li class="media">
                                <div class="mr-3 align-self-center">
                                    <img src="/global_assets/images/placeholders/placeholder.jpg" class="rounded-circle" width="40" height="40" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="font-size-sm text-muted mt-2"><b>Тех. поддержка</b> - <?=$val['date']?><br>
                                    <div class="bg-primary  media-chat-item"><?=$val['message']?></div>
                                </div>
                            </li>


                            <?php
                        }






                    }


                    ?>




                </ul>






                <textarea name="enter-message" class="form-control mb-3" rows="3" cols="1" placeholder="Ваше ответ..."></textarea>
                <div class="align-items-left">
                    <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-auto"><b><i class="icon-paperplane"></i></b> Отправить сообщение</button>



                </div>





            </form>


            </div>
        </div>
        <!-- /messages -->



    </div>




</div>