<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login & Signup Form</title>
    <link rel="stylesheet" href="style/dangnhap-dangky.css" />
</head>

<body>
    <?php
    include 'connect.php';
    $username = '';
    // kiem tra nguoi dung da dang nhap chua bang cach kiem tra seesion da ton tai chua 
    if (isset($_SESSION['dang_ky'])) {
        header('location: trangchu_banhang.php');
    }
    // neu chua dang nhap thi kiem tra nguoi dung cos click vao nut login khoong 
    if (isset($_POST['btn-dangnhap'])) {
        // lay gia tri
        $username = $_POST['user'];
        $password = $_POST['pass'];

        // khai bao 1 mang chua cac loi
        $loi = array();
        if ($username == '') {
            $loi['username'] = 'Tên đăng nhập không được để trống...';
        }
        // kiem tra pass co de trong hay khong 
        if ($password == '') {
            $loi['password'] = 'Mật khẩu không được để trống...';
        }
        // 2 o khong rong
        if (!$loi) {
            //kiem tra ten dang nhap co ton tai khong 
            $sql = "SELECT * FROM dang_ky WHERE username = '$username' AND password = '$password'";
            $user = mysqli_query($conn, $sql);
            if (mysqli_num_rows($user) > 0) {
                $_SESSION['dang_ky'] = $username;
                header('location: trangchu_banhang.php');
            } else {
                $loi['passanduser'] = "Tên đăng nhập hoặc mật khẩu không đúng!";
            }
        }

    }
    ?>

    <section class="wrapper">
        <div class="form login">
            <header>Đăng Nhập</header>
            <form action="#" method="POST">
                <input type="text" placeholder="Tên đăng nhập..." name="user" value="<?php echo $username?>"/>
                <?php if (isset($loi['username'])) { ?>
                    <p style="color: red">
                        <?php echo $loi['username']; ?>
                    </p>
                <?php } ?>
                <input type="password" placeholder="Nhập mật khẩu..." name="pass" />
                <?php if (isset($loi['password'])) { ?>
                    <p style="color: red">
                        <?php echo $loi['password']; ?>
                    </p>
                <?php } ?>

                <?php if (isset($loi['passanduser'])) { ?>
                    <p style="color: red">
                        <?php echo $loi['passanduser']; ?>
                    </p>
                <?php } ?>
                <a href="#">Quên mật khẩu?</a>
                <input class="buton" name="btn-dangnhap" type="submit" value="Đăng Nhập" />
            </form>
        </div>



        <?php
        include 'connect.php';
        $usernamedk = '';
        $emailsdtdk = '';
        //kiem tra nguoi dung cos click vao nut dang ky khoong 
        if (isset($_POST['btn-dangky'])) {
            // lay gia tri
            $usernamedk = $_POST['user_dk'];
            $emailsdtdk = $_POST['email_sdt'];
            $passworddk = $_POST['pass_dk'];
            $rpassworddk = $_POST['r_pass_dk'];
            // khai bao 1 mang chua cac loi
            $loi = array();
            if ($usernamedk == '') {
                $loi['usernamedk'] = 'Tên đăng nhập không được để trống...';
            }
            if ($emailsdtdk == '') {
                $loi['emailsdt'] = 'email hoặc sdt không được để trống...';
            }
            // kiem tra pass co de trong hay khong, pass co bang 8 so khong, pass co kkhac rpass khong
            if ($passworddk == '') {
                $loi['passworddk'] = 'Mật khẩu không được để trống...';
            }
            elseif (strlen($passworddk) < 8) {
                $loi['passworddk'] = 'Mật khẩu ít nhất 8 ký tự..';
            }
            if ($rpassworddk == '') {
                $loi['rpassworddk'] = 'Mật khẩu không được để trống...';
            }
            elseif ($passworddk != $rpassworddk) {
                $loi['passworddk'] = 'Mật khẩu không khớp...';
            }

            if (!$loi) {
                // mã hóa mật khẩu
                $passworddk = md5($passworddk);
                // sql
                $sql = "INSERT INTO dang_ky(username, email_sdt, password) VALUES
                ('$usernamedk', '$emailsdtdk', '$passworddk')";
                $user = mysqli_query($conn, $sql);
                echo "<script>alert('Đăng ký thành công.'); window.location.assign('dangnhap-dangky.php');</script>";
            }
        }
        ?>


        <div class="form signup">
            <header>Đăng Ký</header>
            <form action="#" method="POST">
                <input type="text" placeholder="Tên đăng nhập..." name="user_dk" value="<?php echo $usernamedk?>"/>
                <?php if (isset($loi['usernamedk'])) { ?>
                    <p style="color: red">
                        <?php echo $loi['usernamedk']; ?>
                    </p>
                <?php } ?>
                <input type="text" placeholder="Nhập email hoặc số điện thoại..." name="email_sdt" value="<?php echo $emailsdtdk?>"/>
                <?php if (isset($loi['emailsdt'])) { ?>
                    <p style="color: red">
                        <?php echo $loi['emailsdt']; ?>
                    </p>
                <?php } ?>
                <input type="password" placeholder="Nhập mật khẩu..." name="pass_dk" />
                <?php if (isset($loi['passworddk'])) { ?>
                    <p style="color: red">
                        <?php echo $loi['passworddk']; ?>
                    </p>
                <?php } ?>
                <input type="password" placeholder="Nhập lại mật khẩu..." name="r_pass_dk" />
                <?php if (isset($loi['rpassworddk'])) { ?>
                    <p style="color: red">
                        <?php echo $loi['rpassworddk']; ?>
                    </p>
                <?php } ?>

                <?php if (isset($loi['passanduser'])) { ?>
                    <p style="color: red">
                        <?php echo $loi['passanduser']; ?>
                    </p>
                <?php } ?>
                <div class="checkbox">
                    <input type="checkbox" id="signupCheck" />
                    <label for="signupCheck">Đồng ý với điều khoản và sử dụng.</label>
                </div>
                <input class="buton" name="btn-dangky" type="submit" value="Đăng ký" />
            </form>
        </div>


        <script>
            const wrapper = document.querySelector(".wrapper"),
                loginHeader = document.querySelector(".login header"),
                signupHeader = document.querySelector(".signup header");


            loginHeader.addEventListener("click", () => {
                wrapper.classList.add("active");
            });
            signupHeader.addEventListener("click", () => {
                wrapper.classList.remove("active");
            });
        </script>
    </section>
</body>

</html>