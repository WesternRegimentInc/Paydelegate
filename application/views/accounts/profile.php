<!-- START PAGE SIDEBAR -->    <?php require_once APPPATH.'views/temps/sidebar.php'; 
// APPPATH.'views/'.$view_name.'.php';

?>    <!-- END PAGE SIDEBAR -->

                            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                <div class="body-content">
                                    
                                    <div class="single-product">
                                        <div class="product-overview-area col-lg-12 col-md-12 col-sm-12">
                                            
                                            <legend>Edit Profile </legend>
                                            
                                            <div class="row">
                                                
                                                <?php echo form_open('', 'class="form-horizontal" id="myform"'); ?>
                                                
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <!-- Text input-->
                                                        <div class="form-group">
                                                            <div class="col-md-12 col-xs-12">
                                                            <input id="fname" name="fname" placeholder="Full Name" class="form-control" value="<?php echo $usersDetails['fullName']; ?>" type="text" <?php if(form_error('fname')){ echo 'style="border-color: red;"'; } ?>>
                                                            <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <div class="col-md-12 col-xs-12">
                                                                <input id="fname" name="email" placeholder="Email" class="form-control" value="<?php echo $usersDetails['email']; ?>" type="text" <?php if(form_error('email')){ echo 'style="border-color: red;"'; } ?>>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <div class="col-md-12 col-xs-12">
                                                                <input id="fname" phone="email" placeholder="Phone" class="form-control" value="<?php echo $usersDetails['phone']; ?>" type="text" <?php if(form_error('phone')){ echo 'style="border-color: red;"'; } ?>>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <div class="col-md-12 col-xs-12">
                                                                <?php $decnewpass = $this->encryption->decrypt($usersDetails['password']); ?>
                                                                <input id="fname" name="email" placeholder="Password" class="form-control" value="<?php echo $decnewpass; ?>" type="password" <?php if(form_error('pssword')){ echo 'style="border-color: red;"'; } ?>>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <!-- Text input-->
                                                        <div class="form-group">
                                                            <div class="col-md-12 col-xs-12">
                                                                <!--<input type="submit" name="create_pfm" value="Submit Request" class="btn btn-success" />-->
                                                                <button type="submit" name="makeRequest" value="create_pfm">Submit Request</button>
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                <?php echo form_close(); ?>
                                                
                                            </div>
                                            
                                            
                                            
                                            
                                           
                                            <br/><br/><br/><br/><br/><br/><br/><br/>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                                
                            </div>




                        </div>
                </div>
            </div>
            <!-- Shop page End Here -->