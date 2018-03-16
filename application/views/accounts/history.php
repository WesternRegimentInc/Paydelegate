<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url();?>/accounts/requests">Dashboard</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="bg-white pinside30">
                    <div class="row">
                        <div class="col-md-4 col-sm-5">
                            <h2 class="page-title">Dollar Request</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
<div class=" ">
    <!-- content start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="wrapper-content bg-white pinside40">
                    <div class="contact-form mb60">
                        <div class=" ">
                            <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                                <div class="mb60  section-title text-center  ">
                                    <!-- section title start-->
                                    <h1>Request History </h1>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="body-content">
                                        <!--
                                        <div class="single-product">
                                            <div class="product-overview-area col-lg-12 col-md-12 col-sm-12">
                                                <legend>Naira Requests </legend>
                                                <table id="example" class="table table-striped table-bordered"
                                                       cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Description</th>
                                                            <th>Country</th>
                                                            <th>Amount</th>
                                                            <th>Exchange Amount</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if ($nairar) :
                                                            foreach ($nairar as $uR) :
                                                                $i++;
                                                                echo '<tr>
                                                                <td>' . $uR->date . '</td>
                                                                <td>' . $uR->des . '</td>
                                                                <td>' . $uR->country . '</td>
                                                                <td>' . $uR->amount . '</td>
                                                                <td>' . $uR->amountExchange . '</td>
                                                                <td>Pending</td>
                                                                </tr>';
                                                            endforeach;
                                                        endif;
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        -->
                                        <div class="single-product">
                                            <div class="product-overview-area col-lg-12 col-md-12 col-sm-12">
                                                <legend>Dollar Request </legend>
                                                <table id="example2" class="table table-striped table-bordered"
                                                       cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Description</th>
                                                            <th>Country</th>
                                                            <th>Amount</th>
                                                            <th>Exchange Amount</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if ($dollarr) :
                                                            foreach ($dollarr as $dR) :
                                                                $i ++;
                                                                echo '<tr>
                                                                <td>' . $dR->date . '</td>
                                                                <td>' . $dR->des . '</td>
                                                                <td>' . $dR->country . '</td>
                                                                <td>' . $dR->amount . '</td>
                                                                <td>' . $dR->amountExchange . '</td>
                                                                <td>Pending</td>
                                                                </tr>';
                                                            endforeach;
                                                        endif;
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!--
                                        <div class="single-product">
                                            <div class="product-overview-area col-lg-12 col-md-12 col-sm-12">
                                                <legend>Gift Request </legend>
                                                <table id="example3" class="table table-striped table-bordered"
                                                       cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Description</th>
                                                            <th>Amount</th>
                                                            <th>Exchange Amount</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if ($giftr) :
                                                            foreach ($giftr as $gR) :
                                                                $i ++;
                                                                echo '<tr>
                                                                <td>' . $gR->date . '</td>
                                                                <td>' . $gR->des . '</td>
                                                                <td>' . $gR->amount_usd . '</td>
                                                                <td>' . $gR->amount_naira . '</td>
                                                                <td>Pending</td>
                                                                </tr>';
                                                            endforeach;
                                                        endif;
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>-->
                                    </div>
                            </div>
                        </div>
                        <!-- /.section title start-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content end -->

