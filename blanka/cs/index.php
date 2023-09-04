<!DOCTYPE html>
<html lang="cs" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="author" content="Jan Rouha">
    <meta name="description" content="TUL, FUA, KUM">
    <meta name="keywords" content="TUL, FUA, KUM">

    <meta property="og:image" content="../www/images/arttul_image.jpg" />

	<script src="../jquery.min.js?545"></script>

	<link rel="stylesheet" href="../styles.css?545">

    <link rel="icon" sizes="32x32" href="../favicon.png">

    <title>Jedna věta denně | Blanka Kirchner</title>
</head>
<body>

<div id="Container">
	<div class="headerControls">
		<span class="langButton"><a href="../en">en</a></span>
		<span class="dateBlock">17. 4. – 20. 5. 2023</span>
	</div>

	<div class="headerSentences">
		<span class="mainSentence">Stejné místo. </span>
		<span class="mainSentence">Stejný čas. </span>
		<span class="mainSentence">Jiné pohledy.</span>
	</div>

	<p>
		Studenti a zaměstnanci FP TUL zapisují <strong>jednu větu denně</strong> a tvoří společnou vrstvu vzpomínek.
	</p>

	<p class="italicParagraph">
		Co nečekaného či zajímavého jste se dnes ve svém oboru dozvěděli?<br>
		Jaké téma Vás nejvíce zajímá a plánujete jej prozkoumat?<br>
		Došlo dnes na fakultě k nějaké situaci, která Vás překvapila nebo Vám udělala radost?<br>
		Opiš větu z Tvých studijních poznámek.<br>
		Na co se těšíte ve spojitosti s FP?<br>
	</p>

	<div id="SentenceControls">
		<form id="SentenceForm">
			<textarea id="Sentence" name="Sentence" rows="2" placeholder="Zapiš svoji větu"></textarea>
			<input type="submit" value="Odeslat" id="SaveSentence" onclick="saveChanges(event);">
		</form>
	</div>

	<div id="ThanksBox" class="boxHidden">
		Děkujeme za účast, zítra pošli další! 🙂
	</div>

	<div id="HowTo">
		<h3>Jak svoji větu doručím?</h3>
		<ol>
			<li>na této stránce přes webovou aplikaci</li>
			<li>na kartičkách, které jsou připraveny v <strong>bloku P</strong> a <strong>na studijním</strong> oddělení bloku G</li>
			<li>zasláním na e-mail: <a href="mailto:fp.jednavetadenne@tul.cz">fp.jednavetadenne@tul.cz</a></li>
			<li>sdílením označením #FPjednavetadenne</li>
		</ol>
	</div>

	<div id="AboutProject">
		<h3>O projektu</h3>
		<p>
			Sbírka vět od <strong>studentů a zaměstnanců FP TUL</strong> bude anonymně zpracována. Výsledkem bude textová a
			vizuální struktura symbolicky reprezentující „duši“ fakulty, která bude realizovaná jako umělecké dílo ve veřejném
			prostoru. Konkrétně na <strong>fasádě bloku P</strong> či v přilehlém <strong>okolí bloku P</strong> v centru Liberce. Umělecké dílo bude součástí
			výstavního projektu Seminář naděje (kurátor prof. Michal Koleček), který se koná na podzim roku 2023 u příležitosti oslav 70 let TUL.
		</p>
		<p>
			<strong>Všechny věty se stanou součástí bookletu</strong> a vybrané věty budou použité na potisk triček, tašek a jiných reklamních materiálů fakulty.
		</p>
	</div>

	<div id="Contact">
		<h3>Kontaktní osoba</h3>
		<a href="https://www.tul.cz/univerzita/fua/katedry-a-pracoviste/kum/blanka-kirchner/" target="_blank">MgA. Blanka Kirchner</a>
		<a href="mailto:blanka.kirchner@tul.cz">blanka.kirchner@tul.cz</a>
	</div>

	<div id="Footer">
		<a class="footerLogo" href="https://www.tul.cz/" target="_blank">
			<img src="../images/tul.svg" alt="TUL">
		</a>
		<a class="footerLogo" href="https://www.fp.tul.cz/" target="_blank">
			<img src="../images/tul_fp.svg" alt="TUL FP">
		</a>
	</div>
</div>

<div id="snackbar">message</div>

<script>
	var data = new FormData();
	var xhr = new XMLHttpRequest();
	var inputSentence;
	var ipAdress;

	var sentenceForm = document.getElementById("SentenceControls");
	var thanksBox = document.getElementById("ThanksBox");

	function saveChanges(event) {
		inputSentence = document.getElementById("Sentence").value;
		console.log(inputSentence);
		event.preventDefault();

		if (inputSentence != "" && inputSentence.length > 1) {
			data.append("ip_address", ipAdress);
			data.append("sentence", inputSentence);

			xhr.open('POST', "../controls/insert.php");
			xhr.onload = function () {
				console.log(this.response);
				var objJSON = this.response;
				if (objJSON.code === 404) {
					console.log("error");
				} else {
					console.log(this.response);
					printMessage("věta zapsána");

					setTimeout(function () {
						inputSentence.value = "";
						sentenceForm.classList.add("boxHidden")
					}, 500);

					setTimeout(function () {
						thanksBox.classList.remove("boxHidden");
					}, 1000);
				}
			};

			xhr.send(data);
		} else {
			printMessage("chybí text");
		}
	}

	$.getJSON("https://api.ipify.org?format=json", function(data) {
		ipAdress = data.ip;
		//console.log(data.ip);
	});

	var x = document.getElementById("snackbar");

	function printMessage(message) {
		x.innerText = message;
		x.className = "show";

		setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
	}
</script>
</body>

