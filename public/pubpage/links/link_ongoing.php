<?php $siteBlueprintSlider = SITE_ROOT.DS.'public'.DS.'template'.DS.'slider'; ?>
<?php $siteBlueprintNews = SITE_ROOT.DS.'public'.DS.'pubpage'.DS.'links'; ?>
<div class="col-md-6">
    <section>
        <div class="news">
            <?php include_layout_template($siteBlueprintNews, 'contents_ongoing.php') ?>
            <?php include_layout_template($siteBlueprintNews, 'tenders_charts.php') ?>
        </div>
    </section>
</div>
