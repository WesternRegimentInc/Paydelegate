<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo site_url();?>/accounts/requests">Home</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="bg-white pinside30">
                    <div class="row">
                        <div class="col-md-4 col-sm-5">
                            <h2 class="page-title">Contact Us</h2>
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
                                        <h1>Get In Touch</h1>
                                        <p>Reach out to us &amp; we will respond as soon as we can.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php echo form_open('site/contact'); ?>
                                    <div class="clearfix"></div>
                                    <?php echo $this->session->flashdata('msg'); ?>
                                        <div class=" ">
                                            <?php if(form_error('fname') || form_error('email') || form_error('password') || form_error('phone')){ echo '<div class="col-md-12" style="margin: 10px 10px; line-height: 1px;"><span style="color: red;">form incomplete</span></div>'; } ?>
                                            <!-- Text input-->
                                            <div class="col-md-4 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label class="sr-only control-label" for="name">name<span class=" "> </span></label>
                                                    <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" required value="<?php echo set_value('name'); ?>" <?php if(form_error('name')){ echo 'style="border-color: red;"'; } ?>>
                                                </div>
                                            </div>
                                            <!-- Text input-->
                                            <div class="col-md-4 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label class="sr-only control-label" for="email">Email<span class=" "> </span></label>
                                                    <input id="email" name="email" type="email" placeholder="Email" class="form-control input-md" <?php echo set_value('email'); ?> <?php if(form_error('email')){ echo 'style="border-color: red;"'; } ?> required>
                                                </div>
                                            </div>
                                            <!-- Text input-->
                                            <div class="col-md-4 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label class="sr-only control-label" for="phone">Phone<span class=" "> </span></label>
                                                    <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control input-md" required value="<?php echo set_value('phone'); ?>" <?php if(form_error('phone')){ echo 'style="border-color: red;"'; } ?>>
                                                </div>
                                            </div>
                                            <!-- Select Basic -->
                                            <div class="col-md-12 col-xs-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="message"> </label>
                                                    <textarea class="form-control" id="message" rows="7" name="message" placeholder="Message" required <?php if(form_error('message')){ echo 'style="border-color: red;"'; } ?>><?php echo set_value('message'); ?></textarea>
                                                </div>
                                            </div>
                                            <!-- Button -->
                                            <div class="col-md-12 col-xs-12">
                                                <button type="submit" class="btn btn-default">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.section title start-->
                        </div>
                        <div class="contact-us mb60">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb60  section-title">
                                        <!-- section title start-->
                                        <h1>We are here to help you </h1>
                                    </div>
                                    <!-- /.section title start-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-xs-12">
                                    <div class="bg-boxshadow pinside60 outline text-center mb30">
                                        <div class="mb40"><i class="icon-briefcase icon-2x icon-default"></i></div>
                                        <h2 class="capital-title">Branch Office</h2>
                                        <p>2832 W Devon Ave, Chicago, IL 60659</p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-12">
                                    <div class="bg-boxshadow pinside60 outline text-center mb30">
                                        <div class="mb40"><i class="icon-phone-call icon-2x icon-default"></i></div>
                                        <h2 class="capital-title">Call us at </h2>
                                        <h1 class="text-big">872302757 </h1>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xs-12">
                                    <div class="bg-boxshadow pinside60 outline text-center mb30">
                                        <div class="mb40"> <i class="icon-letter icon-2x icon-default"></i></div>
                                        <h2 class="capital-title">Email Address</h2>
                                        <p>support@paydelegate.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="map" id="googleMap"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content end -->

