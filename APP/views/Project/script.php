<div class="card">
    <div class="card-header bg-dark text-white header-elements-inline">
        <h5 class="card-title">СКРИПТ РАЗГОВОРА</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
            </div>
        </div>
    </div>

    <div class="card-body justify-content-center">

        <div class="form-group">
            <button type="button" id="save" class="btn btn-success"><i class="icon-checkmark3 mr-2"></i> Сохранить</button>
            <button type="button" id="edit" class="btn btn-warning"><i class="icon-pencil3 mr-2"></i> Редактировать</button>
        </div>


        <div class="click2edit">

            <?=$script?>






        </div>


    </div>


</div>


<script>

    // Edit
    $('#edit').on('click', function() {
        $('.click2edit').summernote({focus: true});
    })

    // Save
    $('#save').on('click', function() {

        var textsc =  $('.click2edit').summernote('code');
        textsc = encodeURIComponent(textsc);
        str = '&script=' + textsc + '&idc=' + <?=$company['id']?>

        $.ajax(

            {
                url : '/project/script/?id=<?=$company['id']?>',
                type: 'POST',
                data: str,
                cache: false,
                success: function( result ) {

                    console.log(result);
                }


            }

        );



        $('.click2edit').summernote('destroy');


    });



</script>