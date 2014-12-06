<?php
class FrontController extends Controller {

	const PERSON_NAME = "personName";
	const SUBJECT = "subject";
	const EMAIL = "email";
	const MESSAGE = "message";
	const MESSAGE_SENT = "messageSent";

	public function actionHome() {
		$this->title = "Home";
		$this->render ( "home" );
	}
	public function actionContact() {
		$form = $this->resolvePost ( [ 
				self::PERSON_NAME,
				self::SUBJECT,
				self::EMAIL,
				self::MESSAGE 
		] );
		$params = [ ];
		if ($form != null) {
			$params [self::MESSAGE_SENT] = true;
		}

		$this->title = "Contact Us";
		$this->render("contact",$params);
	}
	public function actionAbout() {
		$this->title = "Who We Are (Marshall)";
		$this->render ( "about" );
	}
	public function actionServices() {
		$this->title = "What we do";
		$this->render ( "services" );
	}
}
