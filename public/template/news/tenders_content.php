<?php
    global $DBInstance;
    if(isset($_GET['pg'])) {
        $page = TenderPosting::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
    }else {
        $page = $DBInstance->escapeValues("1");
            $page = TenderPosting::getPage($page);
        }
    $per_page = TenderPosting::getRecordForPublicPage();
    // $per_page = 6;
    $total_count = TenderPosting::getCountAllApprovedAndOnGoing();
?>
<?php  $pagination = new Pagination($page, $per_page, $total_count); ?>

<?php
    $result = TenderPosting::findRecordsForThisPage($per_page, $pagination->getOffset());
    $tenders = TenderPosting::getBySQL($result);
?>


<div id="accordion">
    <div class="tender-announcement-heading">
        <h3>Tender Announcements</h3>
    </div>
        <hr>
        <?php foreach($tenders as $tender): ?>
            <?php if($tender->status == 'ongoing' || $tender->status == 'approved'): ?>
                <?php if($tender->status == 'ongoing'): ?>
                    <div class="">
                        <div class="" id="headingOne">
                            <img src="svg/arrow-right.svg" alt=""> <button class="btn btn-warning btn-xs"></button><a class="" href="tenderinfo.php?tid=<?php echo $tender->id; ?>"> <?php echo $tender->title; ?></a>
                        </div>
                    </div>
                <?php elseif($tender->status == 'approved'): ?>
                    <div class="">
                        <div class="" id="headingOne">
                            <img src="svg/arrow-right.svg" alt=""> <button class="btn btn-success btn-xs" value=<?php echo $tender->status; ?>></button><a href="tenderinfo.php?tid=<?php echo $tender->id; ?>"> <?php echo $tender->title; ?></a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php else: ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="text-center">
    <ul class="pagination">
        <?php 
            if($pagination->totalPage() > 1) {
                if($pagination->hasPreviousPage()) {
                    echo "<li class=\"disabled\">";
                    echo "<a href=\"index.php?pg=";
                    echo $pagination->getPreviousPage();
                    echo "\" aria-label=\"Previous\"><span aria-hidden=\"true\">&laquo;</span></a>";
                    echo "</li>";
                }

                for($i = 1; $i <= $pagination->totalPage(); $i++) {
                    if($i == $page) {
                        echo "<li class=\"active\">";
                        echo "<span aria-hidden=\"true\">";
                        echo "{$i}";
                        echo "</span>";
                        echo "</li>";
                    }else {
                        echo "<li class=\"\">";
                        echo "<a href=\"index.php?pg=";
                        echo "{$i}";
                        echo "\">";
                        echo "<span aria-hidden=\"true\">";
                        echo "{$i}";
                        echo "</span>";
                        echo "</a>";
                        echo "</li>";
                    }
                }
                
                if($pagination->hasNextPage()) {
                    echo "<li class=\"disabled\">";
                    echo "<a href=\"index.php?pg=";
                    echo $pagination->getNextPage();
                    echo "\" aria-label=\"Next\"><span aria-hidden=\"true\">&raquo;</span></a>";
                    echo "</li>";
                }
            }
        ?>
    </ul>
    <?php if($total_count == 0): ?>
        <p><?php echo "Oops! Currently No result found!  <strong>".$total_count." item returned.</strong>"; ?></p>
    <?php elseif($total_count >= 1):?>
        <p><?php echo "Showing ".$pagination->getFirstItem()." to ".$pagination->getLastItem() ." of ".$total_count." entries."; ?></p>
    <?php endif;?>            
</div>
<nav aria-label="...">
    <ul class="pager">
        <?php 
            if($pagination->totalPage() > 1) {
                if($pagination->hasPreviousPage()) {
                    echo "<li class=\"previous\">";
                    echo "<a href=\"index.php?pg=";
                    echo $pagination->getPreviousPage();
                    echo "\"><span aria-hidden=\"true\">&larr;</span> Older</a>";
                    echo "</li>";
                }
                
                if($pagination->hasNextPage()) {
                    echo "<li class=\"next\">";
                    echo "<a href=\"index.php?pg=";
                    echo $pagination->getNextPage();
                    echo "\"><span aria-hidden=\"true\">&rarr;</span> Newer</a>";
                    echo "</li>";
                }
            }
        ?>
    </ul>
</nav>
</div>






