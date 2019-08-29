<?php require_once("../../../../imports/autoload.php"); ?>
<?php
	if($session->is_logged_in()) { redirect_to("views/uhome.php"); }
	global $session;
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(isset($_POST['submit'])){
			if(isset($_POST['email']) && isset($_POST['password'])) {
				if(empty($_POST['email']) && empty($_POST['password'])) {
                    $session->message("Please fill all the fields");
					redirect_to('../../auth/');
                }else if(!empty($_POST['email']) && empty($_POST['password'])) {
                    $session->message("Please fill all the fields");
					redirect_to('../../auth/');
                }else if(empty($_POST['email']) && !empty($_POST['password'])) {
                    $session->message("Please fill all the fields");
					redirect_to('../../auth/');
                }else if(!empty($_POST['email']) && !empty($_POST['password'])) {
					global $DBInstance;
					$email = trim($DBInstance->removeHTMLEntities($_POST['email']));
					$password = trim($DBInstance->removeHTMLEntities($_POST['password']));
					$_SESSION['login-email'] = $email;
					$foundUser = SystemUser::authenticate($email);

					echo "<pre>";
					print_r($foundUser);

					if($foundUser) {
						if(CainamCrypt::quin($password, $foundUser->passcode)) {
							if($foundUser->status == "unverified") {
								$session->message("Please follow the link sent to your email to verify your PMIS account.");
								redirect_to('../../auth/');
							}else if($foundUser->status == "verified") {
								$foundRole = Role::getRole($foundUser->role_id);
								if($foundRole) {
									$_SESSION['system_user_uid'] = $foundUser->id;
									$_SESSION['currentUID'] = $_SESSION['system_user_uid'];
									$_SESSION['system_user_role'] = $foundRole->id;

									// TODO: START: Current Logged In User Information

									$_SESSION['useruid'] = $foundUser->id;
									$_SESSION['fname'] = $foundUser->fname;
									$_SESSION['mname'] = $foundUser->mname;
									$_SESSION['lname'] = $foundUser->lname;
									$_SESSION['email'] = $foundUser->email;
									$_SESSION['phone'] = $foundUser->phone;

									$gender = Role::getByID();
									if($foundUser->gender == 'F') {
										$_SESSION['gender'] = "Female";
									}else if($foundUser->gender == 'M'){
										$_SESSION['gender'] = "Male";
									}

									$_SESSION['username'] = $foundUser->username;
									$department = Department::getByID($foundUser->dept_id);
									$_SESSION['department'] = $department->name;
									$_SESSION['role'] = $foundRole->name;

				
									$_SESSION['status'] = $foundUser->status;
									$_SESSION['description'] = $foundUser->user_desc;

									$user = SystemUser::getByID($foundUser->createdby);
									$_SESSION['addedby'] = $user->fname." ".$user->mname." ".$user->lname;
									$_SESSION['ago'] = $foundUser->timestamp;
									$_SESSION['since'] = date("l jS \of F Y h:i:s A", $foundUser->timestamp);

									// TODO: START: Current Logged In User Information

									global $session;
									$session->login($foundUser);
									$roles = Role::getByID($foundUser->role_id);
									$_SESSION['currentTime'] = time();
									loginLogAction("Login", "$roles->name", $foundUser->phone, $foundUser->email, "Successfully", $foundUser->gender, "$foundUser->fname $foundUser->mname $foundUser->lname");
									redirect_to('../../src/uhome');	
								}else {
									$session->message("No role found that match the credentials");
									redirect_to('../../auth/');
								}
							}else {
								$session->message("Error in signing in.");
								redirect_to('../../auth/');
							}
						}else {
							$session->message("No User found that match the credentials");
							redirect_to('../../auth/');
						}
					}else {
						$session->message("No User found that match the credentials");
        				redirect_to('../../auth/');
					}
				}					
			}else {
        		redirect_to('../../auth/');
			}
		}else if(isset($_POST['success-submit'])) {
			$email = $_SESSION['login-email'];
			$password = $_SESSION['passcode'];
			$role_id = $_SESSION['role_id'];

			$foundUser = SystemUser::authenticate($email);
			if($foundUser) {
				if(CainamCrypt::quin($password, $foundUser->passcode)) {
					if($foundUser->status == "verified") {
						if($foundUser){
							global $session;
							$session->login($foundUser);
							log_action('Login', "{$foundUser->username} logged in.");
							redirect_to('../../src/uhome');
						}else {
							$session->$message = "Username/password combination mismatch/Incorrect";
							redirect_to('../../auth/');
						}
					}else {
						global $session;
						$session->login($foundUser);
						redirect_to('../verification/');
					}
				}else {

				}
			}
		}
	}
?>