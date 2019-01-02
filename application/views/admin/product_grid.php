<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Product Title</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Total Sales Quantity</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Product Status</th>                   
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($product_info as $v_product) {
            ?>
            <tr class="gradeA">

                <td class="center"><?php echo $v_product->product_name; ?></td>
                <td class="center"><?php echo $v_product->product_price; ?></td>   

                <td class="center"><?php echo $v_product->product_quantity; ?></td> 
                <td class="center"><?php echo $v_product->product_total_sales_quantity; ?></td> 

                <td class="center"><a href="<?php echo base_url(); ?>super_admin/view_edit_product/<?php echo $v_product->product_id; ?>">Edit</a></td>
                <td class="center"><a href="<?php echo base_url(); ?>super_admin/delete_product/<?php echo $v_product->product_id; ?>" onclick="return checkDelete();">Delete</a></td>
                <td class="center">
                    <?php
                    if ($v_product->product_status == 1) {
                        ?>
                        <a href="<?php echo base_url(); ?>super_admin/unpublish_product/<?php echo $v_product->product_id; ?>">Publish</a>


                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>super_admin/publish_product/<?php echo $v_product->product_id; ?>">Unpublish</a>

                    <?php } ?>

                </td>
            </tr>	

            <?php if ($v_product->product_quantity <= 5) { ?>
            <div class="notify notify-warning">                       
                <?php echo $v_product->product_name; ?>
                <?php echo' stock is very low';?>
                 </div>
            <?php } ?>

       
<?php } ?>

</tbody>
</table>