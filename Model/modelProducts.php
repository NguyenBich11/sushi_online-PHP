<?php 
include_once("modelConnect.php");

    class modelProducts{
        public function mGetAllProducts($typeid = null) {
            $p = new modelConnect();
            $connect = $p->mOpenConnect();

            if(!$connect) {
                return null; //không thể kết nói database
            }

            if($typeid) {
                $selectSQL = "SELECT * FROM product WHERE typeOfProduct = $typeid;";
                $tblProduct = $connect->query($selectSQL);
    
                if($tblProduct->num_rows > 0) {
                    return $tblProduct; //có dữ liệu
                }else {
                    return null; //không có dữ liệu
                }
            }else {
                $selectSQL = "SELECT * FROM product";
                $tblProduct = $connect->query($selectSQL);
    
                if($tblProduct->num_rows > 0) {
                    return $tblProduct; //có dữ liệu
                }else {
                    return null; //không có dữ liệu
                }
            }

            $connect->mClose($connect);
        }

        public function mGetTypeOfProduct() {
            $p = new modelConnect();
            $connect = $p->mOpenConnect();

            if(!$connect) {
                return null; //không thể kết nối database  
            }

            $selectSQL = "SELECT * FROM typeofproduct";
            $tblTypeOfProduct = $connect->query($selectSQL);

            if($tblTypeOfProduct->num_rows > 0) {
                return $tblTypeOfProduct; //có dữ liệu của kiểu sản phầm
            }else {
                return null; //không có dữ liệu của kiểu sản phẩm
            }

            $connect->mClose($connect);
        }

        public function mSearch($prodcutSearch) {
            $p = new modelConnect();
            $conn = $p->mOpenConnect();

            if($conn) {
                $selectSQL = "SELECT * FROM `product` WHERE productname LIKE LOWER('%$prodcutSearch%');";
                $tblProduct = $conn->query($selectSQL);

                if($tblProduct->num_rows > 0) {
                    return $tblProduct;
                }else {
                    return null;
                }
            }else {
                return null;
            }
        }
    }
?>