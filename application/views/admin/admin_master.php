

<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>

        <title>Admin Panel</title>
        <script type="text/javascript" src="<?php echo base_url(); ?>admin/javascripts/ajax_request.js"></script>
        <meta charset="utf-8" />
        <meta name="description" content="" />
        <meta name="author" content="" />		
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="<?php echo base_url(); ?>admin/stylesheets/all.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin/stylesheets/buttons.css" type="text/css" />
        
        <script src="<?php echo base_url(); ?>admin/javascripts/jsval.js"></script>
        <!--[if gte IE 9]>
        <link rel="stylesheet" href="stylesheets/ie9.css" type="text/css" />
        <![endif]-->

        <!--[if gte IE 8]>
        <link rel="stylesheet" href="stylesheets/ie8.css" type="text/css" />
        <![endif]-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin/stylesheets/invoice.css" type="text/css" />
        <script type="text/javascript">
            function checkDelete()
            {
                var chk = confirm("Are You Sure To Delete This ? ");
                if (chk)
                {
                    return true;
                }
                else {
                    return false;
                }
            }
        </script>

    </head>

    <body>

        <div id="wrapper">

            <div id="header">
                <h1><a href="dashboard.html">Canvas Admin</a></h1>		

                <a href="javascript:;" id="reveal-nav">
                    <span class="reveal-bar"></span>
                    <span class="reveal-bar"></span>
                    <span class="reveal-bar"></span>
                </a>
            </div> <!-- #header -->

            <div id="search">
                <form>
                    <input type="text" name="search" placeholder="Search..." id="searchField" />
                </form>		
            </div> <!-- #search -->

            <div id="sidebar">		

                <ul id="mainNav">			
                    <li id="navDashboard" class="nav active">
                        <span class="icon-home"></span>
                        <a href="<?php echo base_url()?>super_admin/index.aspx">Dashboard</a>				
                    </li>

              	

                    <li id="navForms" class="nav">
                        <span class="icon-article"></span>
                        <a href="javascript:;">manage Categories</a>

                        <ul class="subNav">
                            <li><a href="<?php echo base_url(); ?>super_admin/add_category">Add Category</a></li>
                            <li><a href="<?php echo base_url(); ?>super_admin/view_category">View Category</a></li>					
                        </ul>	

                    </li>
                    <li id="navForms" class="nav">
                        <span class="icon-article"></span>
                        <a href="javascript:;">Manage Product</a>

                        <ul class="subNav">
                            <li><a href="<?php echo base_url(); ?>super_admin/add_product">Add Product</a></li>
                            <li><a href="<?php echo base_url(); ?>super_admin/all_product">View Product</a></li>					
                        </ul>	

                    </li>
                    <li id="navForms" class="nav">
                        <span class="icon-article"></span>
                        <a href="javascript:;">Manage Order</a>

                        <ul class="subNav">
                            <li><a href="<?php echo base_url(); ?>super_admin/view_all_order">View Order</a></li>
                            					
                        </ul>	

                    </li>
                    <li id="navForms" class="nav">
                        <span class="icon-article"></span>
                        <a href="javascript:;">Customer Category</a>

                        <ul class="subNav">
                            
                            <li><a href="<?php echo base_url(); ?>super_admin/view_all_platinum_customer">Platinum Customer</a></li>
                            <li><a href="<?php echo base_url(); ?>super_admin/view_all_diamond_customer">Diamond Customer</a></li>
                            <li><a href="<?php echo base_url(); ?>super_admin/view_all_gold_customer">Gold Customer</a></li>
                            <li><a href="<?php echo base_url(); ?>super_admin/view_all_silver_customer">Silver Customer</a></li>
                            <li><a href="<?php echo base_url(); ?>super_admin/view_all_normal_customer">normal Customer</a></li>
                           
                            
                            
                        </ul>	

                    </li>
                    <li id="navForms" class="nav">
                        <span class="icon-article"></span>
                        <a href="javascript:;">Newslater</a>

                        <ul class="subNav">
                            <li><a href="<?php echo base_url(); ?>super_admin/send_discount_newslater">Send Discount Newslater</a></li>
                            				
                        </ul>	

                    </li>

                    <li id="navForms" class="nav">
                        <span class="icon-article"></span>
                        <a href="javascript:;">Sales Report</a>

                        <ul class="subNav">
                            <li><a href="<?php echo base_url(); ?>super_admin/daily_sales_report">Daily sales Report</a></li>
                            <li><a href="<?php echo base_url(); ?>super_admin/weekly_sales_report">Weekly sales Report</a></li>
                            <li><a href="<?php echo base_url(); ?>super_admin/custom_sales_report">Custom Sales Report</a></li>
                        </ul>	

                    </li>

                    <li id="navType" class="nav">
                        <span class="icon-info"></span>
                        <a href="<?php echo base_url()?>super_admin/show_customer_message">Show Message</a>	
                    </li>
                   

                    <li id="navTables" class="nav">
                        <span class="icon-list"></span>
                        <a href="<?php echo base_url()?>super_admin/show_all_customer">Show Customer List</a>	
                    </li>


            </div> <!-- #sidebar -->

            <div id="content">		

                <div id="contentHeader">
                    <h1><?php echo $title; ?></h1>
                </div> <!-- #contentHeader -->	

                <div class="container">               
                  
                                                    
                        <?php echo $admin_maincontent; ?>
                   			
                
                </div> <!-- .container -->

            </div> <!-- #content -->

            <div id="topNav">
                <ul>
                    <li>
                        <a href="#menuProfile" class="menu">Welcome <?php echo $this->session->userdata('admin_full_name'); ?></a>

                        <div id="menuProfile" class="menu-container menu-dropdown">
                            <div class="menu-content">
                                <ul class="">
                                    <li><a href="javascript:;">Edit Profile</a></li>
                                    <li><a href="javascript:;">Edit Settings</a></li>
                                    <li><a href="javascript:;">Suspend Account</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li><a href="<?php echo base_url(); ?>application/index.aspx" target="_blank">View Site</a></li>
                    <li><a href="<?php echo base_url(); ?>super_admin/logout">Logout</a></li>
                </ul>
            </div> <!-- #topNav -->

            <div id="quickNav">
                <ul>
                    <li class="quickNavMail">
                        <a href="#menuAmpersand" class="menu"><span class="icon-book"></span></a>		

                        <span class="alert">3</span>		

                        <div id="menuAmpersand" class="menu-container quickNavConfirm">
                            <div class="menu-content cf">							

                                <div class="qnc qnc_confirm">

                                    <h3>Confirm</h3>

                                    <div class="qnc_item">
                                        <div class="qnc_content">
                                            <span class="qnc_title">Confirm #1</span>
                                            <span class="qnc_preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</span>
                                            <span class="qnc_time">3 hours ago</span>
                                        </div> <!-- .qnc_content -->

                                        <div class="qnc_actions">						
                                            <button class="btn btn-primary btn-small">Accept</button>
                                            <button class="btn btn-quaternary btn-small">Not Now</button>
                                        </div>
                                    </div>

                                    <div class="qnc_item">
                                        <div class="qnc_content">
                                            <span class="qnc_title">Confirm #2</span>
                                            <span class="qnc_preview">Duis aute irure dolor in henderit in voluptate velit esse cillum dolore.</span>
                                            <span class="qnc_time">3 hours ago</span>
                                        </div> <!-- .qnc_content -->

                                        <div class="qnc_actions">						
                                            <button class="btn btn-primary btn-small">Accept</button>
                                            <button class="btn btn-quaternary btn-small">Not Now</button>
                                        </div>
                                    </div>

                                    <div class="qnc_item">
                                        <div class="qnc_content">
                                            <span class="qnc_title">Confirm #3</span>
                                            <span class="qnc_preview">Duis aute irure dolor in henderit in voluptate velit esse cillum dolore.</span>
                                            <span class="qnc_time">3 hours ago</span>
                                        </div> <!-- .qnc_content -->

                                        <div class="qnc_actions">						
                                            <button class="btn btn-primary btn-small">Accept</button>
                                            <button class="btn btn-quaternary btn-small">Not Now</button>
                                        </div>
                                    </div>

                                    <a href="javascript:;" class="qnc_more">View all Confirmations</a>

                                </div> <!-- .qnc -->	
                            </div>
                        </div>
                    </li>
                    <li class="quickNavNotification">
                        <a href="#menuPie" class="menu"><span class="icon-chat"></span></a>

                        <div id="menuPie" class="menu-container">
                            <div class="menu-content cf">					

                                <div class="qnc">

                                    <h3>Notifications</h3>

                                    <a href="javascript:;" class="qnc_item">
                                        <div class="qnc_content">
                                            <span class="qnc_title">Notification #1</span>
                                            <span class="qnc_preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</span>
                                            <span class="qnc_time">3 hours ago</span>
                                        </div> <!-- .qnc_content -->
                                    </a>

                                    <a href="javascript:;" class="qnc_item">
                                        <div class="qnc_content">
                                            <span class="qnc_title">Notification #2</span>
                                            <span class="qnc_preview">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu.</span>
                                            <span class="qnc_time">3 hours ago</span>
                                        </div> <!-- .qnc_content -->
                                    </a>

                                    <a href="javascript:;" class="qnc_more">View all Confirmations</a>

                                </div> <!-- .qnc -->
                            </div>
                        </div>				
                    </li>
                </ul>		
            </div> <!-- .quickNav -->


        </div> <!-- #wrapper -->

        <div id="footer">
            Copyright &copy; 2013,ecommerce.
        </div>

        <script src="<?php echo base_url(); ?>admin/javascripts/all.js">
        </script>

    </body>
</html>