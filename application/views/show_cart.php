<?php
$cdata = $this->cart->contents();
// echo '<pre>';
// print_r($cdata);
// exit();
?>

<?php $message = $this->session->userdata('message');
if ($message != null) {
    ?> 
    <div id="msg"><h3><?php echo $message; ?></h3></div>
    <?php $this->session->unset_userdata('message');
}
?> 
<?php $error_msg = $this->session->userdata('error_msg');
if ($error_msg != null) {
    ?> 
    <div id="error_msg"><h3><?php echo $error_msg; ?></h3></div>
    <?php $this->session->unset_userdata('error_msg');
}
?> 

<h1>Shopping Cart</h1>
<table width="680px" cellspacing="0" cellpadding="5">
    <tr bgcolor="#ddd">
        <th width="180" align="left">Product Name </th> 
        <th width="100" align="center">Quantity </th> 
        <th width="60" align="right">Price </th>
        <th width="60" align="right"></th>
        <th width="60" align="right">Sub Total </th> 
        <th width="90"> </th>
    </tr>
    <?php
    foreach ($cdata as $v_cdata) {
        ?>
        <tr>
            <td><?php echo $v_cdata['name'] ?></td> 
            <td align="center">
                <form action="<?php echo base_url(); ?>cart/update_cart/<?php echo $v_cdata['rowid'].'-'.$v_cdata['id']?>" method="post">
                   
                    <input type="text" name="qty" value="<?php echo $v_cdata['qty'] ?>" style="width: 20px; text-align: right" /> 
                    <input type="submit" name="btn" value="Update">
                </form>
            </td>

            <td align="right">BDT <?php echo $v_cdata['price'] ?> </td> 
            <td width="60" align="right"></td>
            <td align="right">BDT <?php echo $v_cdata['subtotal'] ?></td>
            <td align="center"> <a href="<?php echo base_url(); ?>cart/remove_tocart/<?php echo $v_cdata['rowid'] ?>">Remove</a> </td>
        </tr>
<?php } ?>
    <tr>
        <td colspan="3" align="right"  height="30px">&nbsp;</td>
        <td align="right" style="background:#ddd; font-weight:bold"> Total </td>
        <td align="right" style="background:#ddd; font-weight:bold">BDT <?php echo $this->cart->total(); ?> </td>
        <td style="background:#ddd; font-weight:bold"> </td>
    </tr>
</table>
<div style="float:right; width: 215px; margin-top: 20px;">
    <?php if ($this->session->userdata('customer_id') != NULL && $this->session->userdata('shipping_id') == NULL) { ?> 
        <p><a href="<?php echo base_url(); ?>checkout/show_shipping_form" >Proceed to checkout</a></p>
    <?php
    } elseif ($this->session->userdata('customer_id') && $this->session->userdata('shipping_id')) {
        ?>
        <p><a href="<?php echo base_url(); ?>checkout/proced_to_payment" >Proceed to checkout</a></p>

    <?php } else { ?>
        <p><a href="<?php echo base_url(); ?>checkout/index" >Proceed to checkout</a></p>
    <?php } ?>
    <p><a href="javascript:history.back()">Continue shopping</a></p>

</div>

<div class="cleaner h50"></div>

<h4>Best sales products</h4>
<?php foreach ($best_product_info as $v_best_product_info){?>

    <div class="product_box">
        <a href="<?php echo base_url(); ?>application/productdetail/<?php echo $v_best_product_info->product_id . "-" . $v_best_product_info->category_id; ?>"><img src="<?php echo base_url(); ?><?php echo $v_best_product_info->product_image ?>" alt="Image 01" /></a>
        <h3><?php echo $v_best_product_info->product_name; ?></h3>
        <p class="product_price"><?php echo $v_best_product_info->product_price; ?>BDT</p>
        <a href="<?php echo base_url(); ?>cart/add_to_cart/<?php echo $v_best_product_info->product_id; ?>" class="add_to_card">Add to Cart</a>
        <a href="<?php echo base_url(); ?>application/productdetail/<?php echo $v_best_product_info->product_id . "-" . $v_best_product_info->category_id; ?>" class="detail">Detail</a>
    </div>        	
    <?php
}?>