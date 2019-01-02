<?php $message = $this->session->userdata('message');
if ($message != null) {
    ?> 
    <div id="msg"><h3><?php echo $message; ?></h3></div>
    <?php $this->session->unset_userdata('message');
}
?> 
<?php $error_msg = $this->session->userdata('error_msg');
if ($error_msg != null) {
    ?> 
    <div id="error_msg"><h3><?php echo $error_msg; ?></h3></div>
    <?php $this->session->unset_userdata('error_msg');
}
?> 
<div class="content_half float_l">    
    <fieldset>
        <legend>Signup Form</legend>
        <p>If you are not member please signup now</p>
        <div id="contact_form">
            <form method="post" name="login" action="<?php echo base_url(); ?>checkout/save_user_info">

                <label for="author">Full Name:<span>*</span></label> <input type="text" id="author" name="full_name" class="required input_field" required regexp="JSVAL_RX_ALPHA_NUMERIC" />
                <div class="cleaner h10"></div>
                <label for="email">Email:<span>*</span><span id="result"></span></label>
                <input type="text" id="email" name="email_address" class="validate-email required input_field" required regexp="JSVAL_RX_EMAIL" onblur="makerequest('<?php echo base_url(); ?>checkout/ajax_email_check/', this.value, 'result')" />
                <div class="cleaner h10"></div>
                <label for="email">Password:<span>*</span></label> <input type="password" id="email" name="password" class="validate-email required input_field" required />
                <div class="cleaner h10"></div>
                <!--
                <label for="email">Retype Password:<span>*</span></label> <input type="password" id="email" name="password" class="validate-email required input_field" required />
                <div class="cleaner h10"></div>-->
                <label for="author">Company Name:<span>(optional)</span></label> <input type="text" id="author" name="company_name" class="required input_field" />
                <div class="cleaner h10"></div>
                <label for="text">Address:<span>*</span></label> <textarea id="text" name="address" rows="0" cols="0" class="required"></textarea>
                <div class="cleaner h10"></div>
                <label for="subject">Mobile No:<span>*</span></label> <input type="text" name="mobile_no" id="subject" class="input_field" required regexp="JSVAL_RX_ALPHA_NUMERIC"  />
                <div class="cleaner h10"></div>
                <label for="subject">City:<span>*</span></label> <input type="text"  name="city" id="subject" class="input_field" required regexp="JSVAL_RX_ALPHA" />
                <div class="cleaner h10"></div>
                <label for="email">Country:<span>*</span></label>   <div class="cleaner h10"></div>
                <select size="1" name="country">
                    <option>Choose your Country</option>
                    <option value="bangladesh">Bangladesh</option>
                    <option value="India">India</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Pakistan">U.S.A</option>
                    <option value="Pakistan">Australia</option>
                </select>
                <div class="cleaner h10"></div>
                <label for="subject">Zip Code:<span>*</span></label> <input type="text" name="zip_code" id="subject" class="input_field" required regexp="JSVAL_RX_ALPHA_NUMERIC"/>
                <div class="cleaner h10"></div>

                <input type="submit"  value="Signup Now" id="submit_btn" name="submit" class="submit_btn float_l" />
                <input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />

            </form>
        </div>
    </fieldset>
</div>
<div class="content_half float_r" >
    <fieldset id="log">
        <legend>Member Login Area</legend>
        <div id="contact_form">
            <form method="post" name="login" action="<?php echo base_url(); ?>checkout/check_customer_login">

                <label for="author">Email:</label> <input type="email" id="author" name="email_address" class="required input_field" />
                <div class="cleaner h10"></div>
                <label for="email">Password:</label> <input type="password" id="email" name="password" class="validate-email required input_field" />
                <div class="cleaner h10"></div>
                <input type="submit" value="Login" id="submit" name="submit" class="submit_btn float_l" />
            </form>
    </fieldset>
</div>
<div class="cleaner h40"></div>

