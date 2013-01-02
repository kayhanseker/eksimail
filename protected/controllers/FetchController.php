<?php
class FetchController extends Controller{
	public function init(){
		header('Content-Type: text/html; charset=utf-8');
		include ('libs/simple_html_dom.php');
	}
	public function actionTest(){
		echo $this->get_data('http://www.bahcesehir.edu.tr');
	}
	public function get_data($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
	public function actionGetall(){
		//Entryleri çeker
		$html = str_get_html($this->get_data('http://www.eksisozluk.com/stats.asp?id=2-1'));
		$links = $html->find('table tr a');
		$allLinks = array();
		foreach($links as $link){
			$link = $link->href;
			if(strpos($link,"show.asp?id=")!==false){
				$allLinks[] = (int) str_replace("show.asp?id=","",$link);
			}
		}

		foreach($allLinks as $l){
			$this->getDetail($l);		
		}
		echo count($allLinks);
	}
	public function getDetail($id){

		$html = str_get_html($this->get_data('http://www.eksisozluk.com/show.asp?id='.$id));
		$text = $html->find('.eol li');

		if(count($text)<1){
			return false;
		}
		$topic = $html->find('h1');
		foreach($topic as $t){
			$topic = $t->plaintext;
		}
		foreach($text as $t){
			$parts =  explode('<div class="aul">',$t->innertext);
		}
		$details = $html->find(".aul");
		foreach($details as $d){
			$details =  $d->plaintext;
		}
		$details = explode(",",str_replace(array("(",")"),"",$details));

		$text =  $parts[0];
		 
		$_author = trim($details[0]);
		$date_net = explode("~",$details[1]);
		$created_time =date("Y-m-d H:i:s",strtotime(trim($date_net[0])));

		$author = Author::model()->find('author_username="'.$_author.'"');
		if(!$author){
			$author 				 = new Author();
			$author->author_username = $_author;
			$author->save();
		}
		
		$topic_text = str_replace(array("&#305;","&#287;","&#252;","&#351;","&#231;","&#246;",),array("ı","ğ","ü","ş","ç","ö"),$topic);

		$entry = new Entry();
		$entry->id 				= $id;
		$entry->like_date		= date("dmY");
		$entry->topic_text 		= $topic_text;
		$entry->text 			= $text;
		$entry->author_id 		= $author->author_id;
		$entry->created_time	= $created_time;
		try{
			$entry->save(false);
		}catch(Exception $e){

		}
		
	}
}