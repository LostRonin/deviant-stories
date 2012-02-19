<?php $html->addCrumb('Favs', '/pages/favs'); ?>
<?php $this->set("title_for_layout","Favorites | deviant-stories.com"); ?>

<br />
<h2>Personal Favorites</h2>
<p>Just a small and personal list of some books I like, software I use for graphics and some kinky sites I visit. Some items have erotic content, some not. Most of them will be updated  monthly, others are all-time highlights and will not be changed often.</p>
<p>Maybe you will find something that's interesting for you. Have fun !</p>
<br />


<div id="st_horizontal" class="st_horizontal">

    <div class="st_tabs_container">

        <a href="#prev" class="st_prev"></a>

        <div class="st_slide_container">

            <ul class="st_tabs">
                <li><a href="#st_content_1" rel="tab_1" class="st_tab st_first_tab st_tab_active">Actual Favs</a></li>
                <li><a href="#st_content_2" rel="tab_2" class="st_tab">Books</a></li>
                <li><a href="#st_content_3" rel="tab_3" class="st_tab">Tools</a></li>
                <li><a href="#st_content_4" rel="tab_4" class="st_tab">Sites</a></li>

            </ul>

        </div> <!-- /#st_slide_container -->

    <a href="#next" class="st_next"></a>

    </div> <!-- /#st_tabs_container -->

    <div class="st_view_container">

        <div class="st_view">

            <div id="st_content_1" class="st_tab_view st_first_tab_view">
                <?php echo $html->para('story_format', $this->element('favs_actual'), null, false); ?>
            </div>

            <div id="st_content_2" class="st_tab_view">
                <?php echo $html->para('story_format', $this->element('favs_books'), null, false); ?>
            </div>

            <div id="st_content_3" class="st_tab_view">
                <?php echo $html->para('story_format', $this->element('favs_tools'), null, false); ?>
            </div>

            <div id="st_content_4" class="st_tab_view">
                <?php echo $html->para('story_format', $this->element('favs_sites'), null, false); ?>
            </div>

        </div>  <!-- /#st_view_container -->

    </div> <!-- /#view_container -->

</div> <!-- /#tabs_horizontal -->
<!-- End HTML - Horizontal Tabs -->

