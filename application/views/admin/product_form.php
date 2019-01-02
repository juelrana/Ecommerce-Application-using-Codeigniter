<?php
$message = $this->session->userdata('message');

if ($message != null) {
    ?>
    <div class="notify notify-success">						
        <a href="javascript:;" class="close">&times;</a>
        <h3> <?php echo $message; ?></h3>
    </div> <!-- .notify -->
    <?php
    $this->session->unset_userdata('message');
}
?>    
<div class="grid-18">
<form class="form uniformForm" action="<?php echo base_url(); ?>super_admin/save_product" method="post" enctype="multipart/form-data" onsubmit="return validateStandard(this)">	

    <div class="widget">

        <div class="widget-header">
            <span class="icon-article"></span>
            <h3>Add product</h3>
        </div> <!-- .widget-header -->

        <div class="widget-content">

            <div class="field-group">
                <label>Product Name:</label>

                <div class="field">
                    <input type="text" name="product_name" id="fname" size="50" class="" required regexp="JSVAL_RX_ALPHA_NUMERIC" err="Enter valid product title" />			

                </div>

            </div> <!-- .field-group -->
            <div class="field-group">		
                <label>Category Name</label>

                <div class="field">
                    <select name="category_id" id="cardtype">
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
                    <input type="text" name="product_price" id="fname" size="50" class=""  required regexp="JSVAL_RX_FLOAT" err="Enter valid product price"/>			

                </div>

            </div> <!-- .field-group -->
            <div class="field-group">
                <label>Product Quantity:</label>

                <div class="field">
                    <input type="text" name="product_quantity" id="fname" size="50" class="" required regexp="JSVAL_RX_NUMERIC" err="Enter valid product quantity"/>			

                </div>

            </div> <!-- .field-group -->
            <div class="field-group">
                <label>Product SKU:</label>

                <div class="field">
                    <input type="text" name="serial_no" id="fname" size="50" class="" required/>			

                </div>

            </div> <!-- .field-group -->
            <div class="field-group">
                <label>Short Description:</label>

                <div class="field">
                    <input type="text" name="short_description" id="fname" size="83" class="" />			

                </div>

            </div> <!-- .field-group -->
            <div class="field-group">		
                <label for="message">Long Description:</label>

                <div class="field">
                    <textarea name="long_description" id="ck_editor"></textarea><?php echo display_ckeditor($editor['ckeditor']); ?>
                </div>		
            </div> <!-- .field-group -->
            <div class="field-group control-group inline">	
                <label>Product Status:</label>	

                <div class="field">
                    <input type="radio" checked="checked" name="publication_status" id="" value="1" />
                    <label for="radio1">Published</label>
                </div>

                <div class="field">
                    <input type="radio" name="publication_status" id="" value="0" />
                    <label for="radio2">Unpublished</label>
                </div>

            </div>	
            <div class="field-group inlineField">	
                <label for="myfile">product Image:</label>

                <div class="field">
                    <input type="file" name="product_image" id="myfile" />
                </div>	
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div> <!-- .widget-content -->

    </div> <!-- .widget -->
</form>
</div>