<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu" data-auto-scroll="false" data-auto-speed="200">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                </div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <form class="sidebar-search" action="#" method="POST">
                    <a href="javascript:;" class="remove">
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <!-- DOC: value=" ", that is, value with space must be passed to the submit button -->
                            <input class="btn submit" type="button" type="button" value=" "/>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <?php
            $class_1 = $this->uri->segment(1);
            $class_2 = $this->router->fetch_class();
            ?>
            <li class="start <?php if($class_1 == 'admin' &&  $class_2 == 'dashboard'){ echo 'active'; } ?>">
                <a href="<?php echo site_url('admin/dashboard'); ?>">
                    <i class="fa fa-home"></i>
                    <span class="title">
                        Dashboard </span>
                    <span class="selected">
                    </span>
                </a>
            </li>
            <li class=" <?php if($class_2 == 'commission'){ echo 'active'; } ?>">
                <a href="<?php echo site_url('admin/commission'); ?>">
                    <i class="fa fa-user"></i>
                    <span class="title">
                       Commissions </span>
                    <span class="selected">
                    </span>
                </a>
            </li>
            <li class=" <?php if($class_2 == 'rate'){ echo 'active'; } ?>">
                <a href="<?php echo site_url('admin/rate'); ?>">
                    <i class="fa fa-user"></i>
                    <span class="title">
                        Rate </span>
                    <span class="selected">
                    </span>
                </a>
            </li>
            <li class=" <?php if($class_2 == 'request'){ echo 'active'; } ?>">
                <a href="<?php echo site_url('admin/request'); ?>">
                    <i class="fa fa-home"></i>
                    <span class="title">
                        Request </span>
                    <span class="selected">
                    </span>
                </a>
            </li>
            <li class=" <?php if($class_2 == 'status'){ echo 'active'; } ?>">
                <a href="<?php echo site_url('admin/status'); ?>">
                    <i class="fa fa-home"></i>
                    <span class="title">
                        Status </span>
                    <span class="selected">
                    </span>
                </a>
            </li>
            <li class=" <?php if($class_2 == 'staff'){ echo 'active'; } ?>">
                <a href="<?php echo site_url('admin/staff'); ?>">
                    <i class="fa fa-user"></i>
                    <span class="title">
                        Staff </span>
                    <span class="selected">
                    </span>
                </a>
            </li>
            <li class=" <?php if($class_2 == 'user'){ echo 'active'; } ?>">
                <a href="<?php echo site_url('admin/user'); ?>">
                    <i class="fa fa-users"></i>
                    <span class="title">
                        User </span>
                    <span class="selected">
                    </span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->