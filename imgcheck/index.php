<!DOCTYPE html>
<html lang="cs" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Jan Rouha">
    <meta name="description" content="TUL, FUA, KUM">
    <meta name="keywords" content="TUL, FUA, KUM">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <script src="../www/js/fontAwesome.js" crossorigin="anonymous"></script>
    <script src="../www/js/sadQuery.js"></script>

    <link rel="icon" sizes="32x32" href="../favicon.png">

    <title>ART | TUL</title>

    <style>
        .col-md-3 {
            margin-bottom: 10px;
        }

        .row {
            margin-bottom: 10px;
        }

        img {
            display: none;
        }
    </style>


</head>
<body>

<div class="container">
    <div class="row">
        <h1 class="text-center">dokumentace projektu</h1>
        <h3 class="text-center">instrukce</h3>
        <p>jméno, příjmení, ročník, název projektu, text projektu, alespoň tři fotograafie</p>
    </div>
    <div class="row">
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="jméno" aria-label="name">
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="příjmení" aria-label="surname">
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="název projektu" aria-label="project">
        </div>
        <div class="col-md-3">
            <select class="form-select" aria-label="výběr ročníku">
                <option selected disabled>vyber ročník</option>
                <option value="1">1. bakalář</option>
                <option value="2">2. bakalář</option>
                <option value="3">3. bakalář</option>
                <option value="4">4. bakalář</option>
                <option value="5">1. magistr</option>
                <option value="6">2. magistr</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-floating">
                <textarea class="form-control" id="TextArea" style="height: 100px"></textarea>
                <label for="TextArea">anotace projektu</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="formFile" class="form-label">první</label>
            <input class="form-control imageCheck" type="file" id="formFile1" name="first">
            <input class="form-control noteCheck" type="text" placeholder="popisek" aria-label="note">
        </div>
        <div class="col-md-4">
            <label for="formFile" class="form-label">druhý</label>
            <input class="form-control imageCheck" type="file" id="formFile2" name="second">
            <input class="form-control noteCheck" type="text" placeholder="popisek" aria-label="note">
        </div>
        <div class="col-md-4">
            <label for="formFile" class="form-label">třetí</label>
            <input class="form-control imageCheck" type="file" id="formFile3">
            <input class="form-control noteCheck" type="text" placeholder="popisek" aria-label="note">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="preview"></div>
        </div>
    </div>
    <button type="button" class="btn btn-primary">nahrát</button>
</div>

<script>

	let EL_browse;
	let color;
	const EL_preview = document.getElementById("preview");


	// STATE VARIABLES

	$(".btn-primary").on("click", function(){
		//formData.append("second", $("formFile2"));
		//console.log(formData);

		let formData = new FormData($("Form"));

		$.ajax({
			url: "save.php",
			data: formData,
			type: "POST",
			contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
			processData: false, // NEEDED, DON'T OMIT THIS
            success: function(data) {
				console.log(data);
            }
		});
    });


	$(".imageCheck").on("change", function(ev){
		console.log($(this).attr("id"));
		EL_browse = $(this).attr("id");
		changeState("green");

		EL_preview.innerHTML = ""; // Remove old images and data
		const files = ev.target.files;
		//if (!files || !files[0]) return alert("Pouze jpg, png, tiff a gif prosím.");
		[...files].forEach( readImage );
	});

	$(".noteCheck").on("change", function(ev){

    });

		const readImage = file => {
		if ( !(/^image\/(png|jpe?g|gif)$/).test(file.type) ) {
    		changeState("red");
			return EL_preview.insertAdjacentHTML("beforeend", `Tohle nechci -> ${file.type}: ${file.name}<br>`);
        }

		const img = new Image();
		img.addEventListener("load", () => {
			EL_preview.appendChild(img);
			EL_preview.insertAdjacentHTML("beforeend", `<div>${file.name}</br>${img.width}×${img.height}</br>${file.type}</br> ${Math.round(file.size/1024)}KB<div>`);
			window.URL.revokeObjectURL(img.src); // Free some memory
		});
		img.src = window.URL.createObjectURL(file);
	}

    function changeState(color) {
		console.log(color);
	    $("#" + EL_browse).parent().css("background", color)
    }





</script>




</body>
</html>
