<div class="grid-24">
<div class="widget widget-table">

    <div class="widget-header">
        <span class="icon-list"></span>
        <h3 class="icon chart">All Order Table</h3>		
    </div>

    <div class="widget-content">

        <table class="table table-bordered table-striped data-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Total BDT</th>
                    <th>Discount BDT</th>
                     <th>Total Amount BDT</th>
                    <th>Order Date</th>
                    <th>Delivary Date</th>
                    <th>Details</th>                   
                </tr>
            </thead>
            <tbody>
                <?php foreach ($all_order as $v_order){ ?>
                <tr class="gradeA">

                    <td class="center"><?php echo $v_order->order_id?></td>
                   <td class="center"><?php echo $v_order->full_name?></td>
                    <td class="center"><?php echo $v_order->order_total?></td>
                    <td class="center"><?php echo $v_order->discount_amount?></td>
                    <td class="center"><?php echo $v_order->order_total_amount?></td>
                    <td class="center"><?php echo $v_order->ordered_date?></td>
                    <td class="center"><?php echo $v_order->delivary_date?></td>
                    <td class="center">
                   <a href="<?php echo base_url()?>super_admin/view_invoice/<?php echo $v_order->order_id.'-'.$v_order->customer_id.'-'.$v_order->shipping_id?>">View Invoice</a>|
                    <a href="<?php echo base_url()?>super_admin/cancel_order/<?php echo $v_order->order_id?>" onclick="return checkDelete();">Cancel Order</a>
                    </td>

                </tr>		
                <?php } ?>
            </tbody>
        </table>
    </div> <!-- .widget-content -->

</div> <!-- .widget -->
</div>