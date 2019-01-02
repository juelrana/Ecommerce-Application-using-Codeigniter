<div class="grid-17">				
    <div id="invoice" class="widget widget-plain">			

        <div class="widget-header">
            <h3>Invoice</h3>
        </div>

        <div class="widget-content">

            <ul class="client_details">
                <li><strong class="name">Billing Information</strong></li>
                <li><label>Customer Name:</label>  <?php echo $customer_info->full_name?></li>
                <li><label>Address:</label>  <?php echo $customer_info->address?></li>
                <li><label>City:</label>  <?php echo $customer_info->city?>,  <label>Zip Code:</label>  <?php echo $customer_info->zip_code?></li>
                <li><label>Country:</label>  <?php echo $customer_info->country?></li>
                <li><label>Phone No:</label>  <?php echo $customer_info->mobile_no?></li>
            </ul>
            <ul class="client_details2">
                <li><strong class="name">Shipping Information</strong></li>
                <li><label>Customer Name:</label>  <?php echo $shipping_info->full_name?></li>
                <li><label>Address:</label>  <?php echo $shipping_info->address?></li>
                <li><label>City:</label>  <?php echo $shipping_info->city?>,  <label>Zip Code:</label>  <?php echo $shipping_info->zip_code?></li>
                <li><label>Country:</label>  <?php echo $shipping_info->country?></li>
                <li><label>Phone No:</label>  <?php echo $shipping_info->phone_no?></li>
            </ul>

            <ul class="invoice_details">
                <li>Status: <span class="ticket ticket-info">Open</span></li>
                <li>Invoice Number:   000<?php echo $order_info->order_id?></li>
                <li>Invoice Date & Time:   <?php echo $order_info->ordered_date?></li>
                <li>Delivery Date & Time:  <?php echo $order_info->delivary_date?></li>
                <li>Job Number: WEB-2345</li>
            </ul>


            <div class="clear"></div>

            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>Product Name</th>    
                         
                        <th class="price">Product Quantity</th>
                         <th>&nbsp;</th>
                        <th class="price">Product Price</th>
                        <th class="total">Total</th>
                    </tr>
                </thead>	

                <tbody>
                    <?php foreach ($order_details as $v_order_details){ ?>
                    <tr>
                        <td><?php echo $v_order_details->product_name?></td>			
                        <td align="center"><?php echo $v_order_details->product_sales_quantity?></td>
                        <td>&nbsp;</td>
                        <td class="price"><?php echo $v_order_details->product_price?> BDT</td>
                        <td class="total"><?php echo $v_order_details->product_price*$v_order_details->product_sales_quantity?> BDT</td>
                    </tr>                   
                    <?php } ?>
                    <tr>
                        <td class="sub_total" colspan="3"></td>
                        <td class="sub_total">Subtotal:</td>
                        <td class="sub_total"><?php echo $order_info->order_total?> BDT</td>
                    </tr>
                   <tr class="total_bar">
                            <td class="grand_total" colspan="3"></td>
                            <td class="grand_total">Discount:<?php echo $total=$order_info->discount_amount*100/$order_info->order_total;?>%</td>
                            <td class="grand_total"><?php echo $order_info->discount_amount?> BDT</td>
                    </tr>
                    <tr class="total_bar">
                            <td class="grand_total" colspan="3"></td>
                            <td class="grand_total">Net Total:</td>
                            <td class="grand_total"><?php echo $order_info->order_total_amount?> BDT</td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <h3>Invoice Notes</h3>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            

        </div>
    </div>

</div> <!-- .grid -->





<div class="grid-7">

    <div class="box">


        <div id="invoice_total"><?php echo $order_info->order_total_amount?> BDT</div>

        <br />

        <h3>Invoice Actions</h3>

        <ul id="invoice_actions" class="">
            <li class="send"><a href="javascript:;">Send Invoice</a></li>
            <li class="edit"><a href="javascript:;">Edit Invoice</a></li>
            <li class="print"><a href="javascript:;">Print Invoice</a></li>
            <li class="duplicate"><a href="javascript:;">Duplicate Invoice</a></li>
            <li class="delete"><a href="javascript:;">Delete Invoice</a></li>
            <li class="change"><a href="javascript:;">Change Status</a></li>
        </ul>

    </div> <!-- .box -->		

</div> <!-- .grid -->
