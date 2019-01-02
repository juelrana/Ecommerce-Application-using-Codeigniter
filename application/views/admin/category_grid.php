<table class="table table-bordered table-striped data-table">
    <thead>
        <tr>
            <th>Category Name</th>
            <th>Category Description</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Category Status</th>                   
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($category_info as $v_category) {
            ?>
            <tr class="gradeA">

                <td class="center"><?php echo $v_category->category_name; ?></td>
                <td class="center"><?php echo $v_category->category_description; ?></td>
                <td class="center"><a href="<?php echo base_url(); ?>super_admin/view_edit_category/<?php echo $v_category->category_id; ?>">Edit</a></td>
                <td class="center"><a href="<?php echo base_url(); ?>super_admin/delete_category/<?php echo $v_category->category_id; ?>" onclick="return checkDelete();">Delete</a></td>
                <td class="center">
                    <?php
                    if ($v_category->publication_status == 1) {
                        ?>
                        <a href="<?php echo base_url(); ?>super_admin/unpublish_category/<?php echo $v_category->category_id; ?>">Publish</a>


                    <?php } else { ?>
                        <a href="<?php echo base_url(); ?>super_admin/publish_category/<?php echo $v_category->category_id; ?>">Unpublish</a>

                    <?php } ?>


                </td>
            </tr>		
        <?php } ?>
    </tbody>
</table>