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

    <style type="text/css">

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
            <input id="uploadImage" type="file" accept="image/*" name="image" class="uploadimg form-control imageCheck"/>
            <input class="form-control noteCheck" type="text" placeholder="popisek" aria-label="note">
        </div>
        <div class="col-md-4">
            <label for="formFile" class="form-label">druhý</label>
            <input id="uploadImage2" type="file" accept="image/*" name="image" class="uploadimg form-control imageCheck"/>
            <input class="form-control noteCheck" type="text" placeholder="popisek" aria-label="note">
        </div>
        <div class="col-md-4">
            <label for="formFile" class="form-label">třetí</label>
            <input id="uploadImage3" type="file" accept="image/*" name="image" class="uploadimg form-control imageCheck"/>
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
	$(document).ready(function(){
		let EL_browse;

		let imageOne = null;
		let imageTwo = null;
		let imageThree = null;


		$('.uploadimg, .btn-primary').on('change', function() {
			console.log("test");
			var file_data = $(this).prop('files')[0];
			var form_data = new FormData();
			var ext = $(this).val().split('.').pop().toLowerCase();
			EL_browse = $(this).attr("id");
			if ($.inArray(ext, ['png','jpg','jpeg']) == -1)   {
				alert("only jpg and png images allowed");
				changeState("red");
				return;
			}

			var _URL = window.URL || window.webkitURL;
			var file, img;
			if ((file = this.files[0])) {
				img = new Image();
				var objectUrl = _URL.createObjectURL(file);
				img.onload = function () {
					console.log(this.width);
					console.log(this.height);
					_URL.revokeObjectURL(objectUrl);
				};
				img.src = objectUrl;
			}
			var picsize = (file_data.size);
			console.log(picsize); /*in byte*/
			if(picsize > 2097152) /* 2mb*/
			{
				alert("Image allowd less than 2 mb")
				return;
			}
			form_data.append('file', file_data);

			console.log($(this).attr("id"));
			EL_browse = $(this).attr("id");
			if (EL_browse === "uploadImage")
				imageOne = 1;
			if (EL_browse === "uploadImage2")
				imageTwo = 1;
			if (EL_browse === "uploadImage3")
				imageThree = 1;
			changeState("green");

			if (imageOne != null && imageTwo != null && imageThree != null){
				$.ajax({
					url: 'save.php', /*point to server-side PHP script */
					dataType: 'text',  /* what to expect back from the PHP script, if anything*/
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,
					type: 'post',
					success: function(res){
						console.log(res);
					}
				});
            } else {
				console.log("chybička");
            }
		});

		function changeState(color) {
			console.log(color);
			$("#" + EL_browse).parent().css("background", color)
		}

	})

</script>


</body>
</html>
