<?php $this->load->view('header'); ?>
<!-- ++++++++++ Start of login.php +++++++++ -->
    <div class="problem">
        <?php echo $this->session->flashdata('msg'); ?>
    </div>
    <main id="login">
        <h3> Admin Login </h3>

        <form action="<?php echo base_url() ;?>Admin/check_login" method="post">
            <div class="loginGroup emailGroup">
                <label class="control-label" for="pswd">Email</label>             
                <input type="email" class="form-control" id="email" name="email" required="">
                <span class="text-danger"><?php echo form_error('email'); ?></span>
            </div>
            <div class="loginGroup">
                <label class="control-label" for="pswd">Password</label>
                <input type="password" class="form-control" id="pswd" name="password" required="">
                <span class="text-danger"><?php echo form_error('password'); ?></span>
            </div>
            <div class="Adminloginbutton">
                <button type="submit" class="btn btn-success">Login</button>
            </div>
        </form>
    </main>
<!-- ++++++++++ End of login.php +++++++++ -->
<?php $this->load->view('footer'); ?>