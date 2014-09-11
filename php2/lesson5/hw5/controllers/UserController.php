<?php 
class UserController extends AbstractController
{
	public function signUpAction()
	{
		$view = new View;
		$view->display('SignUpForm.php');
	}

	public function signInAction()
	{
		$view = new View;
		$view->display('SignInForm.php');
	}
}

?>