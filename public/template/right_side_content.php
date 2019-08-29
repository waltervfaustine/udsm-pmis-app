<?php $siteBlueprintSlider = SITE_ROOT.DS.'public'.DS.'template'.DS.'slider'; ?>
<?php $siteBlueprintNews = SITE_ROOT.DS.'public'.DS.'template'.DS.'news'; ?>
<div class="col-md-6">
    <section>
        <div class="news">
            <?php include_layout_template($siteBlueprintNews, 'tenders_content.php') ?>
            <?php include_layout_template($siteBlueprintNews, 'tenders_charts.php') ?>
        </div>
    </section>
</div>
