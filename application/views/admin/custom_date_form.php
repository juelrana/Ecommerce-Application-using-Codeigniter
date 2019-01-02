

<div class="grid-8">
    <div class="widget-header">
        <span class="icon-article"></span>
        <h3 class="icon aperture">Random Date wise order Search</h3>
    </div> <!-- .widget-header -->

    <div class="widget">

        <form action="<?php echo base_url(); ?>super_admin/custom_date_search" method="post" id="sampleForm" class="form uniformForm validateForm">

            <div class="field-group inlineField">								
                <label for="datepicker">From Date:</label>

                <div class="field">
                    <input type="date" name="s_date" id="datepicker" />				
                </div> <!-- .field -->								
            </div> <!-- .field-group -->		

            <div class="field-group inlineField">								
                <label for="datepicker">To Date:</label>

                <div class="field">
                    <input type="date" name="e_date" id="datepicker" />				
                </div> <!-- .field -->								
            </div> <!-- .field-group -->	
            <div class="actions">
                <button type="submit" class="btn btn-primary">View</button>
            </div>

        </form>
    </div>
</div>