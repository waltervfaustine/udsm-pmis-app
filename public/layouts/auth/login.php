<?php require_once("../../../imports/autoload.php"); ?>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(isset($_POST['stakeholder_login'])){
			if(isset($_POST['stakeholder_email']) && isset($_POST['stakeholder_passcode'])) {
				global $DBInstance;
				global $session;

				if((empty($_POST['stakeholder_email']) && empty($_POST['stakeholder_passcode']))){
					$session->message("Please fill all fields before submitting");
                    redirect_to("../../pubtend.php");
				}else if((!empty($_POST['stakeholder_email']) && empty($_POST['stakeholder_passcode']))) {
					$session->message("Please fill the email before sign in");
                    redirect_to("../../pubtend.php");
				}else if((empty($_POST['stakeholder_email']) && !empty($_POST['stakeholder_passcode']))) {
				$session->message("Please fill the password before sign in");
                    redirect_to("../../pubtend.php");
				}else if((!empty($_POST['stakeholder_email']) && !empty($_POST['stakeholder_passcode']))) {
					$email = trim($DBInstance->removeHTMLEntities($_POST['stakeholder_email']));
					$password = trim($DBInstance->removeHTMLEntities($_POST['stakeholder_passcode']));

					$stakeholder_user = Stakeholder::authenticate($email);

					if($stakeholder_user) {
						if(CainamCrypt::quin($password, $stakeholder_user->passcode)) {
							$_SESSION['stakeholder-fullname'] = $stakeholder_user->fname." ".$stakeholder_user->mname." ".$stakeholder_user->lname;
							$_SESSION['stakeholder-status'] = $stakeholder_user->status;

							if($stakeholder_user->verification == "verified") {
								if($stakeholder_user->status == 'approved') {
									$session->login($stakeholder_user);
									$_SESSION['stakeholder-uid'] = $stakeholder_user->id;
									$_SESSION['stakeholder-roleID'] = $stakeholder_user->role_id;
									$roles = Role::getByID($stakeholder_user->role_id);

									// TODO: START: Current Logged In User Information

									$_SESSION['stkuseruid'] = $stakeholder_user->id;
									$_SESSION['stkfname'] = $stakeholder_user->fname;
									$_SESSION['stkmname'] = $stakeholder_user->mname;
									$_SESSION['stklname'] = $stakeholder_user->lname;
									$_SESSION['stkemail'] = $stakeholder_user->email;
									$_SESSION['stkphone'] = $stakeholder_user->phone;

									$gender = Role::getByID();
									if($stakeholder_user->gender == 'F') {
										$_SESSION['stkgender'] = "Female";
									}else if($stakeholder_user->gender == 'M'){
										$_SESSION['stkgender'] = "Male";
									}

									$_SESSION['stkusername'] = $stakeholder_user->username;
									$identification = IdentificationCard::getByID($stakeholder_user->id_typeid);
									$_SESSION['stkidentification'] = $identification->name;

									$businessCategory = BusinessCategory::getByID($stakeholder_user->supply_id);
									$_SESSION['stkbusinessCategory'] = $businessCategory->title;

									$_SESSION['stkrole'] = $roles->name;

				
									$_SESSION['stkverification'] = $stakeholder_user->verification;
									$_SESSION['stkago'] = $stakeholder_user->timestamp;
									$_SESSION['stksince'] = date("l jS \of F Y h:i:s A", $stakeholder_user->timestamp);

									// TODO: START: Current Logged In User Information

									$_SESSION['stk-currentTime'] = time();
									loginLogAction("Login", "$roles->name", $stakeholder_user->phone, $stakeholder_user->email, "Successfully", $stakeholder_user->gender, "$stakeholder_user->fname $stakeholder_user->mname $stakeholder_user->lname");
									redirect_to('../../private/src/thome/');
								}else {
									unset( $_SESSION['stk-message']);
									$_SESSION['stk-message'] = "Hi!  <strong>$stakeholder_user->fname</strong> your PMIS Account <strong>$stakeholder_user->email</strong> is not approved by UDSM PMIS Team. Contact the PMIS Team if the problem persist.";
									redirect_to('../../verfailure.php');
								}
							}else if($stakeholder_user->verification == "unverified") {
								global $session;
								$_SESSION['stk-message'] = "Hi! <strong>$stakeholder_user->fname</strong> your email <strong>$stakeholder_user->email</strong> is not verified. Please follow the link sent to your email to verify it. Thanks.";
								redirect_to('../../verfailure.php');
							}else {
								redirect_to('../../pubtend.php');
							}
						}else {
							$session->$message = "Login failed, check your credentials if are correct and try again.";
							redirect_to('../../pubtend.php');
						}
					}else {
						$session->$message = "Login failed, check your credentials if are correct and try again.";
						redirect_to('../../pubtend.php');
					}
				}
			}else {
				$session->$message = "Please fill all the field to login.";
				redirect_to('../../pubtend.php');
			}
		}
	}
?>