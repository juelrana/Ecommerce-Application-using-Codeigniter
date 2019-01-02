<div class="grid-18">

<form id="product_edit_form" name="product_edit_form" class="form uniformForm" action="<?php echo base_url(); ?>super_admin/update_product" method="post" enctype="multipart/form-data">	

    <div class="widget">

        <div class="widget-header">
            <span class="icon-article"></span>
            <h3>Edit product</h3>
        </div> <!-- .widget-header -->

        <div class="widget-content">

            <div class="field-group">
                <label>Product Name:</label>

                <div class="field">
                    <input type="text" name="product_name" id="fname" size="50" class="" value="<?php echo $product_info->product_name; ?>"/>			
                    <input type="hidden" name="product_id"  value="<?php echo $product_info->product_id; ?>"/>
                </div>

            </div> <!-- .field-group -->
            <div class="field-group">		
                <label>Category Name</label>

                <div class="field">
                    <select  id="category_id">
                        <option value=" ">Select Category.....</option>
                        <?php
                        foreach ($all_category as $v_category) {
                            ?>
                            <option value="<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></option>
                        <?php } ?>
                    </select>                    
                </div>		
            </div> <!-- .field-group -->

            <div class="field-group">
                <label>Product price:</label>

                <div class="field">
                    <input type="text" name="product_price" id="fname" size="50" class="" value="<?php echo $product_info->product_price;?>"/>			

                </div>

            </div> <!-- .field-group -->
            <div class="field-group">
                <label>Product Quantity:</label>

                <div class="field">
                    <input type="text" name="product_quantity" id="fname" size="50" class="" value="<?php echo $product_info->product_quantity; ?>"/>			

                </div>

            </div> <!-- .field-group -->
            <div class="field-group">
                <label>Product SKU:</label>

                <div class="field">
                    <input type="text" name="serial_no" id="fname" size="50" class="" value="<?php echo $product_info->product_sku; ?>"/>			

                </div>

            </div> <!-- .field-group -->
            <div class="field-group">
                <label>Short Description:</label>

                <div class="field">
                    <input type="text" name="short_description" id="fname" size="83" class="" value="<?php echo $product_info->product_short_description; ?>"/>			

                </div>

            </div> <!-- .field-group -->
            <div class="field-group">		
                <label for="message">Long Description:</label>

                <div class="field">
                    <textarea name="long_description" id="ck_editor"><?php echo $product_info->product_long_description; ?></textarea><?php echo display_ckeditor($editor['ckeditor']); ?>
                </div>		
            </div> <!-- .field-group -->
            <div class="field-group control-group inline">	
                <label>Product Status:</label>	
                
                <?php
                        if($product_info->product_status==1)
                        {
                    ?>
                <div class="field">
                    <input type="radio" checked="checked" name="publication_status" id="" value="1" />
                     <label for="radio1">Published</label>
                    <input type="radio" name="publication_status" id="" value="0" />
                    <label for="radio1">Unpublished</label>
                </div>
                 <?php } else{ ?>
                <div class="field">
                    <input type="radio"  name="publication_status" id="" value="1" />
                    <label for="radio1">Published</label>
                    <input type="radio" checked="checked" name="publication_status" id="" value="0" />
                    <label for="radio2">Unpublished</label>
                </div>
                <?php }?>
            </div>	
            <div class="field-group inlineField">	
                <label for="myfile">product Image:</label>

                <div class="field">
                    <input type="file" name="product_image" id="myfile"/>
                    <input type="hidden" name="product_images" id="myfile" value="<?php echo $product_info->product_image; ?>"/>
                   
                </div>	
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div> <!-- .widget-content -->

    </div> <!-- .widget -->

</form>

<script type="text/javascript">
    document.getElementById('category_id').value='<?php echo $product_info->category_id;?>';
</script>
       

</div>