<?php
	class SendController extends Controller{
		public function init(){
			header('Content-Type: text/html; charset=utf-8');
		}
		public function actionIndex($id=null){
			if(!isset($id)){
				return false;
			}
			$members = Member::model()->findAll('mail_period="'.$id.'"');
			$today = date("dmY");
			$entries = Entry::model()->with('authors')->findAll('like_date='.$today);
			foreach($entries as $e){
				echo $e->text;
			}
			exit;
			foreach($members as $m){
				Mail::send(array($m->member_email),'asdasd','asdasd','asdasd');
			}
		}
	}