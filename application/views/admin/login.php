
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>

        <title>Login</title>

        <meta charset="utf-8" />
        <meta name="description" content="" />
        <meta name="author" content="" />		
        <meta name="viewport" content="width=device-width,initial-scale=1" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>admin/stylesheets/reset.css" type="text/css" media="screen" title="no title" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin/stylesheets/text.css" type="text/css" media="screen" title="no title" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin/stylesheets/buttons.css" type="text/css" media="screen" title="no title" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin/stylesheets/theme-default.css" type="text/css" media="screen" title="no title" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin/stylesheets/login.css" type="text/css" media="screen" title="no title" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>admin/stylesheets/all.css" type="text/css" />
    </head>

    <body>

        <div id="login">

            <h1>Dashboard</h1>
            <div id="login_panel">
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
                <form action="<?php echo base_url(); ?>admin_login/check_admin_login.aspx" method="post" accept-charset="utf-8">		
                    <div class="login_fields">
                        <div class="field">
                            <label for="email">Email</label>
                            <input type="text" name="admin_email_address" value="" id="email" tabindex="1" placeholder="email@example.com" />		
                        </div>

                        <div class="field">
                            <label for="password">Password <small><a href="javascript:;">Forgot Password?</a></small></label>
                            <input type="password" name="admin_password" value="" id="password" tabindex="2" placeholder="password" />			
                        </div>
                    </div> <!-- .login_fields -->

                    <div class="login_actions">
                        <button type="submit" class="btn btn-primary" tabindex="3">Login</button>
                    </div>
                </form>
            </div> <!-- #login_panel -->		
        </div> <!-- #login -->

        <script src="<?php echo base_url(); ?>admin/javascripts/all.js"></script>


    </body>
</html>