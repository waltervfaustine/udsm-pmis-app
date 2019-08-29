<?php $story = new Story(); ?>
<?php $stories = Story::getAll(); ?>
<?php $numOfStory = $story->getStoryCount(); ?>

<?php $sql = "SELECT * FROM stories WHERE status = 'published' ORDER BY id DESC LIMIT 5"; ?>
<?php global $DBInstance; ?>
<?php $result = mysqli_query($DBInstance->returnConnection(), $sql); ?>

<?php for($n = 1; $n <= $numOfStory; $n++): ?>
    <?php $row = mysqli_fetch_array($result); ?>
    <?php if($row['status'] == 'published'): ?>
        <?php if($n == 1): ?>
            <div class="carousel-item active">
            <?php echo '<img class="d-block w-100 h-100 d-inline-block rounded" width="500" src="./private/files/stories/'.$row['filename'].'" alt="First slide">'?>
            <div class="slider_messages carousel-caption d-none d-md-block">
                <h5><?php echo $row['title']; ?></h5>
                <p><?php echo $row['body']; ?></p>
            </div>
            </div>
        <?php else: ?>
            <div class="carousel-item">
            <?php echo '<img class="d-block w-100" src="./private/files/stories/'.$row['filename'].'" alt="First slide">'?>
            <div class="slider_messages carousel-caption d-none d-md-block">
                <h5><?php echo $row['title']?></h5>
                <p><?php echo $row['body']; ?></p>
            </div>
            </div>
        <?php endif; ?>
    <?php endif;?>
<?php endfor; ?>