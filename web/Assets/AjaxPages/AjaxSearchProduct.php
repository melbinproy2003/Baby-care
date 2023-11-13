<?php 
session_start();
include("../Connection/Connection.php");
?>
<?php

    if ($_GET["action"] != "") {

        $sqlQry = "select * from tbl_product a inner join tbl_subcategory s on s.subcategory_id=a.subcategory_id inner join tbl_category c on c.category_id=s.category_id inner join tbl_brands b on a.brand_id=b.brand_id where true";

        if ($_GET["name"]!="") {

            $name = $_GET["name"];
 
             $sqlQry .= " AND product_name  LIKE '".$name."%'";
         }
        if ($_GET["brand"]!="") {

           $brand = $_GET["brand"];

            $sqlQry .= " AND b.brand_id IN(" . $brand . ")";
        }
        if ($_GET["category"]!="") {
            if($_GET['subcat']!==""){
                $subcat=$_GET['subcat'];
                $sqlQry .= " AND s.subcategory_id IN(" . $subcat . ")";
            }
            else{

            $category = $_GET["category"];

            $sqlQry .= " AND c.category_id IN(" . $category . ")";
            }
        }
       // echo $sqlQry;
        $rs = $con->query($sqlQry);
            while ($rst=$rs->fetch_assoc()) {
				?>

<div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary">
                                    <img src="../assets/File/Shop/<?php echo $rst["product_photo"]?>" class="card-img-top" height="250">
                                    <div class="card-img-secondary">
                                        <h6  class="text-light bg-info text-center rounded p-1"><?php echo $rst["product_name"] ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-danger">
                                            Price : <?php echo $rst["product_price"] ?>/-
                                        </h4>
                                        <p>
                                            Category  &nbsp;&nbsp;&nbsp;&nbsp;   : <?php echo $rst["category_name"] ?><br>
                                            Subcategory  : <?php echo $rst["subcategory_name"] ?><br>
                                            

                                        </p>
                                        <?php
                                            $stockSql = "select sum(stock_quantity) as stock from tbl_stock where product_id = '" .$rst["product_id"]. "'";
                                            $rsST = $con->query($stockSql);
                                            $rsss=$rsST->fetch_assoc();
                                            if ($rsss["stock"] != "") {
                                                $stock = $rsss["stock"];
                                                if ($stock > 0) {
													?>
                                        <a href="javascript:void(0)" onclick="addCart(<?php echo $rst["product_id"] ?>)" class="btn btn-success btn-block">Add to Cart</a>
                                        <?php
                                        } else if ($stock == 0) {?>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-block">Out of Stock</a>
                                        <?php
                                            }
                                        } else {?>
                                        <a href="javascript:void(0)" class="btn btn-warning btn-block">Stock Not Found</a>
                                        <?php
                                            }?>
                                        <a href="DetailsOfProduct.php?pid=<?php echo $rst["product_id"]?>" class="btn btn-warning btn-block">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php
            }
        }
?>