<?php $story = new Story(); ?>
<?php $stories = Story::getAll(); ?>
<?php $numOfStory = $story->getStoryCount(); ?>

<?php for($i = 1; $i <= $numOfStory; $i++): ?>
    <?php if($i == 1): ?>
        <?php  $active = 1; ?>   
    <?php else: ?>
        <?php  $active = $i; ?>   
    <?php endif; ?>

    <?php if($i == 1): ?>
        <li data-target="#carousel-story-slider" data-slide-to="<?php echo $i; ?>" class="active"></li>
    <?php else: ?>
        <li data-target="#carousel-story-slider" data-slide-to="<?php echo $i; ?>"></li>
    <?php endif; ?>
<?php endfor; ?>