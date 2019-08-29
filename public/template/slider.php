<ol class="carousel-indicators">
            <?php
                $story = new Story();
                $stories = Story::getAll();
                $numOfStory = $story->getStoryCount();
                $story->controlSlider($numOfStory);
                
            ?>
            <?php $story = new Story(); ?>
            <?php $stories = Story::getAll(); ?>
            <?php $totality = $story->getStoryCount(); ?>
            <?php for($i = 1; $i <= $totality; $i++): ?>
                <?php 
                if($i == 1) {
                    $active = 1;
                }else {
                    $active = $i;
                }
                ?>
                <?php if($i == 1): ?>
                <li data-target="#carousel-story-slider" data-slide-to="<?php echo $i; ?>" class="active"></li>
                <?php else: ?>
                <li data-target="#carousel-story-slider" data-slide-to="<?php echo $i; ?>"></li>
                <?php endif; ?>
            <?php endfor; ?>
        </ol>

        <?php $sql = "SELECT * FROM stories WHERE status = 'published' ORDER BY id DESC LIMIT 5"; ?>
        <?php global $DBInstance; ?>
        <?php $result = mysqli_query($DBInstance->returnConnection(), $sql); ?>
        <div class="carousel-inner" role="listbox">
            <?php for($n = 1; $n <= $totality; $n++): ?>
            <?php $row = mysqli_fetch_array($result); ?>
            <?php if($row['status'] == 'published'): ?>
                <?php if($n == 1): ?>
                    <div class="carousel-item active">
                    <?php echo '<img class="d-block w-100 h-100 d-inline-block rounded" width="500" src="./private/files/stories/'.$row['filename'].'" alt="First slide">'?>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo $row['title']; ?></h5>
                        <p><?php echo $row['body']; ?></p>
                    </div>
                    </div>
                <?php else: ?>
                    <div class="carousel-item">
                    <?php echo '<img class="d-block w-100" src="./private/files/stories/'.$row['filename'].'" alt="First slide">'?>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo $row['title']?></h5>
                        <p><?php echo $row['body']; ?></p>
                    </div>
                    </div>
                <?php endif; ?>
            <?php endif;?>
        <?php endfor; ?>




-----------------------------------------------------------------------------------------------------------------------------------------




<div id="carousel-story-slider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php
                    $story = new Story();
                    $stories = Story::getAll();
                    $numOfStory = $story->getStoryCount();
                    // $story->controlSlider($numOfStory);

                    for($i = 0; $i <= $numOfStory; $i++) {
                        if($i == 1) {
                            $active = 1;
                        }else {
                            $active = $i;
                        }
                        if($i == 1) {
                            echo "<li data-target=\"#carousel-story-slider\" data-slide-to=\"<?php echo $i; ?>\" class=\"active\"></li>";
                        }else {
                            echo "<li data-target=\"#carousel-story-slider\" data-slide-to=\"<?php echo $i; ?>\"></li>";
                        }
                    }
                ?>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php
                    $count = 0;
                    echo "<pre>";
                    // print_r($stories);
                    // print_r($story);
                    // print_r($stories);
                    print_r($numOfStory);
                    print_r($story->controlSlider($numOfStory));

                    foreach($stories as $story) {
                        $count = 1;
                        if($story->status == 'published') {
                            if($count == 1) {
                                echo "<div class=\"carousel-item active\">";
                                echo "<img class=\"d-block w-100 h-100 d-inline-block rounded\" width=\"500\" src=\"./private/files/stories/\".$story->filename.\"\" alt=\"First slide\">";
                                echo "<div class=\"carousel-caption d-none d-md-block\">";
                                echo "<h5> $story->title; </h5>";
                                echo "<p> $story->body; </p>";
                                $count++;
                            }else {
                                echo "<div class=\"carousel-item\">";
                                echo "<img class=\"d-block w-100\" src=\"./private/files/stories/\".$story->filename.\"\" alt=\"First slide\">";
                                echo "<div class=\"carousel-caption d-none d-md-block\">";
                                echo "<h5> $story->title; </h5>";
                                echo "<p> $story->body; </p>";
                            }
                        }
                    }
                ?>
            </div>
        </div>


        -------------------------------------------------------------------------------------------------------------------------
        <?php $count = 0; ?>
                <?php foreach($stories as $story): ?>
                    <?php if($story->status == 'published'): ?>
                        <?php if($count == 1): ?>
                            <div class="carousel-item active">
                            <img class=\"d-block w-100 h-100 d-inline-block rounded\" width=\"500\" src=\"./private/files/stories/\".$story->filename.\"\" alt=\"First slide\">";
                            <div class=\"carousel-caption d-none d-md-block\">
                            <h5> $story->title; </h5>";
                            <p> $story->body; </p>";
                        <?php endif;?>
                    <?php endif;?>
                <?php endforeach;?>


    -------------------------------------------------------------------------------------------------------------------------------------------------------
     <?php
                    $count = 0;
                    // echo "<pre>";
                    // print_r($stories);
                    // print_r($story);
                    // print_r($numOfStory);
                    // print_r($story->filename);
                    // print_r($story->controlSlider($numOfStory));

                    foreach($stories as $story) {
                        print_r($story->filename);
                        $count = 1;
                        if($story->status == 'published') {
                            if($count == 1) {
                                echo "<div class=\"carousel-item active\">";
                                echo "<img class=\"d-block w-100 h-100 d-inline-block rounded\" width=\"500\" src=\"./private/files/stories/\".$story->filename.\"\" alt=\"First slide\">";
                                echo "<div class=\"carousel-caption d-none d-md-block\">";
                                echo "<h5> $story->title; </h5>";
                                echo "<p> $story->body; </p>";
                                echo "</div>";
                                echo "</div>";
                                $count++;
                            }else {
                                echo "<div class=\"carousel-item\">";
                                echo "<img class=\"d-block w-100\" src=\"./private/files/stories/'.$story->filename.'\" alt=\"First slide\">";
                                echo "<div class=\"carousel-caption d-none d-md-block\">";
                                echo "<h5> $story->title; </h5>";
                                echo "<p> $story->body; </p>";
                                echo "</div>";
                                echo "</div>";
                                $count++;
                            }
                        }
                        $count++;
                    }
                ?>

------------------------------------------------------------------------------------------------------------------------------------------------------------
<?php $count = 0; ?>
                <?php foreach($stories as $story): ?>
                    <?php $count = 1; ?>
                    <?php if($story->status == 'published'): ?>
                        <?php if($count == 1): ?>
                            <div class="carousel-item active">
                                <img class="d-block w-100 h-100 d-inline-block rounded" width="500" src="./private/files/stories/<?php echo $story->filename; ?>" alt="First slide">
                                <div class="carousel-caption d-none d-md-block\">
                                    <h5><?php echo $story->title;?></h5>";
                                    <p><?php echo $story->body;?></p>";
                                </div>
                            </div>
                        <?php else:?>
                         <div class="carousel-item">
                            <img class="d-block w-100" src="./private/files/stories/<?php echo $story->filename; ?>" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?php echo $story->title; ?></h5>
                                <p><?php echo $story->body; ?></p>
                            </div>
                        </div>
                        <?php endif;?>
                        <?php $count++; ?>
                    <?php endif;?>
                <?php endforeach;?>

------------------------------------------------------------------------------------------------------------------------------------------------------------
LAST BUT MAGNIFICENT
<div id="carousel-story-slider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php
                    $story = new Story();
                    $stories = Story::getAll();
                    $numOfStory = $story->getCountAll();
                    $numOfPublished = story::getStoryCount();
                    for($i = 1; $i <= $numOfPublished; $i++) {
                        if($i == 1) {
                            $active = 1;
                        }else {
                            $active = $i;
                        }
                        if($i == 1) {
                            echo "<li data-target=\"#carousel-story-slider\" data-slide-to=\"<?php echo $i; ?>\" class=\"active\"></li>";
                        }else {
                            echo "<li data-target=\"#carousel-story-slider\" data-slide-to=\"<?php echo $i; ?>\"></li>";
                        }
                    }
                ?>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php foreach($stories as $story): ?>
                    <?php for($c = 1; $c <= $numOfPublished; $c++): ?>
                        <?php if($story->status == 'published'): ?>
                            <?php if($c == 1): ?>
                                <div class="carousel-item active">
                                <img class="d-block w-100 h-100 d-inline-block rounded" width="500" src="./private/files/stories/<?php echo $story->filename; ?>" alt="First slide">
                                <div class=\"carousel-caption d-none d-md-block\">
                                <h5><?php echo $story->title; ?></h5>
                                <p><?php echo $story->body; ?></p>
                            <?php else: ?>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="./private/files/stories/<?php echo $story->filename; ?>" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5><?php echo $story->title; ?></h5>
                                    <p><?php echo $story->body; ?></p>
                                </div>
                                </div
                            <?php endif;?>
                        <?php else: ?>
                        <?php endif; ?>
                    <?php endfor; ?>
                <?php endforeach;?>
            </div>
        </div>