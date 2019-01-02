<div class="grid-24">
<div class="widget widget-table">

    <div class="widget-header">
        <span class="icon-list"></span>
        <h3 class="icon chart">All Customer List</h3>		
    </div>

    <div class="widget-content">

        <table class="table table-bordered table-striped data-table">
            <thead>
                <tr>
                    <th>Customer Name</th>                    
                    <th>Customer Email</th>
                    <th>Company Name</th>
                    <th>Address</th>                    
                    <th>City</th>
                    <th>Country</th>
                    
                    <th>Zip Code</th>
                    <th>Mobile No</th>  
                    <th>Action</th>  
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customer_info as $v_customer_info){ ?>
                <tr class="gradeA">

                    <td class="center"><?php echo $v_customer_info->full_name?></td>
                    <td class="center"><?php echo $v_customer_info->email_address?></td>
                    <td class="center"><?php echo $v_customer_info->company_name?></td>            
                     <td class="center"><?php echo $v_customer_info->address?></td>
                    <td class="center"><?php echo $v_customer_info->city?></td>
                    <td class="center"><?php echo $v_customer_info->country?></td>
                    <td class="center"><?php echo $v_customer_info->zip_code?></td>
                    <td class="center"><?php echo $v_customer_info->mobile_no?></td>
                    <td><a href="<?php echo base_url()?>super_admin/delete_customer_by_id/<?php echo $v_customer_info->customer_id?>" onclick="return checkDelete();">Delete</a></td>
                </tr>		
                <?php } ?>
            </tbody>
        </table>
    </div> <!-- .widget-content -->

</div> <!-- .widget -->
</div>