<?php $siteBlueprintSlider = SITE_ROOT.DS.'public'.DS.'template'.DS.'slider'; ?>
<?php $siteBlueprintNews = SITE_ROOT.DS.'public'.DS.'template'.DS.'news'; ?>
<div class="col-md-6">
    <div class="region region-content">
        <section class="slider">
            <div id="mycarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php include_layout_template($siteBlueprintSlider, 'slider_pagination.php') ?>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <?php include_layout_template($siteBlueprintSlider, 'slider_main_content.php') ?>
                </div>
                <?php include_layout_template($siteBlueprintSlider, 'slider_next_prev.php') ?>
        </section>
    </div>
    <section>
    <div class="news">
        <?php include_layout_template($siteBlueprintNews, 'news_content.php') ?>
    </div>
    </section>
</div>