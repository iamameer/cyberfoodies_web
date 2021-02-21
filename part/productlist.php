<?php 

$product_img = 'src="img/cart-page/product-1.jpg"' ;
$product_name = 'Pure Pineapple';
$product_price = '$60.00';
$product_stock = (int)'11';
$product_status = 'Available';
//<input type="text" value="'.$product_stock.'">

//stock color 
if($product_stock >= 5 and $product_stock < 10){
    $product_stock = '<span style="color:#fc8803!important;">'.$product_stock .'</span>';
}else if($product_stock < 5 ){
    $product_stock = '<span style="color:red!important;">'.$product_stock .'</span>';
}else if($product_stock >= 10 ){
    $product_stock = '<span style="color:green!important;">'.$product_stock .'</span>';
}

echo ' <tr>
            <td class="cart-pic first-row"><img '.$product_img. 'alt=""></td>
            <td class="cart-title first-row">
                <h5>'.$product_name.'</h5>
            </td>
            <td class="p-price first-row">'.$product_price.'</td>
            <td class="qua-col first-row">
                <div class="quantity">
                    '.$product_stock.'
                </div>
            </td>
            <td class="total-price first-row">'.$product_status.'</td>
            <td class="close-td first-row"><i class="ti-close"></i></td>
        </tr>';

?>