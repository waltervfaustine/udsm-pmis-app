<?php global $session; $tablename = "stakeholders"; $UID = $session->user_id; ?>
<?php $userDATA = Stakeholder::getLoggedInStakeholderInfoByID($tablename, $UID);?>
<?php echo $userDATA; ?>
<? die(); ?>
<?php $fname = $userDATA->fname; $mname = $userDATA->mname; $lname = $userDATA->lname; ?>


<?php global $session; $tablename = "stakeholders"; $UID = $session->user_id; ?>
<?php $userDATA = Stakeholder::getLoggedInStakeholderInfoByID($tablename, $UID);?>

<?php global $session; $tablename = "users"; $roleID = $session->role_id; $UID = $session->user_id; ?>
<?php $userDATA = User::getLoggedInUserInfoByID($tablename, $roleID, $UID);?>