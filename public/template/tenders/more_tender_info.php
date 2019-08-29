<?php $siteBlueprintNews = SITE_ROOT.DS.'public'.DS.'template'.DS.'tenders'; ?>
<?php
    global $DBInstance;
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(isset($_GET['tid'])) {
            if(!empty($_GET['tid'])) {
                $tendid = htmlentities(trim($DBInstance->escapeValues($_GET['tid'])));

                $tenderposting = TenderPosting::getByID($_GET['tid']);
                if($tenderposting) {
                    $tenderInstance = $tenderposting;
                }else {
                    redirect_to("./");
                }
            }else {
                redirect_to("./");
            }
        }else {
            redirect_to("./");
        }
    }
?>

<?php $user = SystemUser::getByID($tenderposting->requesteruid); ?>
<?php $tenderprogressupdates = TenderProgressUpdate::getAll(); ?>
<?php $tendercounts = TenderProgressUpdate::getCountTenderStages($tenderInstance->id); ?>

<div class="card">
    <div class="card-header bg-primary text-center">
        <h4>Tender Information</h4>
    </div>
    <div class="card-body">
        <h5 class="card-title"><?php echo $tenderInstance->title; ?></h5>
        <p class="card-text"><?php echo $tenderInstance->body; ?></p>
        <a href="pubtend.php" class="btn btn-primary">Click To Apply</a> <a class="btn btn-primary btn-sm" href="./private/src/generalfunc/download.php?id=<?php echo $DBInstance->HTMLEntitiesDecoding($tenderInstance->id); ?>" role="button">Document ForThis Tender Application</a>

    </div>
    <div class="card-footer text-muted text-center">
        <?php echo "Posted By: ".$user->getFirstAndLastname($user->fname, $user->lname)." at ".$tenderInstance->computeTime($tenderInstance->timestamp); ?>
    </div>
</div>
<div class="card">
    <div class="card-header bg-primary text-center">
        <h4>Tender Progress</h4>
    </div>
    <div class="card-body">
        <div class="">
            <br />
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="timeline" width="100" data-horizontal-start-position="top" data-start-index="<?php echo $tendercounts; ?>">
                        <div class="timeline__wrap">
                            <div class="timeline__items">
                                <?php $count = 0; ?>
                                <?php foreach($tenderprogressupdates as $tenderprogressupdate): ?>
                                    <?php if($tenderInstance->id == $tenderprogressupdate->tenderid): ?>
                                            <div class="timeline__item">
                                                <div class="timeline__content">
                                                    <?php $updater = SystemUser::getByID($tenderprogressupdate->updaterid); ?>
                                                    <?php $tenderprogress = TenderStage::getByID($tenderprogressupdate->stageid); ?>
                                                    <h2><?php echo $tenderprogress->title; ?></h2>
                                                    <p><?php echo "Updated By: ".$updater->fname." ".$updater->lname; ?></p>
                                                    <p class="btn btn-info btn-sm"><?php echo date("l jS \of F Y h:i:s A", $DBInstance->HTMLEntitiesDecoding($tenderprogressupdate->timestamp)); ?></p>
                                                </div>
                                            </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-center">
                    <h4 class="text-center">Committee</h4>
                </div>
                
                <div class="card-body">
                    <?php if($tenderInstance->committeeid == "-1"): ?>
                        <p class="card-text text-center">No Committee Assigned.</p>
                    <?php else: ?>
                        <?php 
                            $assigned_committee = Committee::getByID($tenderposting->committeeid); 
                            $query = "SELECT * FROM committee_board_members, committees WHERE committee_board_members.role_name = 'committee' AND committee_board_members.designated_id = committees.id";
                            $members = CommitteeBoardMembers::getBySQL($query);
                        ?>
                        <div class="text-center"><p class="card-text text-center btn btn-info btn-sm"><?php echo "Committe: ".$assigned_committee->name; ?></p></div>                        <br>            
                        <?php foreach($members as $member): ?>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><img src="svg/person.svg" alt=""><?php echo " ".$member->fname." ".$member->lname; ?></li>
                            </ul>
                        <?php endforeach; ?>
                        <br>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-center">
                    <h4 class="text-center">Tender Board</h4>
                </div>
                <div class="card-body">
                    <?php if($tenderInstance->boardid == "-1"): ?>
                        <p class="card-text text-center">No Committee Assigned.</p>
                    <?php else: ?>
                        <?php 
                            $assigned_board = TenderBoard::getByID($tenderposting->boardid); 
                            $query = "SELECT * FROM committee_board_members, tenderboards WHERE committee_board_members.role_name = 'board' AND committee_board_members.designated_id = tenderboards.id";
                            $members = CommitteeBoardMembers::getBySQL($query);
                        ?>
                        <div class="text-center"><p class="card-text text-center btn btn-info btn-sm"><?php echo "Committe: ".$assigned_board->name; ?></p></div>                        <br>            
                        <?php foreach($members as $member): ?>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><img src="svg/person.svg" alt=""><?php echo " ".$member->fname." ".$member->lname; ?></li>
                            </ul>
                        <?php endforeach; ?>
                        <br>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>