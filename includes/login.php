<?php
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "SELECT EmailId,Password,FullName FROM tblusers WHERE EmailId=:email";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetch(PDO::FETCH_OBJ);
  if ($query->rowCount() > 0) {
    if (password_verify($password, $results->Password)) {
      $_SESSION['login'] = $_POST['email'];
      $_SESSION['fname'] = $results->FullName;
      $currentpage = $_SERVER['REQUEST_URI'];
      echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
    } else {
      echo "<script>alert('Mật khẩu không chính xác!');</script>";
    }
  } else {
    echo "<script>alert('Tài khoản không tồn tại!');</script>";
  }
}
?>

<div class="modal fade" id="loginform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Đăng nhập</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="login_wrap">
            <div class="col-md-12 col-sm-6">
              <form method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email*">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Mật khẩu*">
                </div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="remember">

                </div>
                <div class="form-group">
                  <input type="submit" name="login" value="Đăng nhập" class="btn btn-block">
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Bạn chưa có tài khoản? <a href="#signupform" data-toggle="modal" data-dismiss="modal"> Đăng ký tại đây</a></p>
        <p><a href="" data-toggle="modal" data-dismiss="modal">Quên mật khẩu?</a></p>
      </div>
    </div>
  </div>
</div>