<!-- Main body Start Here -->
<div class="row">
	<div class="container">
	<div class="col-lg-4 col-lg-offset-4">
<h2>Forgot Password</h2>
<p>Please enter your email address and we'll send you instructions on how to reset your password</p>
<span>
  <?php if($this->session->flashdata('fmsg')){?>
    <div class="alert alert-danger">      
      <?php echo $this->session->flashdata('fmsg')?>
    </div>
  <?php } ?>
</span>
<span>
  <?php if($this->session->flashdata('fmsg2')){?>
    <div class="alert alert-success">      
      <?php echo $this->session->flashdata('fmsg2')?>
    </div>
  <?php } ?>
</span>
    <?php echo form_open(site_url().'/accounts/forgot/'); ?>
    <div class="form-group">
      <?php echo form_input(array(
          'name'=>'email',
          'id'=> 'email',
          'placeholder'=>'Email',
          'class'=>'form-control',
          'value'=> set_value('email'))); ?>
      <?php echo form_error('email') ?>
    </div>
    <?php echo form_submit(array('value'=>'Submit', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
    <?php echo form_close(); ?>
</div>
	</div>
</div>
</div>
</div>
</div>