<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <script type="text/javascript" src="<?php echo base_url(); ?>admin/javascripts/ajax_request.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Station Shop</title>
        <meta name="keywords" content="station shop,shop" />
        <meta name="description" content="Station Shop Theme" />
        <link href="<?php echo base_url(); ?>css/templatemo_style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/ddsmoothmenu.css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jsval.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/ddsmoothmenu.js">

        </script>

        <script language="javascript" type="text/javascript">
            function clearText(field)
            {
                if (field.defaultValue == field.value)
                    field.value = '';
                else if (field.value == '')
                    field.value = field.defaultValue;
            }
        </script>

        <script type="text/javascript">

            ddsmoothmenu.init({
                mainmenuid: "top_nav", //menu DIV id
                orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
                classname: 'ddsmoothmenu', //class added to menu's outer DIV
                //customtheme: ["#1c5a80", "#18374a"],
                contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
            })

        </script>

        <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/jquery.dualSlider.0.2.css" />

        <script src="<?php echo base_url(); ?>js/jquery-1.3.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/jquery.easing.1.3.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/jquery.timers-1.2.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/jquery.dualSlider.0.3.min.js" type="text/javascript"></script>

        <script type="text/javascript">

            $(document).ready(function() {

                $(".carousel").dualSlider({
                    auto: true,
                    autoDelay: 6000,
                    easingCarousel: "swing",
                    easingDetails: "easeOutBack",
                    durationCarousel: 1000,
                    durationDetails: 600
                });

            });

        </script>

    </head>

    <body>

        <div id="templatemo_wrapper">
            <div id="templatemo_header">

                <div id="site_title">
                    <h1><a href="#"></a></h1>
                </div>

                <div id="header_right">
                    <a href="#"><?php $message = $this->session->userdata('full_name');
if ($message != null) { ?> 
                        welcome <?php echo $message; ?></a> |
    <?php $this->session->unset_userdata('message');
} ?>  <a href="#">My Wishlist</a> | <a href="<?php echo base_url(); ?>cart/show_cart">My Cart</a> |<?php if ($this->session->userdata('customer_id')) { ?>  | <a href="<?php echo base_url(); ?>checkout/logout">Logout</a>|<?php } else { ?> <a href="<?php echo base_url(); ?>checkout/index">Log In</a><?php } ?>
                </div>

                <div class="cleaner"></div>
            </div> <!-- END of header -->

            <div id="templatemo_menu">
                <div id="top_nav" class="ddsmoothmenu">
                    <ul>
                        <li><a href="<?php echo base_url(); ?>application/index.aspx" class="selected">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>application/product.aspx">Products</a>
                            <ul>
                                <?php foreach ($all_category as $v_category) { ?>

                                    <li><a href="<?php echo base_url(); ?>application/product_by_category/<?php echo $v_category->category_id; ?>" ><?php echo $v_category->category_name; ?></a></li>                        

<?php } ?>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url(); ?>application/about.aspx">About</a>
                           
                        </li>
                        <li><a href="<?php echo base_url(); ?>application/faqs.aspx">FAQs</a></li>

                        <li><a href="<?php echo base_url(); ?>application/contact.aspx">Contact</a></li>

                    </ul>
                    <br style="clear: left" />
                </div> <!-- end of ddsmoothmenu -->
                <div id="menu_second_bar">
                    <div id="top_shopping_cart">
                        Shopping Cart: <strong> Item <?php echo $this->cart->total_items(); ?></strong> ( <a href="<?php echo base_url(); ?>cart/show_cart">Show Cart</a> )
                    </div>
                    <div id="templatemo_search">
                        <form action="#" method="get">
                            <input type="text" value="Search" name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
                            <input type="submit" name="Search" value=" Search " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
                        </form>
                    </div>
                    <div class="cleaner"></div>
                </div>
            </div> <!-- END of menu -->
<?php if (isset($slider)) { ?>

                <div id="templatemo_middle" class="carousel">  
                    <div class="panel">

                        <div class="details_wrapper">

                            <div class="details">
    <?php
    foreach ($all_product as $v_product) {
        ?>
                                    <div class="detail">
                                        <h2><a href="<?php echo base_url(); ?>application/productdetail/<?php echo $v_product->product_id . "-" . $v_product->category_id; ?>"><?php echo $v_product->product_name ?></a></h2>
                                        <p> <?php echo $v_product->product_short_description; ?></p>
                                        <a href="<?php echo base_url(); ?>application/productdetail/<?php echo $v_product->product_id . "-" . $v_product->category_id; ?>" title="Read more" class="more">Read more</a>
                                    </div><!-- /detail -->																			
    <?php } ?>
                            </div><!-- /details -->

                        </div><!-- /details_wrapper -->



                        <div class="paging">
                            <div id="numbers"></div>
                            <a href="javascript:void(0);" class="previous" title="Previous" >Previous</a>
                            <a href="javascript:void(0);" class="next" title="Next">Next</a>
                        </div><!-- /paging -->

                        <a href="javascript:void(0);" class="play" title="Turn on autoplay">Play</a>
                        <a href="javascript:void(0);" class="pause" title="Turn off autoplay">Pause</a>

                    </div><!-- /panel -->                   
                    <div class="backgrounds">
                        <?php
                        foreach ($all_product as $v_product) {
                            ?>

                            <div class="item item_1" id="newslide">
                                <img src="<?php echo base_url(); ?><?php echo $v_product->product_image ?>"/>
                            </div><!-- /item -->	
    <?php } ?>
                    </div><!-- /backgrounds -->

                </div> <!-- END of middle -->

<?php } ?>
            <div id="templatemo_main">
                <div id="sidebar" class="float_l">
                    <div class="sidebar_box"><span class="bottom"></span>
                        <h3>Categories <a href="#"  class="more_link"  target="_blank"></a></h3>   
                        <div class="content"> 
                            <ul class="sidebar_list">
<?php foreach ($all_category as $v_category) { ?>

                                    <li><a href="<?php echo base_url(); ?>application/product_by_category/<?php echo $v_category->category_id; ?>" ><?php echo $v_category->category_name; ?></a></li>                        

<?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar_box"><span class="bottom"></span>
                        <h3>Best Sales products <a href="#"  class="more_link" ></a></h3>   
                        <div class="content"> 
                            <?php foreach ($best_product_info as $v_best_product_info){?>
                            <div class="bs_box">
                                <a href="#"><img src="<?php echo base_url(); ?><?php echo $v_best_product_info->product_image ?>" width="58px" height="58px"/></a>
                                <h4><a href="<?php echo base_url(); ?>application/productdetail/<?php echo $v_best_product_info->product_id . "-" . $v_best_product_info->category_id; ?>"><?php echo $v_best_product_info->product_name?></a></h4>
                                <p class="price"><?php echo $v_best_product_info->product_price?>BDT</p>
                                <div class="cleaner"></div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <div id="content" class="float_r">
<?php echo $maincontent; ?>
                </div>
                <div class="cleaner"></div>
            </div> <!-- END of main -->

            <div id="templatemo_footer">
                <p>
                    <a href="<?php echo base_url(); ?>application/index.aspx">Home</a> | <a href="<?php echo base_url(); ?>application/product.aspx">Products</a> | <a href="<?php echo base_url(); ?>application/about.aspx">About</a> | <a href="<?php echo base_url(); ?>application/faqs.aspx">FAQs</a> | <a href="<?php echo base_url(); ?>application/contact.aspx">Contact</a>
                </p>

                Copyright © Juel <a href="#">E-commerce Project</a>
            </div> <!-- END of footer -->

        </div> <!-- END of wrapper -->


        <script type='text/javascript' src='js/logging.js'></script>
    </body>
</html>