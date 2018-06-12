<?PHP $this->load->view('admin/header'); ?>
<!-- ++++++++++ Start of Add-ct.php +++++++++ -->

<div id="left">
        <button id="ButtonAC">
            Add Categories
        </button>
    <form action="<?php echo base_url() ;?>AdminForms/addCTs" method="POST">
        <label>
            Categories
        </label>
        <div id="AddCategoryFields">

        </div>
        <div id="submit" style="display:none;">
            <input type="submit" name="submit" value="submit">
        </div>
    
</div>
<div id="right">
        <button id="ButtonAT">
            Add tags
        </button>
        <label>
            Tags
        </label>
        <div id="AddTagsFields">

        </div>
        <div id="submitTags" style="display:none;">
            <input type="submit" name="submit" value="submit">
        </div>

    </form>
</div>

        <script type="text/javascript">
            jQuery(document).ready(function($){
                 $(document).on('click', 'Button#ButtonAC', function(event){
                    event.preventDefault();

                    $("div#submit").css("display","block");
                    addCategories();
                
                });

                function addCategories()
                {
                    var html = '';    

                    html += '<div class="field">';
                    html += '<input type="file" name="categories[]">';
                    html += '</div>';

                    $("div#AddCategoryFields").append(html);
                }
            });

            jQuery(document).ready(function($){
                 $(document).on('click', 'Button#ButtonAT', function(event){
                    event.preventDefault();

                    $("div#submitTags").css("display","block");
                    addTags();
                
                });

                function addTags()
                {
                    var html = '';    

                    html += '<div class="field">';
                    html += '<input type="file" name="tags[]">';
                    html += '</div>';

                    $("div#AddTagsFields").append(html);
                }
            });
        </script>
<!-- ++++++++++ End of Add-Ct.php +++++++++ -->
<?PHP $this->load->view('footer'); ?>