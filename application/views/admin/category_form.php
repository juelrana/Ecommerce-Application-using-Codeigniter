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
<form class="form uniformForm" action="<?php echo base_url(); ?>super_admin/save_category" method="post" onsubmit="return validateStandard(this)">					

    <div class="widget">

        <div class="widget-header">
            <span class="icon-article"></span>
            <h3>Add Category</h3>
        </div> <!-- .widget-header -->

        <div class="widget-content">

            <div class="field-group">
                <label>Category Name:<span class="required">*</span></label>

                <div class="field">
                    <input type="text" name="category_name" id="title" size="52" class="" required regexp="JSVAL_RX_ALPHA_NUMERIC" err="Enter valid Title"/>			

                </div>

            </div> <!-- .field-group -->


            <div class="field-group">		
                <label for="message">Category Description:</label>

                <div class="field">
                    <textarea name="category_description" id="message" rows="5" cols="50"></textarea>
                </div>		
            </div> <!-- .field-group -->
            <div class="field-group control-group inline">	
                <label>Publication Status:</label>	

                <div class="field">
                    <input type="radio" name="publication_status" checked="checked" id="" value="1" />
                    <label for="radio1">Published</label>
                </div>

                <div class="field">
                    <input type="radio" name="publication_status" id="" value="0" />
                    <label for="radio2">Unpublished</label>
                </div>

            </div>	

            <div class="actions">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div> <!-- .widget-content -->

    </div> <!-- .widget -->






</form>
</div>