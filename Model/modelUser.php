<?php 
    include_once("modelConnect.php");

    class modelUser{
        public function mLogin($tdn, $mk) {
            $selectSQL = "SELECT * FROM user where username = '$tdn' and passw = '$mk'";
            $p = new modelConnect();
            $conn = $p->mOpenConnect();

            if ($conn) {
                return $conn->query($selectSQL);
            }else {
                return false;
            }

            $conn->mClose($conn);
        }

        public function mRegister($tdn, $mk) {
            $insertSQL = "INSERT INTO user(username, passw) VALUES ('$tdn', '$mk')";
            $p = new modelConnect();
            $conn = $p->mOpenConnect();

            if($conn) {
                return $conn->query($insertSQL); // true đăng ký thành công
            }else {
                return false; //false đk không thành công
            }

            $conn->mClose($conn);
        }

        public function mCheckRegister($tdn) {
            $selectSQL = "SELECT * FROM user where username = '$tdn'";
            $p = new modelConnect();
            $conn = $p->mOpenConnect();

            if($conn) {
                return $conn->query($selectSQL);
            }else {
                return false; // chưa có người dùng cho phép đăng ký
            }

            $conn->mClose($conn);
        }

        public function mGetAllProducts() {
            $p = new modelConnect();
            $conn = $p->mOpenConnect();

            if($conn) {
                $selectSQL = "SELECT * FROM product";
                $tblProduct = $conn->query($selectSQL);

                if($tblProduct->num_rows > 0) {
                    return $tblProduct;
                }else {
                    return null;
                }
            }else {
                return null;
            }

            $conn->mClose($conn);
        }
    }
?>