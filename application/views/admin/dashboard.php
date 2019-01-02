<?php
include "application/libraries/libchart/classes/libchart.php";

$chart = new PieChart();

$dataSet = new XYDataSet();
foreach ($report_info as $v_report_info) {
    $dataSet->addPoint(new Point("$v_report_info->product_name ($v_report_info->product_total_sales_quantity)", $v_report_info->product_total_sales_quantity));
}
$chart->setDataSet($dataSet);

$chart->setTitle("Graphwise product sales");
$chart->render("images/report/piecart.png");
?>


<?php
include "application/libraries/libchart/classes/libchart.php";

$chart = new VerticalBarChart();

$dataSet = new XYDataSet();
foreach ($report_info as $v_report_info) {
    $dataSet->addPoint(new Point("$v_report_info->product_name ($v_report_info->product_total_sales_quantity)", $v_report_info->product_total_sales_quantity));
}

$chart->setDataSet($dataSet);

$chart->setTitle("Graphwise product sales");
$chart->render("images/report/vcart.png");
?>

<?php
include "application/libraries/libchart/classes/libchart.php";

$chart = new VerticalBarChart();

$dataSet = new XYDataSet();
foreach ($most_view_product as $v_most_view_product){
    $dataSet->addPoint(new Point("$v_most_view_product->product_name", $v_most_view_product->product_view_status));
}

$chart->setDataSet($dataSet);

$chart->setTitle("Graphwise product view status");
$chart->render("images/report/view_status_vcart.png");
?>



<?php
include "application/libraries/libchart/classes/libchart.php";

$chart = new LineChart();

$dataSet = new XYDataSet();
foreach ($month_report_info as $v_report_info) {
    $dataSet->addPoint(new Point("$v_report_info->delivary_date", $v_report_info->order_total));
}

$chart->setDataSet($dataSet);

$chart->setTitle("Sales for 2006");
$chart->render("images/report/lcart.png");
?>

<div class="grid-24">

    <div class="widget">

        <div class="widget-header">
            <span class="icon-compass"></span>
            <h3>Sales Status</h3>
        </div> <!-- .widget-header -->
        <div class="widget-content">



            <div class="dashboard_report first activeState">
                <div class="pad">
                    <span class="value"><?php echo $total_sales_info ?></span> Total Order
                </div> <!-- .pad -->
            </div>

            <div class="dashboard_report defaultState">
                <div class="pad">
                    <span class="value"><?php echo $total_product->product_total_sales_quantity ?></span> Total Product Sales
                </div> <!-- .pad -->
            </div>

            <div class="dashboard_report defaultState">
                <div class="pad">
                    <span class="value"><?php echo $today_order_info ?></span> Today`s Order
                </div> <!-- .pad -->
            </div>

            <div class="dashboard_report defaultState last">
                <div class="pad">
                    <span class="value"><?php echo $cancel_order_info ?></span> Total Cancel Order
                </div> <!-- .pad -->
            </div>

        </div> <!-- .widget-content -->

    </div> <!-- .widget -->

</div>>

<div class="grid-24">
    <div class="widget">


        <div class="widget-header">
            <span class="icon-compass"></span>
            <h3>Quick link</h3>
        </div> <!-- .widget-header -->


        <div class="widget-content">
            <div id="btn_style">
                <button class="myButton"><a style="text-decoration: none;color: #fff" href="<?php echo base_url(); ?>super_admin/add_category">Add Category</a></button>
                <button class="myButton"><a style="text-decoration: none;color: #fff" href="<?php echo base_url(); ?>super_admin/view_category">View Category</a></button>
                <button class="myButton"><a style="text-decoration: none;color: #fff" href="<?php echo base_url(); ?>super_admin/add_product">Add Product</a></button>
                <button class="myButton"><a style="text-decoration: none;color: #fff" href="<?php echo base_url(); ?>super_admin/all_product">View Product</a></button>
                <button class="myButton"><a style="text-decoration: none;color: #fff" href="<?php echo base_url(); ?>super_admin/view_all_order">View Order</a></button>
            </div>
            <div id="btn_style2">
                <button class="myButton"><a style="text-decoration: none;color: #fff" href="<?php echo base_url(); ?>super_admin/daily_sales_report">Today`s Sales</a></button>
                <button class="myButton"><a style="text-decoration: none;color: #fff" href="<?php echo base_url(); ?>super_admin/show_all_customer">View Customer</a></button>
                <button class="myButton"><a style="text-decoration: none;color: #fff" href="<?php echo base_url(); ?>super_admin/show_customer_message">Show Message</a></button>
                <button class="myButton"><a style="text-decoration: none;color: #fff" href="<?php echo base_url(); ?>super_admin/all_product">View Product</a></button>
                <button class="myButton"><a style="text-decoration: none;color: #fff" href="<?php echo base_url(); ?>super_admin/view_all_order">View Order</a></button>
            </div>
        </div> <!-- .widget-content -->

    </div> <!-- .widget -->
</div>

<div class="row">
    <div class="grid-12">
        <div class="widget">
            <div class="widget-header">
                <span class="icon-compass"></span>
                <h3>Pie Chart</h3>
            </div> <!-- .widget-header -->

            <div id="chart_img">
                <img alt="Pie chart"  src="<?php echo base_url(); ?>images/report/piecart.png" "/>
            </div>

        </div>
    </div>

    <div class="grid-12">
        <div class="widget">
            <div class="widget-header">
                <span class="icon-compass"></span>
                <h3>Vertical Bar Chart</h3>
            </div> <!-- .widget-header -->

            <div id="chart_img">
                <img alt="Pie chart" height="400px;" src="<?php echo base_url(); ?>images/report/vcart.png" "/>
            </div>
        </div>
    </div>
</div> <!-- .row -->




<div class="grid-12">
<div class="widget widget-table">

    <div class="widget-header">
        <span class="icon-list"></span>
        <h3 class="icon chart">Product Most View Status</h3>		
    </div>

    <div class="widget-content">

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>View Status</th>                   
                </tr>
            </thead>
            <tbody>
                <?php foreach ($most_view_product as $v_most_view_product){ ?>
                <tr class="gradeA"> 
                    <td class="center"><?php echo $v_most_view_product->product_id?></td>
                    <td class="center"><?php echo $v_most_view_product->product_name?></td>
                   <td class="center"><?php echo $v_most_view_product->product_view_status?></td>

                </tr>		
                <?php } ?>
            </tbody>
        </table>
    </div> <!-- .widget-content -->

</div> <!-- .widget -->
</div>


<div class="grid-12">
    <div class="widget">
         <div class="widget-header">
                <span class="icon-compass"></span>
                <h3>Vertical Bar Chart</h3>
            </div> <!-- .widget-header -->

            <div id="chart_img">
                <img alt="Pie chart" height="400px;" src="<?php echo base_url(); ?>images/report/view_status_vcart.png" "/>
            </div>
        </div>
    </div>
</div>