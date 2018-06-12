<?php $this->load->view('admin/header'); ?>
<!-- ++++++++++ Start of new-admin.php +++++++++ -->
<main id="register">
    <form action="<?php echo base_url(); ?>admin/registration" method="post">
                
        <div class="problem">
            <?php echo $this->session->flashdata('msg'); ?>
        </div>

        <label class="control-label" for="fname">Name</label>
        <input type="text" class="form-control" id="AdminName" name="AdminName" required="">
        <span class="text-danger"><?php echo form_error('AdminName'); ?></span>

        <label class="control-label" for="pswd">Email</label>
        <input type="email" class="form-control" id="AdminEmail" name="AdminEmail" required="">
        <span class="text-danger"><?php echo form_error('AdminEmail'); ?></span>
                   
        <label class="control-label" for="pswd">Password</label>
        <input type="password" class="form-control" id="AdminPassword" name="AdminPassword" required="">
        <span class="text-danger"><?php echo form_error('AdminPassword'); ?></span>

        <label class="control-label" for="cn-pswd">Confirm Password</label>
        <input type="password" class="form-control" id="confirmpswd" name="confirmpswd" required="">
        <span class="text-danger"><?php echo form_error('confirmpswd'); ?></span>

        <div class="Adminloginbutton">
            <button type="submit" class="btn btn-success">Add New Admin</button>
        </div>
    </form>
</main>
<!-- ++++++++++ End of new-admin.php +++++++++ -->
<?php $this->load->view('footer'); ?>