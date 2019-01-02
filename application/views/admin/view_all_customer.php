<div class="grid-24">
<div class="widget widget-table">

    <div class="widget-header">
        <span class="icon-list"></span>
        <h3 class="icon chart">All Platinum Customer Table</h3>		
    </div>

    <div class="widget-content">

        <table class="table table-bordered table-striped data-table">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                     <th>Order total</th>
                    <th>Discount Amount</th>
                    <th>Order Date</th>
                 
                </tr>
            </thead>
            <tbody>
               <?php 
               /*  echo '<pre>';
                print_r($all_customer);
                */
                
                
                ?>
                <?php foreach ($all_customer as $v_customer){ ?>
                <tr class="gradeA">
                    <td class="center"><?php echo $v_customer->full_name?></td>
                   <td class="center"><?php echo $v_customer->email_address?></td>
                   <td class="center"><?php echo $v_customer->mobile_no?></td>
                    <td class="center"><?php echo $v_customer->order_total?></td>
                   <td class="center"><?php echo $v_customer->discount_amount?></td>
                   <td class="center"><?php echo $v_customer->ordered_date?></td>  
                </tr>		
                <?php } ?>
            </tbody>
        </table>
    </div> <!-- .widget-content -->

</div> <!-- .widget -->
</div>