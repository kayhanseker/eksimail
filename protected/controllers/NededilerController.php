<?php
	class NededilerController extends Controller{
		public function get_data($url) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			 curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
			$data = curl_exec($ch);
			curl_close($ch);
			return $data;
		}		
		public function actionIndex(){
			date_default_timezone_set('America/Los_Angeles');
				header('Content-Type: text/html; charset=utf-8');
				include ('libs/simple_html_dom.php');
			$html = str_get_html($this->get_data('http://www.eksisozluk.com/show.asp?t=last%2Efm'));
			$text = $html->find('.eol li');

			foreach($text as $t){
				$id =  str_replace("d","",$t->id);
				$text = explode('<div class="aul">',$t->innertext);
				$text = $text[0];
				//echo $text;
				
				$info = str_get_html($t->innertext);
				$info = $info->find('.aul');
				foreach($info as $i){
					
					 $info = explode(',',str_replace(array("(",")"),"",$i->plaintext));
					 $author = trim($info[0]);
					 $date = explode("~",trim($info[1]));
					 $date =  date("Y-m-d H:i:s",strtotime(trim($date[0])))."\n";
					 
				}
				$nd = new Nedediler();
				$nd->id = $id;
				$nd->text = $text;
				$nd->author = $author;
				$nd->created_time = $date;
				try{
					$nd->save(false);
				}catch(Exception $e){

				}
			}

		}
	}