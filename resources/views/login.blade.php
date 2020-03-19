<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="{{ asset('') }}">
  <title>Đăng Nhập</title>
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/login.css" media="screen" type="text/css" />
   <link rel="apple-touch-icon" href="admin_temp/img/iphone.ico">
</head>
<body>
  <span href="#" class="button" id="toggle-login">Đăng Nhập</span>
<div id="login">
  
    <div class="output-login"></div>
  <div id="triangle"></div>
  <h1 class="dectec-mobile">Bệnh Viện Thẩm Mỹ JW Hàn Quốc</h1>
  <form action="" method="POST">
        <input id="csft_pass" type="hidden" name="_token" value="{{ csrf_token() }}">
        <input id="email" type="text" placeholder="Email" name="txtEmail"/>
        <input id="password" type="password" placeholder="Mật khẩu" name="txtPassword"/>
        <input id="submit" name="submit_name" type="submit" value="Đăng Nhập" />
  </form>
</div>
  <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script src="js/login.js"></script>
  <script>
    $('#submit').click(function(e){
      e.preventDefault();
      $.ajaxSetup({
        headers:{'X-CSRF-TOKEN':$('#csft_pass').val()}
      });
      let email = $('#email').val();
      let password = $('#password').val();
      if(email == ""){
        $('.output-login').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Bạn chưa nhập mật email!</div>');
        return false;
      }
      else if(password == ""){
        $('.output-login').html('<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Bạn chưa nhập mật khẩu!</div>');
        return false;
      }
      $.ajax({
        method: 'POST',
        url: '{!! route('login') !!}',
        data:{email:email,password:password},
        dataType:'json',
        success:function(data){
          if(data.result == true){
            window.location.href = data.url;
          }
          else{
            $('.output-login').html(data.message);
          }
        }
      });
    });
  </script>
</body>
</html>

