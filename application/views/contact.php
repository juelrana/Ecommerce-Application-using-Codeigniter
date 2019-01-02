	<?php $message = $this->session->userdata('message');
if ($message != null) {
    ?> 
    <div id="msg"><h3><?php echo $message; ?></h3></div>
    <?php $this->session->unset_userdata('message');
}
?> 
<h1>Contact Information</h1>
<div class="content_half float_l">
    <h4>Send us a message now!</h4>
    <div id="contact_form">
        <form method="post" name="contact" action="<?php echo base_url(); ?>application/save_cantact_info">

            <label for="author">Name:</label> <input type="text" id="author" name="name" class="required input_field" />
            <div class="cleaner h10"></div>
            <label for="email">Email:</label> <input type="text" id="email" name="email" class="validate-email required input_field" />
            <div class="cleaner h10"></div>

            <label for="subject">Subject:</label> <input type="text" name="subject" id="subject" class="input_field" />

            <div class="cleaner h10"></div>

            <label for="text">Message:</label> <textarea id="text" name="message" rows="0" cols="0" class="required"></textarea>
            <div class="cleaner h10"></div>

            <input type="submit" value="Send" id="submit" name="submit" class="submit_btn float_l" />
            <input type="reset" value="Reset" id="reset" name="reset" class="submit_btn float_r" />

        </form>
    </div>
</div>
<div class="content_half float_r">
    <h4>Mailing Address</h4>
    <h6><strong>Location One</strong></h6>
    House#24E, Road#13C<br />
    Banani, Dhaka<br />

    <strong>Mobile No:</strong> 01912383496<br />
    <strong>Email:</strong> <a href="juelrana0@gmail.com">juelrana0@gmail.com</a><br />

    <div class="cleaner h20"></div>
    <h6><strong>Location Two</strong></h6>
    
    House#24E, Road#13C<br />
    Banani, Dhaka<br />
    mobile no:<br /><br />

    <strong>Mobile No:</strong> 01912383496<br />
    <strong>Email:</strong> <a href="juelrana0@gmail.com">juelrana0@gmail.com</a><br />

</div>

<div class="cleaner h40"></div>


