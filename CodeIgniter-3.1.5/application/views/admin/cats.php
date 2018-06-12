<?PHP $this->load->view('admin/header'); ?>
<!-- ++++++++++ Start of cats.php +++++++++ -->

<div id="left">
        <button id="ButtonAC">
            Add Categories
        </button>
    <form action="<?php echo base_url() ;?>AdminForms/addCats" method="POST">
        <label>
            Categories
        </label>
        <div id="AddCategoryFields">

        </div>
        <div id="submit" style="display:none;">
            <input type="submit" name="submit" value="submit">
        </div>
    </form>
</div>
<div id="right">
    <?php

    if($categories == null){
        //if $categories is null tell user no categories
        echo '<p> No Categories yet</p>';

    } // end if
    else
    {
        // if $categories is not null tell give user categories
        foreach($categories as $row){

        ?>
        <section class="acat">
            <div class="catName">
                <?php echo $row->adtCategoriesCategory; ?>
            </div>
            <div class="Edits">

            </div>
            <div class="catEdit">
                <button id="ButtonEdit">
                    Edit
                </button>
            <div>
        </section>
    <?php
        } //end of foreach
    } // end else

    ?>

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
                    html += '<input type="text" name="categories[]">';
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
<!-- ++++++++++ End of cats.php +++++++++ -->
<?PHP $this->load->view('footer'); ?>