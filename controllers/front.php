<?php
class FrontController extends Controller {
	const PERSON_NAME = "personName";
	const SUBJECT = "subject";
	const EMAIL = "email";
	const MESSAGE = "message";
	const MESSAGE_SENT = "messageSent";
	public function actionHome() {
		$this->title = "Home";
		$this->description = "Quick and Dirty homepage.";
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
		$this->description = "Quick and Dirty contact page.";
		$this->render ( "contact", $params );
	}
	public function actionAbout() {
		$this->title = "Who We Are (Marshall)";
		$this->description = "About the Quick and Dirty.";
		$this->render ( "about" );
	}
	public function actionServices($locationId) {
		$this->title = "Services";
		$this->description = "Services offered by the Quick and Dirty.";
		$model = Location::findOne ( $locationId );
		$model == null ? $this->notfound () : $this->render ( "services", $model );
	}
}
