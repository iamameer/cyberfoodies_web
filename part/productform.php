<?php 
    error_reporting(-1); ini_set('display_errors',1);  

    //if edit mode
    if($mode == "edit"){

        $details = include('config/config.php');
        include('config/dbconn.php');
    
        $conn = mysqli_connect($details['host'], $details['username'], $details['password'], $details['database']);
        if($conn->connect_error) {
            die("Error connecting to: ".$conn->connect_error);
        }

        $query = "SELECT user_id,product_id,product_image,product_name,product_price,product_stock,product_status
                FROM ".$details['database'].".".$details['product_table'] .
                " WHERE product_id = '" . $_GET['product_id'] . "'
                AND user_id = '" . $_GET['user_id'] . "'
                 ORDER BY product_timestamp desc" ; 

        $result = $conn-> query($query);
        if($result-> num_rows > 0){
            //echo '<p>result found</p>';
                while($row = $result -> fetch_assoc()){
                    $product_id = $row["product_id"];
                    $product_name = $row['product_name'];//'Pure PineapplePure';
                    $product_price = $row['product_price'];//'$60.00';
                    $product_stock = (int)$row['product_stock'];//'11';
                    $product_status = $row['product_status'];//'Available';
                    $product_image = $row['product_image'];
                }//end while

            echo '<h3>Updating '.$product_name.' details:</h3>';
            echo '  <form id="updateproduct" action="config/updateproduct.php?product_id='.$product_id.'&store_id='.$store_id.'&mode=update" 
                method="POST" enctype="multipart/form-data">';

            $option = array('<option selected="" value = "Available">Dijual (Available)</option>',
                            '<option selected="" value = "Limited">Terhad (Limited)</option>',
                            '<option selected="" value = "Out of stock">Kehabisan stok (Out of stock)</option>',
                            '<option selected="" value = "To be added">Akan datang (To be added)</option>',
                            '<option selected="" value = "Pre-Order">Pre-Order</option>',
                            '<option selected="" value = "Other">Lain (Other)</option>');

            echo ' <div class="group-input">
                <label for="productstatus">Status :</label>
                <select type="text" id="productstatus" name="productstatus" placeholder="Status :">';
            foreach($option as $item){
                if(strpos($item,$product_status)){
                    $item = str_replace('selected=""','selected="selected"',$item);
                }
                echo $item;
            }
            echo '
                </select>
            </div>';

            echo ' <div class="group-input">
                    <label for="productname">Nama Produk (Product Name) *</label>
                    <input type="text" id="productname" name="productname"  placeholder="eg: Nasi Ayam Viral"
                    onchange="checkIfEmpty()" onfocus="checkIfEmpty()" onblur="checkIfEmpty()" 
                    onclick="checkIfEmpty()"  onkeyup="checkIfEmpty()" value="'.$product_name.'">
                </div>';

            echo '<div class="group-input">
                <label for="productprice">Harga Produk (Product Price) *</label>
                <input type="text" id="productprice" name="productprice"  placeholder="eg1: RM15"
                onchange="checkIfEmpty()" onfocus="checkIfEmpty()" onblur="checkIfEmpty()" 
                onclick="checkIfEmpty()"  onkeyup="checkIfEmpty()" value="'.$product_price.'">
            </div>';

            echo '<div class="group-input">
                <label for="productstock">Stok (Stock) *</label>
                <input type="number" id="productstock" name="productstock"  placeholder="eg: 10"
                onchange="checkStock()" onfocus="checkStock()" onblur="checkStock()" 
                onclick="checkStock()"  onkeyup="checkStock()" value="'.$product_stock.'">
            </div>';

                if(strlen($product_image)< 10){
                    $img = "<img src='img/blog/sample-shop-image-min.png' @>";
                }else{
                    $img =  '<img src="data:image/jpeg;base64,'.base64_encode($product_image).'" @/>';
                }
           
            echo str_replace('@','style="padding-bottom:15px;"',$img);

            echo '<div class="group-input">
                <label for="additional">Upload Gambar Produk (Add Product Image) :</label>
                <input type="file" name="image[]" id="image" accept=".jpg, .png, .gif" onchange="filesize()" /> 
                <span id="warning" style="display:none;"></span>
                <span>Upload gambar baru akan menggantikan gambar sekarang<br>
                <i>Uploading new image will replace the current one</i></span>
            </div> ';

            echo '<button type="submit" id="site-btn" class="site-btn register-btn" 
                style="opacity:.5;disabled:true;padding-bottom:15px;"
                >UPDATE PRODUCT</button>';

            echo ' </form>';

            echo  '<a href="config/updateproduct.php?product_id='.$product_id.'&store_id='.$store_id.'&mode=delete" 
                    class="primary-btn up-cart" style="margin-top:15px;background-color:#ff401f">Delete Product</a>';

        }else{ 
            echo "<script type='text/javascript'>alert('Product not found');
                window.location.replace('index.php');</script>";
        }
        
        mysqli_close($conn);  
    }else{
    //if addition mode
        echo '<h3>Please fill in the details:</h3>';
        echo '  <form id="addproduct" action="config/newproduct.php?store_id='.$_GET['store_id'].'" 
                method="POST" enctype="multipart/form-data">';
        echo ' <div class="group-input">
                <label for="productstatus">Status :</label>
                <select type="text" id="productstatus" name="productstatus" placeholder="Status :">
                    <option value = "Available">Dijual (Available)</option>
                    <option value = "Limited">Terhad (Limited)</option>
                    <option value = "Out of stock">Kehabisan stok (Out of stock)</option>
                    <option value = "To be added">Akan datang (To be added)</option>
                    <option value = "Pre-Order">Pre-Order</option>
                    <option value = "Other">Lain (Other)</option>
                </select>
            </div>';

        echo ' <div class="group-input">
                <label for="productname">Nama Produk (Product Name) *</label>
                <input type="text" id="productname" name="productname"  placeholder="eg: Nasi Ayam Viral"
                onchange="checkIfEmpty()" onfocus="checkIfEmpty()" onblur="checkIfEmpty()" 
                onclick="checkIfEmpty()"  onkeyup="checkIfEmpty()">
            </div>';

        echo '<div class="group-input">
                <label for="productprice">Harga Produk (Product Price) *</label>
                <input type="text" id="productprice" name="productprice"  placeholder="eg1: RM15"
                onchange="checkIfEmpty()" onfocus="checkIfEmpty()" onblur="checkIfEmpty()" 
                onclick="checkIfEmpty()"  onkeyup="checkIfEmpty()">
            </div>';

        echo '<div class="group-input">
                <label for="productstock">Stok (Stock) *</label>
                <input type="number" id="productstock" name="productstock"  placeholder="eg: 10"
                onchange="checkStock()" onfocus="checkStock()" onblur="checkStock()" 
                onclick="checkStock()"  onkeyup="checkStock()">
            </div>';

        echo '<div class="group-input">
                <label for="additional">Upload Gambar Produk (Add Product Image) :</label>
                <input type="file" name="image[]" id="image" accept=".jpg, .png, .gif" onchange="filesize()" /> 
                <span id="warning" style="display:none;"></span>
                <span>Hanya 1 gambar produk dibenarkan<br>
                <i>Only 1 product picture allowed</i></span>
            </div> ';

        echo '<button type="submit" id="site-btn" class="site-btn register-btn" 
            style="opacity:.5;disabled:true;"
            >ADD PRODUCT</button>';

        echo ' </form>';
    }//endif mode 

?>