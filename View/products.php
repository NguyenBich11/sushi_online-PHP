<div class="product-container">
    <div class="sidebar">
        <h3>Danh mục</h3>
        <ul>
            <?php 
                include_once("Controller/controllerProducts.php");
                echo '<li class="category"><a href="index.php?act=products">Tất cả</a></li>';

                $p = new controllerProducts();
                $rows = $p->cGetTypeOfProduct();

                if($rows) {
                    while($row = $rows->fetch_assoc()) {
                        echo '<li class="category"><a href="index.php?act=products&type='.$row['typeid'].'">'.$row['typename'].'</a></li>';
                    }
                }else {
                    echo '<li>Không có danh mục nào.</li>';
                }
            ?>
        </ul>
    </div>

    <div class="product-list" id="productGrid">
        <form method="get" name="formSearch" class="search-bar">
            <input type="hidden" name="act" value="products">
            <input type="text" name="txtSearch" placeholder="Nhập sản phẩm muốn tìm kiếm">
            <input type="submit" name="btnSearch" class="input-search" value="Tìm kiếm">
        </form>
        <div class="product-grid" id="productGrid">
            <?php
                include_once("Controller/controllerProducts.php");
                $p = new controllerProducts();
            
                // Nếu có từ khóa tìm kiếm -> Chỉ hiển thị kết quả tìm kiếm
                if (isset($_GET['txtSearch']) && !empty($_GET['txtSearch'])) {
                    $keyword = $_GET['txtSearch'];
                    $rs = $p->cSearch($keyword);
                    
                    if ($rs->num_rows > 0) {
                        while ($row = $rs->fetch_assoc()) {
                            $price = number_format($row['productprice']);

                            echo "<div class=\"product-item\">
                                    <img src=".$row['productimage']." alt=\"Sushi\">
                                    <h4>".$row['productname']."</h4>
                                    <p>Giá: ".$price." VNĐ</p>
                                    <button>Mua ngay</button>
                                </div>";
                        }
                    } else {
                        echo "<p>Không tìm thấy sản phẩm.</p>";
                    }
                    exit(); // Dừng script để tránh hiển thị toàn bộ sản phẩm
                }
            
                // Nếu không có tìm kiếm, hiển thị danh sách sản phẩm như bình thường
                $typeOfID = isset($_GET['type']) ? $_GET['type'] : 0;
                $rs = $p->cGetAllProducts($typeOfID);
            
                if ($rs->num_rows > 0) {
                    while ($row = $rs->fetch_assoc()) {
                        $price = number_format($row['productprice']);

                        echo "<div class=\"product-item\">
                                <img src=".$row['productimage']." alt=\"Sushi\">
                                <h4>".$row['productname']."</h4>
                                <p>Giá: ".$price." VNĐ</p>
                                <button>Mua ngay</button>
                            </div>";
                    }
                } else {
                    echo "<p>Không có sản phẩm.</p>";
                }
            ?>
        </div>
    </div>
</div>
<script>
    // Lấy tham số 'type' từ URL
    const params = new URLSearchParams(window.location.search);
    const currentType = params.get('type'); // Lấy giá trị type từ URL

    // Duyệt qua tất cả danh mục
    document.querySelectorAll(".category a").forEach(link => {
        const linkType = new URL(link.href).searchParams.get('type'); // Lấy type của từng danh mục
        
        if (linkType === currentType) {
            link.parentElement.classList.add("active"); // Thêm class active vào thẻ <li>
        }
    });
</script>
