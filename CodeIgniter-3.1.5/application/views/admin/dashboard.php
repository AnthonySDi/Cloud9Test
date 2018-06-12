<?php $this->load->view('admin/header'); ?>
<!-- ++++++++++ Start of dashboard.php +++++++++ -->
<main>
    <h4> Hello <?php echo $AdminName; ?> </h4>
    <div id="yourPosts">
        <section>
            <div class="Adminloginbutton">
                <a href="<?php echo base_url(); ?>post/new">
                    <button type="button" class="btn btn-success">New Post</button>
                </a>
            </div>
            
        </section>
        
        
        <?php 
        if($yourPosts == null){
            
            echo '<p>You have no posts at this time</p>';

        }
        else
        {
            foreach($yourPosts as $row)
            {
        ?>
            <section class="apost">
                <div class="postTitle">
                    <?php echo $row->adtBlogTitle; ?>
                </div>
                <div class="postType">
                    <?php echo $row->adtPostType; ?>
                </div>
                <div class="postEdit">
                    <a href="<?php echo base_url(); ?>edit/post/<?php echo $row->idAdtBlog; ?>">Edit</a>
                </div>
                <div class="PublishDate">
                    <?php echo $row->adtPostPublishDate; ?>
                </div>
            </section>

        <?php

            }//end of foreach
        } //end of else

        ?>
    </div>
</main>
<!-- ++++++++++ End of dashboard.php +++++++++ -->
<?php $this->load->view('footer'); ?>