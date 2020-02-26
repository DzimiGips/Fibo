<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="jquery.transit.min.js"></script>
<script>

$(document).ready(function() {

	let fiboArr, i, timerRef;
	
	$("#galBtn").on("click", function() {
		$("#gallery").show();
		$("#fibonacci").hide();
	});

	$("#fiboBtn").on("click", function() {
		$("#fibonacci").show();
		$("#gallery").hide();
	});

	$("#fibonacci").hide();

	$(".photoBoxLeft, .photoBoxRight").mouseover(function() {
		$(this).find(".mask").show();
		$(this).find(".photo").transition({filter: 'brightness(30%)'}, 500, 'ease');
	});

	$(".photoBoxLeft, .photoBoxRight").mouseleave(function() {
		$(this).find(".mask").hide();
		$(this).find(".photo").finish();
		$(this).find(".photo").transition({filter: 'brightness(100%)'}, 500, 'ease');
	});

	$("#calculate").on("click", function () {
		let n = $("#fiboInput").val();
		$.post("getFibonacci.php", {
			n: n 
		}, function(result) {
			fiboArr = result.split(",");
			i = 0;
			$("#result").text("");
			timerRef = setInterval(function(){
				if(i < fiboArr.length)
				{
					$("#result").append(fiboArr[i] + "<br>");
					i++;
				}
				else
				{
					clearInterval(timerRef);
				}
			}, 3000);
		});
	});
});

</script>

<!DOCTYPE html>
<html>
<head>
	<title>Fibonacci</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	
</head>
<body>

<?php include("menu.php") ?>

<div id="gallery">
<h1 class="title">Gallery</h1>
<div class="photoBoxLeft">
	<img class="photoLeft photo" src="photos/photo1.jpg">
	<div class="mask">
   		<h2 class="photoTitle">Photo #1</h2>
    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
</div>
<div class="photoBoxRight">
	<img class="photoRight photo" src="photos/photo2.jpg">
	<div class="mask">
   		<h2 class="photoTitle">Photo #2</h2>
    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
</div>
<div class="photoBoxLeft">
	<img class="photoLeft photo" src="photos/photo3.jpg">
	<div class="mask">
   		<h2 class="photoTitle">Photo #3</h2>
    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
</div>
<div class="photoBoxRight">
	<img class="photoRight photo" src="photos/photo4.jpg">
	<div class="mask">
   		<h2 class="photoTitle">Photo #4</h2>
    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
</div>
</div>

<div id="fibonacci">
	<h1 class="title">Fibonacci</h1>
	<div id="main">		
		<input id="fiboInput" placeholder="Podaj liczbe n">
		<button id="calculate">Wylicz</button><br>
		<p id="result"></p>
	</div>
</div>

</body>
</html>