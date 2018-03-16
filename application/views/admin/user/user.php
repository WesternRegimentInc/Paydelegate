<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <?php require_once APPPATH.'views/admin/temps/sidebar.php'; ?>
    <!-- END SIDEBAR -->

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">User</h3>
                    <ul class="page-breadcrumb breadcrumb">
                        <li><i class="fa fa-home"></i> <a href="<?php echo site_url('admin'); ?>"> Dashboard </a>
                            <i class="fa fa-angle-right"></i></li>
                        <li><a href="<?php echo site_url('admin/user'); ?>"> User </a> <i class="fa fa-angle-right"></i></li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->

            <!-- END PAGE HEADER-->
            <?php if ($user): ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>User</strong></h3><br />
                                <?php if ($msg): ?>
                                <span class="help-block"><?php echo $msg; ?></span>
                                <?php endif; ?>
                            </div>
                            <!-- Modal -->
                                <div id="addNew" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Add User</h4>
                                            </div>
                                            <div class="modal-body">
                                                    <?php echo form_open('admin/user/create', 'class="form-horizontal"'); ?>
                                                    <div class="form-group">
                                                        <input type="text" name="name" class="form-control"
                                                               placeholder="Full Name" value=""
                                                               aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="email" class="form-control"
                                                               placeholder="Email" value=""
                                                               aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="form-group">
                                                    <input type="password" name="password" class="form-control"
                                                               placeholder="Password" value=""
                                                               aria-describedby="basic-addon1" />
                                                    </div>
                                                    <div class="form-group">
                                                        <select aria-describedby="basic-addon1" class="form-control" name="role">
                                                            <?php
                                                            if ($role){
                                                                foreach ($role as $r){
                                                            ?>
                                                            <option value="<?php echo $r->name; ?>"><?php echo $r->name; ?></option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                    <input type="submit" name="signUpUser" value="Register" class="btn btn-success" />
                                                    </div>
                                                    <?php echo form_close(); ?> 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <div class="panel-body">
                                <!--<div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="btn-group">
                                            <button data-toggle="modal" data-target="#addNew" class="btn green">
                                                Add New <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>-->
                                <table class="table table-striped" id="data_table">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = '';
                                        foreach ($user as $s):
                                            $i++;
                                            if ($edit === $s->pdu_id) {
                                                //Validation
                                                if ($this->session->flashdata('errors')) {
                                                    echo $this->session->flashdata('errors');
                                                }
                                                echo '<tr>' . form_open("admin/user/update/$s->pdu_id") . '
                                                <td>' . $i . '</td>
                                                <input name="redirect" type="hidden" value="'. $this->uri->uri_string() .'" />
                                                <td><input class="form-control" type="text" value="' . $s->fullName . '" name="name" required /></td>
                                                <td><input class="form-control" type="text" value="' . $s->email . '" name="email" required /></td>
                                                <td><input class="form-control" type="text" value="' . $s->phone . '" name="phone" required /></td>
                                                <td>'; ?>
                                                <?php
                                                    if($s->status == 1){
                                                        echo 'Active';
                                                    }
                                                    if($s->status == 0){
                                                        echo 'Suspended';
                                                    }
                                                ?>
                                                <?php
                                                echo '</td>
                                                <td style="text-align:left">
                                                 <button type="submit" name="btnEdit" class="btn btn-success">Update</button>
                                                </td>' . form_close() . '
                                                </tr>';
                                            } else {
                                                echo '<tr>
                                                    <td>' . $i . '</td>
                                                    <td>' . $s->fullName . '</a></td>
                                                    <td>' . $s->email . '</a></td>
                                                    <td>' . $s->phone . '</a></td>
                                                    <td>'; ?>
                                                    <?php
                                                        if($s->status == 1){
                                                            echo '<button class="btn btn-success">Active</button>';
                                                        }
                                                        if($s->status == 0){
                                                            echo '<button class="btn btn-danger">Suspended</button>';
                                                        }
                                                    ?>
                                                    <?php
                                                    echo '</td>
                                                    <td class="text-center">
                                                    <a href="' . site_url() . '/admin/user/index/edit/' . $s->pdu_id . '" class="btn"><i class="fa fa-pencil"></i>Edit</a>'; ?>
                                                    <?php 
                                                    if($s->status == 1){
                                                        echo '<a href="' . site_url() . '/admin/user/suspend/' . $s->pdu_id . '" class="btn"><i class="fa fa-times"></i>Suspend</a>';
                                                    }
                                                    if($s->status == 0){
                                                        echo '<a href="' . site_url() . '/admin/user/unsuspend/' . $s->pdu_id . '" class="btn">Unsuspend</a>';
                                                    }
                                                    ?>   
                                                    <?php echo '</td>
                                                    </tr>';
                                            }

                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
            <!-- END PAGE CONTENT -->
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->