<div class="product-container">
    <div class="sidebar">
        <h3>Danh mục</h3>
        <ul>
            <?php 
                include_once("Controller/controllerProducts.php");

                $p = new controllerProducts();
                $rows = $p->cGetTypeOfProduct();

                if($rows) {
                    while($row = $rows->fetch_assoc()) {
                        echo '<li><a href="index.php?act=products&type='.$row['typeid'].'">'.$row['typename'].'</a></li>';
                    }
                }else {
                    echo '<li>Không có danh mục nào.</li>';
                }
            ?>
        </ul>
    </div>

    <div class="product-list">
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Tìm kiếm sản phẩm...">
            <button onclick="searchProducts()">Tìm kiếm</button>
        </div>

        <div class="product-grid" id="productGrid">
            <?php 
                include_once("Controller/controllerProducts.php");

                $p = new controllerProducts();
                $typeOfID = isset($_GET['type']) ? $_GET['type'] : 0;

                $rs = $p->cGetAllProducts($typeOfID);

                if($rs) {
                    while($row = $rs->fetch_assoc()) {
                        echo "<div class=\"product-item\">
                                <img src=".$row['productimage']." alt=\"Sushi\">
                                <h4>".$row['productname']."</h4>
                                <p>Giá: ".$row['productprice']."</p>
                                <button>Mua ngay</button>
                            </div>
                        ";
                    }
                }else {
                    echo '<p>Không có sản phẩm.</p>';
                }
            ?> 
        </div>
    </div>
</div>
