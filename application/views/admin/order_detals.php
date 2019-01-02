<div class="grid-24">
<h3 style="float: left;">Customer Name:  <?php echo $customer_info->full_name?></h3>

<div class="widget widget-table">

    <div class="widget-header">
        <span class="icon-list"></span>
        <h3 class="icon chart">Order Details Table</h3>		
    </div>

    <div class="widget-content">

        <table class="table table-bordered table-striped">
           
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Sales quantity</th>
                    <th>Sub Total</th>
                   
                </tr>
            </thead>
            <tbody>
                
                    <?php foreach ($order_details as $v_o_details){ ?>
                <tr class="gradeA">
                   
                    <td class="center"><?php echo $v_o_details->product_name?></td>
                    <td class="center"><?php echo $v_o_details->product_price?></td>
                    <td class="center"><?php echo $v_o_details->product_sales_quantity?></td>
                    <td class="center"><?php echo $subtotal=$v_o_details->product_price*$v_o_details->product_sales_quantity?></td>
                  
                
                </tr>	
                  <?php } ?>
               
            </tbody>
        </table>
    </div> <!-- .widget-content -->

</div> <!-- .widget -->
 <h2 style="float: right;color: green;margin-right: 80px;">Total: <?php echo $order_info->order_total?></h2>
</div>