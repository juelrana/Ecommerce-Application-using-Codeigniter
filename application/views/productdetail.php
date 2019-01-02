<h1><?php echo $product_info->product_name; ?></h1>
<div class="content_half float_l">
    <div id="deteil_img">
        <a href="<?php echo base_url(); ?><?php echo $product_info->product_image ?>"><img src="<?php echo base_url(); ?><?php echo $product_info->product_image ?>" alt="Image 01" /></a>

    </div>
</div>
<div class="content_half float_r">
    <table>
        <tr>
            <td height="30" width="160">Price:</td>
            <td><?php echo $product_info->product_price; ?> BDT</td>
        </tr>
        <tr>
            <td height="30">Availability:</td>
            <td>In Stock</td>
        </tr>
        <tr>
            <td height="30">Model:</td>
            <td>Product 14</td>
        </tr>
        <tr>
            <td height="30">Manufacturer:</td>
            <td>Apple</td>
        </tr>
        <tr><td height="30">Quantity</td><td><input type="text" value="1" style="width: 20px; text-align: right" /></td></tr>
    </table>
    <div class="cleaner h20"></div>
    <div class="product_box">
        <a href="<?php echo base_url(); ?>cart/add_to_cart/<?php echo $product_info->product_id; ?>" class="add_to_card">Add to Cart</a>
    </div>
</div>
<div class="cleaner h30"></div>

<h5>Product Description</h5>
<p><?php echo $product_info->product_long_description; ?></p>	

<div class="cleaner h50"></div>

<h4>Releted product</h4>
<?php  foreach ($all_product as $v_product) { ?>

    <div class="product_box">
        <a href="<?php echo base_url(); ?>application/productdetail/<?php echo $v_product->product_id . "-" . $v_product->category_id; ?>"><img src="<?php echo base_url(); ?><?php echo $v_product->product_image ?>" alt="Image 01" /></a>
        <h3><?php echo $v_product->product_name; ?></h3>
        <p class="product_price"><?php echo $v_product->product_price; ?>BDT</p>
        <a href="<?php echo base_url(); ?>cart/add_to_cart/<?php echo $product_info->product_id; ?>" class="add_to_card">Add to Cart</a>
        <a href="<?php echo base_url(); ?>application/productdetail/<?php echo $v_product->product_id . "-" . $v_product->category_id; ?>" class="detail">Detail</a>
    </div>        	
    <?php }?>