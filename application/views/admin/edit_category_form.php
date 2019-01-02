<div class="grid-18">
<form class="form uniformForm" action="<?php echo base_url(); ?>super_admin/update_category" method="post">					

    <div class="widget">

        <div class="widget-header">
            <span class="icon-article"></span>
            <h3>Edit Category</h3>
        </div> <!-- .widget-header -->

        <div class="widget-content">

            <div class="field-group">
                <label>Category Name:</label>

                <div class="field">
                    <input type="text" name="category_name" id="fname" size="50" class="" value="<?php echo $category_info->category_name ?>"/>	
                    <input type="hidden" name="category_id" id="fname" size="50" class="" value="<?php echo $category_info->category_id ?> "/>

                </div>

            </div> <!-- .field-group -->


            <div class="field-group">		
                <label for="message">Category Description:</label>

                <div class="field">
                    <textarea name="category_description" id="message" rows="5" cols="50"><?php echo $category_info->category_description ?></textarea>
                </div>		
            </div> <!-- .field-group -->
            <div class="field-group control-group inline">	
                <label>Publication Status:</label>	
                <?php
                if ($category_info->publication_status == 1) {
                    ?>
                    <div class="field">
                        <input type="radio" checked="checked" name="publication_status" id="" value="1" />
                        <label for="radio1">Published</label>
                        <input type="radio"   name="publication_status"  id="" value="0" />
                        <label for="radio1">Unpublished</label>
                    </div>
                <?php } else { ?>
                    <div class="field">
                        <input type="radio" name="publication_status"  id="" value="1" />
                        <label for="radio1">Published</label>
                        <input type="radio" checked="checked" name="publication_status" id="" value="0" />
                        <label for="radio2">Unpublished</label>
                    </div>
                <?php } ?>
            </div>	

            <div class="actions">
                <button type="submit" class="btn btn-primary">update</button>
            </div>
        </div> <!-- .widget-content -->

    </div> <!-- .widget -->






</form>
</div>