<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <?php require_once('temps/sidebar.php'); ?>
    <!-- END SIDEBAR -->

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <ul class="page-breadcrumb breadcrumb">
                        <li><i class="fa fa-home"></i> <a href="<?php echo site_url('admin'); ?>"> Dashboard </a>
                            <i class="fa fa-angle-right"></i></li>
                        <li><a href="<?php echo site_url('admin/request'); ?>"> Rate </a> <i class="fa fa-angle-right"></i></li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->

            <!-- END PAGE HEADER-->
            <?php if ($commission): ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="btn-group"><!--
                                            <button data-toggle="modal" data-target="#addNew" class="btn green">
                                                Add New <i class="fa fa-plus"></i>
                                            </button>-->
                                        </div>
                                    </div>
                            </div>
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Commission</strong></h3><br />
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
                                                <h4 class="modal-title">Modal Header</h4>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo form_open('admin/rate/create', 'class="form-horizontal" id="myform"'); ?>

                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <!-- Text input-->
                                                    <div class="form-group">
                                                        <input id="payamount" name="buy_rate" placeholder="Buy Rate" 
                                                               class="form-control" type="number">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <!-- Text input-->
                                                    <div class="form-group">
                                                        <input id="payamount" name="sell_rate" placeholder="Sell Rate" 
                                                               class="form-control" type="number">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <!-- Text input-->
                                                    <div class="form-group">
                                                        <input id="payamount" name="currency" placeholder="Currency" 
                                                               class="form-control" type="text">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-default" name="makeRequest" value="create_pfm">Submit Request</button>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
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
                                <table class="table table-striped" id="data_table">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Commission</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = '';
                                        foreach ($commission as $s):
                                            $i++;
                                            if ($edit === $s->id) {
                                                //Validation
                                                if ($this->session->flashdata('errors')) {
                                                    echo $this->session->flashdata('errors');
                                                }
                                                echo '<tr>' . form_open("admin/commission/update/$s->id") . '
                                                <td>' . $i . '</td>
                                                <input name="redirect" type="hidden" value="'. $this->uri->uri_string() .'" />
                                                <td><input class="form-control" type="text" value="' . $s->commission . '" name="commission" required /></td>
                                                <td style="text-align:left">
                                                 <button type="submit" name="btnEdit" class="btn btn-success">Update</button>
                                                </td>' . form_close() . '
                                                </tr>';
                                            } else {
                                                echo '<tr>
                                                    <td>' . $i . '</td>
                                                    <td>' . $s->commission . '</td>
                                                    <td class="text-center">
                                                    <a href="' . site_url() . '/admin/commission/index/edit/' . $s->id . '" class="btn"><i class="fa fa-pencil"></i>Edit</a>
                                                    <a href="' . site_url() . '/admin/commission/delete/' . $s->id . '" id="del_rate" onclick="window.oh();" class="btn"><i class="fa fa-times"></i>Delete</a>
                                                    </td>
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