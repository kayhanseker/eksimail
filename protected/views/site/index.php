
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Eksi Mail</title>
		<style>
		body{
			background-color:#414141;
			color:#fff;
			font-family:courier new;

		}
		h1{
			font-size:18px;
		}
		a{
			color:#f1f1f1;
		}
		ol li{
			font-size:13px;
			padding:10px 0px;
		}
		.nedediler{
			width:100%;height:450px;overflow:scroll;
			margin-top:10px;
			background-color:#1f1f1f;
		}
		input,.btn,select{
			font-family:courier ;
			font-size:13px;
			padding:3px;
		}
		</style>
	</head>
	<body>
		<h1 style="font-size:30px;text-align:center;">Huzurlarınızda, Ekşi Mail!</h1>
		<h1>Kimdir ?</h1>
		<p>Ahmet Kayhan Şeker ve Onur Özdoğan'ın Special Topics in Computer Engineering dersi projesidir.</p>
		<h1>Nedir ?</h1>
		<p>Madem vakit harcıyoruz; neden işe yarar bir şey yapmayalım diyen iki ekşi sözlük okurunun her gün "en beğenilen" entryleri okurken yaşadıkları vakit kaybını azaltmak amacıyla "abi öyle bişey yapalım ki bize mail atsın". diyerek başladıkları dönem projesidir. Kısaca: her gün istediğiniz saatte, istediğiniz e-posta adresine en beğenilen entry'leri gönderir.</p>
	<div id="uyelik">
		<h1>Üye ol!</h1>
		Ekşimail &nbsp;<input type="text" placeholder="e-posta"/> adresine 
		<select>
			<option>sabah</option>
			<option>öğle</option>
			<option>akşam</option>
			<option>gece</option>									
		</select>&nbsp; saatlerinde mail <input style="width:70px;padding:3x" class="btn" type="button" value="atsın." />
	</div>
	<br />
	<h1>Ivır zıvır...</h1>
	<p>Üyelikten ayrılmak için maillere link koyduk.</p>
	<p>Ekşisözlük'le herhangi bir alakamız yok falan.(hukuki metin.)</p>
	<br /><br /><h1>Ne dediler ?</h1>
	<div class="nedediler">
		
	<ol>
	<?php
	foreach($nedediler as $n){
		echo "<li>".str_replace("show.asp","http://www.eksisozluk.com/show.asp",$n->text)."</li>";
	}
	?>
</ol>
</div>
	</body>
</html>