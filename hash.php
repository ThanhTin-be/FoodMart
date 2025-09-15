<!-- Test tạo mk dạng hash để bảo mật -->
 <?php
$password = "123"; // mật khẩu gốc bạn muốn test
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Mật khẩu gốc: $password <br>";
echo "Hash sinh ra: $hash";
