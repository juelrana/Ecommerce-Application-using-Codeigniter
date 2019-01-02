<div class="grid-24">
<div class="widget widget-table">

    <div class="widget-header">
        <span class="icon-list"></span>
        <h3 class="icon chart">All Customer Message Table</h3>		
    </div>

    <div class="widget-content">

        <table class="table table-bordered table-striped data-table">
            <thead>
                <tr>
                    <th>Customer Name</th>                    
                    <th>Customer Email</th>
                    <th>Subject</th>
                    
                    <th>Message</th>
                    <th>Message_Date_Time</th>  
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contact_info as $v_contact_info){ ?>
                <tr class="gradeA">

                    <td class="center"><?php echo $v_contact_info->name?></td>
                    <td class="center"><?php echo $v_contact_info->email?></td>
                    <td class="center"><?php echo $v_contact_info->subject?></td>
                    
                    <td class="center"><?php echo $v_contact_info->message?></td>
                    <td class="center"><?php echo $v_contact_info->msg_date_time;?></td>
                    
                    
                </tr>		
                <?php } ?>
            </tbody>
        </table>
    </div> <!-- .widget-content -->

</div> <!-- .widget -->
</div>