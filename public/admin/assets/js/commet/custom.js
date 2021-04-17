(function($){
    $(document).ready(function(){

        // Logout form submit using jquery
        // =============================
        $('a#logout').click(function(e){

            e.preventDefault();

            $('form#logout_form').submit();

        });

        //CK-editor

        CKEDITOR.replace( 'ckeditor' );

            // select2

            $('.post_tag_select').select2();
        //image-preview

        $(document).on('change','input#fimg',function(e){
            e.preventDefault();
            let post_img_url =URL.createObjectURL(e.target.files[0]);
            $('img#feather_img').attr('src',post_img_url);
            $('#first').hide();
            $('#second').show();
        });

        // image gallery

        $('input#post_gallery_img').change(function(e){

            let g_img = '';
            for(let i=0;i<e.target.files.length;i++)
            {
                let post_img_url =URL.createObjectURL(e.target.files[i]);
                g_img += '<img class="shadow" src="'+post_img_url+'"> ';
                $('#first').hide();
                $('#second').show();

            }
            $('.gallery_image').html(g_img);
        })


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
           if(conf=true)
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


        //  post type select properties
        $('#post_format').change(function(){

            let format =$(this).val();

            if(format == 'image')
            {
                $('.standard_post').show();
            }
            else
            {
                $('.standard_post').hide();
            }

            if(format == 'gallery')
            {
                $('.gallery_post').show();
            }
            else
            {
                $('.gallery_post').hide();
            }

            if(format == 'video')
            {
                $('.video_post').show();
            }
            else
            {
                $('.video_post').hide();
            }

            if(format == 'audio')
            {
                $('.audio_post').show();
            }
            else
            {
                $('.audio_post').hide();
            }
        })

    });
    })(jQuery)
