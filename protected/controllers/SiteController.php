<?php
	class SiteController extends Controller{
		public function actionIndex(){
			$nedediler = Nedediler::model()->findAll();
			$this->render('index',array("nedediler"=>$nedediler));
		}
	}