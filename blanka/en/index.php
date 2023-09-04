<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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

    <title>One sentence a day | Blanka Kirchner</title>
</head>
<body>

<div id="Container">
	<div class="headerControls">
		<span class="langButton"><a href="../cs">cz</a></span>
		<span class="dateBlock">17. 4. – 20. 5. 2023</span>
	</div>

	<div class="headerSentences">
		<span class="mainSentence">Same place. </span>
		<span class="mainSentence">Same time. </span>
		<span class="mainSentence">Different perspectives.</span>
	</div>

	<p>
		Students and University staff write <strong>one sentence a day</strong> to create a mutual layer of memories.
	</p>

	<p class="italicParagraph">
		What unexpected or interesting thing did you learn in your field today?<br>
		What topic interests you the most and do you plan to explore it?<br>
		Did something happen at the faculty today that surprised you or made you happy?<br>
		Write a sentence from your study notes.<br>
		What are you looking forward to in connection with FP?<br>
	</p>

	<div id="SentenceControls">
		<form id="SentenceForm">
			<textarea id="Sentence" name="Sentence" rows="2" placeholder="Enter your sentence"></textarea>
			<input type="submit" value="Submit" id="SaveSentence" onclick="saveChanges(event);">
		</form>
	</div>

	<div id="ThanksBox" class="boxHidden">
		Thank you! Do not forget to submit new sentence tomorrow 🙂
	</div>

	<div id="HowTo">
		<h3>How do I submit my sentence?</h3>
		<ol>
			<li>on this page via the web application</li>
			<li>on the cards that are prepared in <strong>bluilding P</strong> and <strong>at the study</strong> department of building G</li>
			<li>by sending to e-mail: <a href="mailto:fp.jednavetadenne@tul.cz">fp.jednavetadenne@tul.cz</a></li>
			<li>by sharing #FPjednavetadenne</li>
		</ol>
	</div>

	<div id="AboutProject">
		<h3>About the project</h3>
		<p>
			The collection of sentences from <strong>students and employees of FP TUL</strong> will be processed anonymously.
			The result will be a textual and visual structure symbolically representing the "soul" of the faculty,
			which will be realized as a work of art in a public space. Specifically, on the <strong>facade of block P</strong> or
			in the <strong>adjacent area of block P</strong> in the center of Liberec. The artwork will be part of the exhibition
			project Seminar of Hope (curated by Prof. Michal Koleček), which will take place in the autumn of 2023
			on the occasion of the celebration of 70 years of TUL.
		</p>
		<p>
			<strong>All sentences will become part of the booklet</strong> and selected sentences will be used for printing T-shirts, bags and other advertising materials of the faculty.
		</p>
	</div>

	<div id="Contact">
		<h3>Contact</h3>
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
					printMessage("sentence saved");

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
			printMessage("missing text");
		}
	}

	$.getJSON("https://api.ipify.org?format=json", function(data) {
		ipAdress = data.ip;
		console.log(data.ip);
	});

	var x = document.getElementById("snackbar");

	function printMessage(message) {
		x.innerText = message;
		x.className = "show";

		setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
	}
</script>
</body>

