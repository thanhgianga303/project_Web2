<?php 
session_start();

if(isset($_SESSION['login'])&&$_SESSION['login']==1){
?>
   <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xác Nhận Thông Tin Đặt Hàng</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="hidden" value="<?php echo $_SESSION['idUser']; ?>" id="hidden">
                        <label for="recipient-name" class="col-form-label" id="user_orders">Tài Khoản :</label>
                        <label for="recipient-name" id="getUsername" class="col-form-label"><?php echo $_SESSION['username']; ?></label>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label" id="email_orders">Email :</label>
                        <label for="recipient-name" id="getEmail" class="col-form-label"><?php echo $_SESSION['email']; ?></label>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label" id="num_orders" >Sđt :</label>
                        <label for="recipient-name" id="getSdt" class="col-form-label"><?php echo $_SESSION['sdt']; ?></label>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label" id="dChi" >Địa Chỉ Nhận Hàng:</label>
                        <input type="text" class="form-control" id="getDiaChi">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label" id="ghichu" >Ghi Chú:</label>
                        <textarea class="form-control" id="getGhiChu"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closedialog" onclick="closedialog()" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="xacnhan" onclick="xacnhan()">Xác Nhận</button>
            </div>
        </div>
    </div>
<?php
}
else 
{ 
?>
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn cần đăng nhập tài khoản</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closedialog" onclick="closedialog()" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="chuyensangdn" onclick="chuyensangdn()">Đăng Nhập</button>
            </div>
        </div>
    </div>
<?php
}
?>