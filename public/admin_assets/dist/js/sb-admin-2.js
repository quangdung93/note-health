$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }

    $('button[type="submit"]').click(function(){
        setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000);
    });

    setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000);

    
    


    //Ajax Đổi mật khẩu
    $('#btn-pass').click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers:{'X-CSRF-TOKEN':$('#csft_pass').val()}
            });
            var curPass = $('#txtCurPass').val();
            var newPass = $('#txtNewPass').val();
            var newRePass = $('#txtReNewPass').val();
            if(curPass == ""){
                $('.output_pass').html('<div class="alert alert-danger" role="alert">Bạn chưa nhập mật khẩu cũ!</div>');
                return false;
            }
            else if(newPass < 6){
                $('.output_pass').html('<div class="alert alert-danger" role="alert">Mật khẩu mới phải ít nhất 6 ký tự!</div>');
                return false;
            }
            else if(newRePass != newPass){
                $('.output_pass').html('<div class="alert alert-danger" role="alert">Mật khẩu không trùng khớp!</div>');
                return false;
            }
            else{
                $.ajax({
                    method:'POST',
                    url:'change-password.html',
                    data:{curPass:curPass,newRePass:newRePass},
                    dataType:'json',
                    success:function(data){
                        console.log(data);
                        if(data.result == true){
                            $('.output_pass').html(data.message);
                            $('#frm-pass')[0].reset();
                        }
                        else{
                            $('.output_pass').html(data.message);
                        }
                        
                    },
                });
            }
        });


    
    
});
