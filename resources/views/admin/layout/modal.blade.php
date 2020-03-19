<!-- Modal Popup --> 
<div class="modal popup-f fade" id="modal-pass">
  <div class="modal-dialog modal-menu-header">
    <div class="modal-content">
      <div class="modal-header header-form">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div class="text-center text-menu"><span>Đổi Mật Khẩu</span></div>
      </div>
      <div class="modal-body ct-form"> 
          <div class="contact-page">
          <div class="cp-right">
           <div class="contact-frm">
           <div class="output_pass"></div>
           <form id="frm-pass" action="" method="POST">
            <input id="csft_pass" type="hidden" name="_token" value="{{ csrf_token() }}">
                  @if(Auth::check())
                  <div class="form-group">
                    <label for="email">Tên đăng nhập</label>
                    <input type="text" class="form-control" value="{{Auth::user()->email}}" name="txtUser" id="txtUser" readonly="">
                  </div>
                  @endif
                  <div class="form-group">
                    <label for="pwd">Mật khẩu cũ</label>
                    <input type="password" class="form-control" name="txtCurPass" id="txtCurPass">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Mật khẩu mới</label>
                    <input type="password" class="form-control" name="txtNewPass" id="txtNewPass">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Nhập lại mật khẩu mới</label>
                    <input type="password" class="form-control" name="txtReNewPass" id="txtReNewPass">
                  </div>
                  <button id="btn-pass" type="submit" class="btn btn-default">Lưu</button>
                </form>
            </div>
          </div>
      </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Popup -->