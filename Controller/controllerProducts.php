<?php 
include_once("Model/modelProducts.php");

    class controllerProducts{
        public function cGetAllProducts($typeid) {
            $p = new modelProducts();
            $tblProduct = $p->mGetAllProducts($typeid);

            if($tblProduct) {
                return $tblProduct;
            }else {
                return null;
            }
        }

        public function cGetTypeOfProduct() {
            $p = new modelProducts();
            $tblProduct = $p->mGetTypeOfProduct();

            if($tblProduct) {
                return $tblProduct;
            }else {
                return null;
            }
        }

        public function cSearch($prodcutSearch) {
            $contentSearch = strtolower($prodcutSearch);
            $p = new modelProducts();
            $tblProduct = $p->mSearch($contentSearch);

            if($tblProduct) {
                return $tblProduct;
            }else {
                return null;
            }
        }
    }
?>