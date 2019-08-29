
<?php $allnews = News::getAll(); ?>
    <?php foreach($allnews as $news): ?>
        <div class="news-head">
        <h3><?php echo $news->title; ?></h3>
        </div>
        <div class="news-body">
        <p><?php echo $news->body; ?></p>
        </div>
    <?php endforeach; ?>
    <div class="news-reasmore">
    <p class="btn btn-primary" >Read More</p>
</div>