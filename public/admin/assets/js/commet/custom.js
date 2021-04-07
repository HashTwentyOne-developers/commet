(function($){
    $(document).ready(function(){

        // Logout form submit using jquery
        // =============================
        $('a#logout').click(function(e){

            e.preventDefault();

            $('form#logout_form').submit();

        });

        // post category status

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



        //  Category delete fix
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

        /**
         *  Category Update Model Show
         */

            $('.update_cat').click(function(e){
                e.preventDefault();

               $id = $(this).attr('edit_id');
               $.ajax({
                url:'postcat/'+ $id+'/edit',
                success:function(data){

                    $('#edit_cat_modal form input[name="cat_name"]').val(data.name);
                    $('#edit_cat_modal form input[name="cat_id"]').val(data.id);
                    $('#edit_cat_modal').modal('show');

                }


                  });

            });



            //post tag status

            $(document).on('click','input.check',function(){

                let $checked = $(this).attr('checked');
                let $status_id = $(this).attr('status_id');
                if($checked =="checked")
                {
                   $.ajax({
                       url:'post-tag/statusInactive/'+$status_id,
                       success:function(data){
                           swal('status Inactive Successfully');
                       },
                   })


                }
                else{
                    $.ajax({
                        url:'post-tag/statusActive/'+$status_id,
                        success:function(data){
                            swal('status active Successfully');
                        },
                    })
                }


        });

         /**
         *  Post Tag Update Model Show
         */

          $('.update_tag').click(function(e){
            e.preventDefault();

           $id = $(this).attr('edit_id');
           $.ajax({
            url:'post-tag/'+ $id+'/edit',
            success:function(data){


                $('#edit_tag_modal form input[name="tag_name"]').val(data.name);
                $('#edit_tag_modal form input[name="tag_id"]').val(data.id);
                $('#edit_tag_modal').modal('show');

            }


              });

        });

         // post Tag delete fix
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
