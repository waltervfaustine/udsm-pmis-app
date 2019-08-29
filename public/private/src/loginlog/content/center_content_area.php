<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        <div class="row">
            <div class="col-md-10">
                <h2 class="panel-title">Log Data For The Registration Of System Users</h2><br>
            </div>
            <div class="col-md-2">
                <a href="actionclearlog.php?clr=true"><button type="button" class="btn btn-danger btn-sm">Clear All Log Information</button></a>
            </div>
        </div>
    </div>
        <?php
            global $DBInstance;
            $page = TenderPosting::getPage($DBInstance->escapeValues(trim($_GET['pg'])));
            $per_page = TenderPosting::getRecordPerPage();
            $total_count = TenderPosting::getCountAllUnApproved();
        ?>
        <?php  $pagination = new Pagination($page, $per_page, $total_count); ?>
        <?php
            $result = TenderPosting::findRecordsForThisPage($per_page, $pagination->getOffset());
            $tenderpostings = TenderPosting::getBySQL($result);
        ?>
        
        <div class="panel-body" id="unapproved_status_content_area">
            <table class="table table-bordered table-hover">
                <?php $logfile = SITE_ROOT.DS.'public'.DS.'private'.DS.'log'.DS.'login_logs.txt'; ?>
                <?php
                    if(file_exists($logfile) && is_readable($logfile) && $handle = fopen($logfile, 'r')){
                        echo "<ul class\"log-entries\">";
                        while(!feof($handle)){
                            $entry = fgets($handle);
                            if(trim($entry) != ""){
                                echo "<li>{$entry}</li>";
                            }
                        }
                        echo "</ul>";
                        fclose($handle);
                    }else {
                        echo "Could not read Log Data. Please Troubleshoot the problem";
                    }
                ?>

            </table>
        </div>
    </div>
</div>
