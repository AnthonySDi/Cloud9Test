<?PHP $this->load->view('admin/header'); ?>
<!-- ++++++++++ Start of Add-ct.php +++++++++ -->

<div id="left">
        <button id="ButtonAC">
            Add Tags
        </button>
    <form action="<?php echo base_url() ;?>AdminForms/addtags" method="POST">
        <label>
            Tags
        </label>
        <div id="AddTagsFields">

        </div>
        <div id="submit" style="display:none;">
            <input type="submit" name="submit" value="submit">
        </div>
    </form>
    
</div>
<div id="right">
    <form action="<?php echo base_url() ;?>AdminForms/addtags" method="POST">
    <?php

    if($tags == null){
        //if $categories is null tell user no categories
        echo '<p> No Tags yet</p>';

    } // end if
    else
    {
        // if $categories is not null tell give user categories
        foreach($tags as $row){

        ?>
        <section class="acat">
            <div class="catName">
                <?php echo $row->adtTagsTag; ?>
            </div>
            <div id="<?php echo $row->adtTagsTag; ?>Edit" class="tagEdit">

            </div>
            <div class="catEdit">
                <button id="ButtonEdit" class="<?php echo $row->adtTagsTag; ?>">
                    Edit
                </button>
            </div>
        </section>
    <?php
        } //end of foreach
    } // end else

    ?>
        <div id="submitEdits" style="display:none;">
            <input type="submit" name="submit" value="submit">
        </div>
    </form>
</div>

<script type="text/javascript">
jQuery(document).ready(function($){
     $(document).on('click', 'Button#ButtonAC', function(event){
        event.preventDefault();

        $("div#submitEdits").css("display","block");
        
        addTags();
    
    });

function addTags()
{
    var html = '';    

    html += '<div class="field">';
    html += '<input type="text" name="tagEdits[]">';
    html += '</div>';

    $("div#AddTagsFields").append(html);
}
});
<?php
    if($tags != null){
        //If there are tags Do this
            foreach($tags as $row){
                
        ?>
                jQuery(document).ready(function($){
                     $(document).on('click', 'Button.<?php echo $row->adtTagsTag; ?>', function(event){
                        event.preventDefault();
            
                        $("div#submitEdits").css("display","block");
                        
                        add<?php echo $row->adtTagsTag; ?>Edit();
                    
                    });
            
                function add<?php echo $row->adtTagsTag; ?>Edit()
                {
                    var html = '';    
            
                    html += '<div class="field">';
                    html += '<input type="text" value="<?php echo $row->adtTagsTag; ?>" name="tagEdits[]">';
                    html += '</div>';
            
                    $("div#<?php echo $row->adtTagsTag; ?>Edit").append(html);
                }
                });
    <?php
            } // end of foreach
    } // end if
    else
    {
        // If there are no tags. Do Nothing. NOTHING!!!

    }
        ?>

</script>
<!-- ++++++++++ End of Add-Ct.php +++++++++ -->
<?PHP $this->load->view('footer'); ?>