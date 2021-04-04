(function($){
    $(document).ready(function(){

        // Logout form submit using jquery
        // =============================
        $('a#logout').click(function(e){

            e.preventDefault();

            $('form#logout_form').submit();

        });


    });
    })(jQuery)
