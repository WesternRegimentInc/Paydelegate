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
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="<?php site_url('admin'); ?>">
                                Dashboard </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="<?php base_url('/admin/request'); ?>">
                                Request </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="<?php site_url('admin/naira'); ?>">
                                Naira </a>
                        </li>
                        <li class="pull-right">
                            <div id="dashboard-report-range" class="pull-right dashboard-date-range tooltips" data-placement="top" data-original-title="Change dashboard date range">
                                <i class="fa fa-calendar"></i>
                                <span>
                                </span>
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- END DASHBOARD STATS -->

            <!-- END PAGE HEADER-->
            <?php if ($nR): ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>Status</strong></h3><br />
                                <?php if ($msg): ?>
                                    <span class="help-block"><?php echo $msg; ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="panel-body">
                                <!--
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="btn-group">
                                                <button data-toggle="modal" data-target="#addNew" class="btn green">
                                                    Add New <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    -->
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
                                                    <?php echo form_open('', 'class="form-horizontal" id="myform"'); ?>

                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <!-- Text input-->
                                                        <div class="form-group">
                                                            <input id="payamount" name="amount" placeholder="Amount in USD" 
                                                                   class="form-control" type="number">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <!-- Text input-->
                                                        <div class="form-group">
                                                            <input id="amountVal" name="amountVal" disabled="disabled" 
                                                                   placeholder="Amount in Naira" class="form-control" type="number">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <!-- Text input-->
                                                        <div class="form-group">
                                                            <input id="amountComm" name="amountComm" disabled="disabled"
                                                                   placeholder="Commission" class="form-control" type="number">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <!-- Text input-->
                                                        <div class="form-group">
                                                            <select class="form-control" id="country" name="country">
                                                                <option value="1" selected="selected">Country of Payment.....</option>
                                                                <option value="Nigeria">Nigeria</option>
                                                            </select>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <!-- Text input-->
                                                        <div class="form-group">
                                                            <textarea id="form-name" rows="8" name="des" 
                                                                      placeholder="Payment Description(Bank details/receiver details)" class="form-control" type="text"></textarea>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <!-- Text input-->
                                                        <div class="form-group">
                                                            <input id="rate" name="rate" hidden="hidden" value="" />
                                                            <!--<input type="submit" name="create_pfm" value="Submit Request" class="btn btn-success" />-->
                                                            <button type="submit" name="makeRequest" value="create_pfm">Submit Request</button>
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
                                
                                <table class="table table-striped" id="data_table">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Fullname</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Country</th>
                                            <th>Amount</th>
                                            <th>Exchange Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = '';
                                        foreach ($nR as $n):
                                            $i++;
                                            if ($edit === $n->req_id) {
                                                //Validation
                                                if ($this->session->flashdata('errors')) {
                                                    echo $this->session->flashdata('errors');
                                                }
                                                echo '<tr>' . form_open("admin/request/updatenaira/$n->req_id") . '
                                                <td>' . $i . '</td>
                                                <td>' . $n->fullName . '</td>
                                                <td>' . $n->email . '</td>
                                                <td>' . $n->date . '</td>
                                                <td><textarea class="form-control" name="des" required>' . $n->des . '</textarea></td>
                                                <input name="redirect" type="hidden" value="'. $this->uri->uri_string() .'" />
                                                <td><select class="form-control" id="country" name="country">';
                                                ?>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <?php
                                                echo '</select></td>
                                                <td><input class="form-control" type="text" value="' . $n->amount . '" name="amount" required /></td>
                                                <td><input class="form-control" type="text" value="' . $n->amountExchange . '" name="amountExchange" required /></td>
                                                <td>
                                                <select name="status">';
                                                if ($st) :
                                                    $stt = $n->status;
                                                    foreach ($st as $st):
                                                    ?>
                                                    <option value="<?php echo $st->id; ?>"
                                                    <?php if ($st->id == $stt){echo 'selected';} ?>>
                                                    <?php echo $st->name; ?></option>
                                                    <?php
                                                    endforeach;
                                                endif;
                                                echo '</select>
                                                </td>
                                                <td style="text-align:left">
                                                 <button type="submit" name="btnEdit" class="btn btn-success">Update</button>
                                                </td>' . form_close() . '
                                                </tr>';
                                            } else {
                                                echo '<tr>
                                                    <td>' . $i . '</td>
                                                    <td>' . $n->fullName . '</td>
                                                    <td>' . $n->email . '</td>
                                                    <td>' . $n->date . '</td>
                                                    <td>' . $n->des . '</td>
                                                    <td>' . $n->country . '</td>
                                                    <td>' . $n->amount . '</td>
                                                    <td>' . $n->amountExchange . '</td>
                                                    <td>' . $n->name . '</td>
                                                    <td>
                                                    <a href="' . site_url() . '/admin/request/naira/edit/' . $n->req_id . '" class="btn"><i class="fa fa-pencil"></i>Edit</a>
                                                    <a href="' . site_url() . '/admin/request/deletenaira/' . $n->req_id . '" id="del_status" onclick="window.oh();" class="btn"><i class="fa fa-times"></i>Delete</a>
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

            <div class="clearfix">
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->