<?php $this->load->view('admin/header'); ?>
<!-- ++++++++++ Start of new-admin.php +++++++++ -->
<main id="register">
	<form action="<?php echo base_url(); ?>AdminForms/newPost" method="post">
		<section>
			<div class="problem">
				<?php echo $this->session->flashdata('msg'); ?>
			</div>

			<label class="control-label">Title</label>
			<input type="text" class="form-control" id="AdminName" name="postTitle" required="">

			<label class="control-label">Author</label>
			<input type="text" class="form-control" id="AdminName" name="postAuthor" required="">
		
			<label class="control-label" for="cn-pswd">Categories</label>
			<input type="password" class="form-control" id="confirmpswd" name="postCategories" required="">

			<label class="control-label" for="cn-pswd">Tags</label>
			<input type="password" class="form-control" id="confirmpswd" name="postTags" required="">
		</section>
		<section>
			<label class="control-label" for="pswd">Excerpt</label>
			<textarea rows="10" cols="10" name="postExcerpt">
			</textarea>
		</section>  
		<section>
			<label class="control-label" for="pswd">Post</label>

		<textarea rows="10" cols="10" name="postPost">
		</textarea>
			<script>
				CKEDITOR.replace( 'postPost' );
			</script>
		</section>
		<label class="control-label" for="pswd">Draft or Publish</label>
		<input type="text" class="form-control" id="AdminName" name="postType" required="" placeholder="draft or publish">
		<label class="control-label" for="pswd">Publish Date</label>
		<input type="text" class="form-control" id="AdminName" name="postPublishDate" placeholder="Month, day, year">
		<div class="Adminloginbutton">
			<button type="submit" class="btn btn-success">Post it</button>
		</div>
	</form>
</main>
<!-- ++++++++++ End of new-admin.php +++++++++ -->
<?php $this->load->view('footer'); ?>