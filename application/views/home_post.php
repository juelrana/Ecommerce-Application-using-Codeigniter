
<?php $message = $this->session->userdata('message');
if ($message != null) {
    ?> 
    <div id="msg"><h3><?php echo $message; ?></h3></div>
    <?php $this->session->unset_userdata('message');
}
?> 


<h1>All New Products</h1>
<?php
foreach ($all_product as $v_product) {
    ?>
    <div class="product_box"> 
        <a href="<?php echo base_url(); ?><?php echo $v_product->product_image ?>"><img src="<?php echo base_url(); ?><?php echo $v_product->product_image ?>" alt="Image 01" /></a>
        <h3><?php echo $v_product->product_name ?></h3>
        <p class="product_price"> <?php echo $v_product->product_price ?> BDT</p>
        <a href="<?php echo base_url(); ?>cart/add_to_cart/<?php echo $v_product->product_id; ?>" class="add_to_card">Add to Cart</a>
        <a href="<?php echo base_url(); ?>application/productdetail/<?php echo $v_product->product_id . "-" . $v_product->category_id; ?>" class="detail">Detail</a>
    </div>
<?php } ?>
    