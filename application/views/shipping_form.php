<h3><strong>SHIPPING DETAILS</strong></h3>
<div class="content_half float_l checkout">
    <form action="<?php echo base_url(); ?>checkout/save_shipping_info" method="post">
        Enter your full name :                				
        <input type="text" name="full_name"  style="width:300px;"  />
        Phone:<br />
        <span style="font-size:10px">Please, specify your reachable phone number. YOU MAY BE GIVEN A CALL TO VERIFY AND COMPLETE THE ORDER.</span>
        <input type="text" name="phone_no"  style="width:300px;"  />
        City:
        <input type="text" name="city" style="width:300px;"  />
        Country:
        <input type="text" name="country" style="width:300px;"  />

        Zip Code:
        <input type="text" name="zip_code"  style="width:300px;"  />
        Address:
        <textarea rows="4" cols="36" name="address"></textarea>
        <br/><br/>
        <input type="submit"  value="Next"  class="submit_btn float_l" />
    </form>
</div>

<div class="content_half float_r checkout">
    <a href="<?php echo base_url(); ?>checkout/shipping_info_same_as_billing_info/<?php echo $this->session->userdata('customer_id') ?>">Shipping information same as Billing information</a>
    <div class="cleaner h10"></div>
    <h3>Shopping Cart</h3>
    <h4>TOTAL: <strong><?php echo $this->cart->total(); ?> BDT</strong></h4>
</div>
<div class="cleaner h50"></div>