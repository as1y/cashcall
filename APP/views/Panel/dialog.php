<div class="card">
    <div class="card-header bg-dark text-white header-elements-inline">
        <h6 class="card-title">МОИ ДИАЛОГИ</h6>

    </div>



    <div class="card-body justify-content-center text-center-end">


        <table  class="table datatable-basic text-center">
            <thead>
            <tr>
                <th>Имя Фамилия</th>
                <th>Дата</th>
                <th>Сообщение</th>
                <th>Кол-во</th>
                <th>Действие</th>

            </tr>
            </thead>


            <tbody>


            <?php foreach ($dialogsinfo as $key=>$val):?>

                <tr>

                    <td>

                        <?php
                        $sobesednik =   \APP\models\Panel::lookingsobesednik($val);
                        ?>

                        <img src="<?=$sobesednik['avatar']?>" width="38" height="38" class="rounded-circle" alt="">
               <a class="breadcrumb-elements-item" href="<?=generateprofilelink($sobesednik)?>" target="_blank"><?=$sobesednik['username']?></a>
                    </td>

                    <td class="text-center">
                        <?=$val['date']?>
                    </td>


                    <td class="text-center">
                        <?=$val['zagolovok']?>
                    </td>


                    <td class="text-center">


                        <?php
                        if (empty($val['messages'])) {
                            $val['messages'] = [];
                            $countv = 0;
                        }else{
                            $countv = count(json_decode($val['messages'], true));
                        }




                        ?>

                        <a href="/panel/messages/?idd=<?=$val['id']?>" class="badge bg-dark badge-pill"><?=$countv?> </a>

                        <?php if ($val['uvedomlenie'] == $_SESSION['ulogin']['id']):?>
                            <span class="badge badge-danger">NEW</span>
                        <?php endif;?>


                    </td>
                    <td class="text-center">
                        <a href="/panel/messages/?idd=<?=$val['id']?>" type="button" class="btn btn-success"><i class="icon-comment-discussion mr-2"></i>ОТВЕТИТЬ</a>
                    </td>
                </tr>


            <?php endforeach;?>








            </tbody>
        </table>



    </div>
</div>