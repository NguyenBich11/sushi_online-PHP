<?php 
    include("Model/modelUser.php");

    class controllerUser{
        public function cLogin($tdn, $mk) {
            $p = new modelUser();
            $passw = md5($mk);
            $tbl = $p->mLogin($tdn, $passw);

            if(!$tbl) {
                echo "<script>alert('Lỗi kết nối')</script>";
            }elseif($tbl->num_rows > 0) {
                echo "<script>alert('Đăng nhập thành công!')</script>";
                $_SESSION['login'] = true;
                header("Location: index.php");
                exit();
            }else {
                echo "<script>alert('Sai thông tin đăng nhập!')</script>";
            }
        }

        public function cRegister($tdn, $mk) {
            $p = new modelUser();
            $passw = md5($mk);
            $checkUser = $p->mCheckRegister($tdn);
            
            if($checkUser->num_rows > 0) {
                echo "<script>alert('Đã có người dùng')</script>";
            }else {
                $user = $p->mRegister($tdn, $passw);

                if($user) {
                    echo "<script>alert('Đăng ký thành công')</script>";
                }else {
                    echo "<script>alert('Lỗi kết nối')</script>";
                }
            }
        }

        public function cGetAllProducts(){
            $p = new modelUser();
            $tblProduct = $p->mGetAllProducts();

            if($tblProduct) {
                return $tblProduct;
            }else {
                return null;
            }
        }
    }
?>