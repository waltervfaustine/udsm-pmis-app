<?php $siteBlueprintSlider = SITE_ROOT.DS.'public'.DS.'template'.DS.'slider'; ?>
<?php $siteBlueprintNews = SITE_ROOT.DS.'public'.DS.'template'.DS.'links'.DS.'contents'; ?>
<?php $siteBlueprintChart = SITE_ROOT.DS.'public'.DS.'template'.DS.'news'; ?>
<div class="col-md-6">
    <section>
        <div class="news">
            <?php include_layout_template($siteBlueprintNews, 'contents_ongoing.php') ?>
            <?php include_layout_template($siteBlueprintNews, 'tenders_charts.php') ?>
        </div>
    </section>
</div>
