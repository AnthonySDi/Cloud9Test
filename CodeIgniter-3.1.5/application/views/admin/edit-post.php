<?PHP $this->load->view('admin/header'); ?>
<!-- ++++++++++ Start of Edit-post.php +++++++++ -->

<main>
	<form action="<?php echo base_url(); ?>AdminForms/EditPost" method="post">
		<section>
			<div class="problem">
				<?php echo $this->session->flashdata('msg'); ?>
			</div>
			<?php
				if(isset($thisPost)){

					foreach($thisPost as $row){

			?>
			<label class="control-label" for="fname">Title</label>
			<input type="text" class="form-control" id="AdminName" name="postTitle" value="<?php echo $row->adtBlogTitle; ?>" required="">

			<label class="control-label">Author</label>
			<input type="text" class="form-control" id="AdminName" name="postAuthor" value="<?php echo $row->adtBlogAuthor ?>" required="">
		
			<label class="control-label">Categories</label>
			<input type="password" class="form-control" id="confirmpswd" name="postCategories" value="" required="">

			<label class="control-label">Tags</label>
			<input type="password" class="form-control" id="confirmpswd" name="postTags" required="">
		</section>

		<label class="control-label">Excerpt</label>
		<textarea rows="10" cols="10" name="postExcerpt">
			<?php $row->adtBlogExcerpt; ?>
		</textarea>
			<script>
				CKEDITOR.replace( 'postExcerpt' );
			</script>
		<label class="control-label" >Post</label>

		<textarea rows="10" cols="10" name="postPost">
			<?php $row->adtBlogPost; ?>
		</textarea>
			<script>
				CKEDITOR.replace( 'postPost' );
			</script>

		<label class="control-label" for="pswd">Draft or Publish</label>
		<input type="text" class="form-control" id="AdminName" name="postType" required="" placeholder="draft or publish" value="<?php $row->adtPostType; ?>">

		<label class="control-label" for="pswd">Publish Date</label>
		<input type="text" class="form-control" id="AdminName" name="postPublishDate" value="<?php echo $row->adtPostPublishDate; ?>"placeholder="Month, day, year">

		<div class="Adminloginbutton">
			<button type="submit" class="btn btn-success">Post it</button>
		</div>
	</form>
</main>

<!-- ++++++++++ End of edit-post.php +++++++++ -->
<?PHP $this->load->view('footer'); ?>