(function($){
    $(document).ready(function(){

        // Logout form submit using jquery
        // =============================
        $('a#logout').click(function(e){

            e.preventDefault();

            $('form#logout_form').submit();

        });


        $(document).on('click','input.check',function(){

                let $checked = $(this).attr('checked');
                let $status_id = $(this).attr('status_id');
                if($checked =="checked")
                {
                   $.ajax({
                       url:'postcat/statusInactive/'+$status_id,
                       success:function(data){
                           swal('status Inactive Successfully');
                       },
                   })
                }
                else{
                    $.ajax({
                        url:'postcat/statusActive/'+$status_id,
                        success:function(data){
                            swal('status active Successfully');
                        },
                    })
                }


        });

        // delete fix
        $('.del_button').click(function(){
           let conf= confirm('Ary you sure');
           if(conf==true)
           {
               return true;
           }
           else{
               return false;
           }

        });


    });
    })(jQuery)
