<?php
$message = $this->session->userdata('message');

if ($message != null) {
    ?>
    <div class="notify notify-success">						
        <a href="javascript:;" class="close">&times;</a>
        <h3> <?php echo $message; ?></h3>
    </div> <!-- .notify -->
    <?php
    $this->session->unset_userdata('message');
}
?>     
<div class="grid-24">
<div class="widget widget-table">

    <div class="widget-header">
        <span class="icon-list"></span>
        <h3 class="icon chart">All product Table</h3>
        <div id="ajax_search"> 
            <label>Search Product</label>
            <input type="search" id="search_text"  onkeyup="  makerequest('<?php echo base_url(); ?>super_admin/ajax_product_search/', this.value, 'result');">
        
        </div>
    </div>

    <div class="widget-content">

        <div id="result"></div>  
    </div> <!-- .widget-content -->

</div> <!-- .widget -->
</div>>
<script type="text/javascript">
                makerequest('<?php echo base_url(); ?>super_admin/ajax_product_search/', '', 'result');
                
</script>