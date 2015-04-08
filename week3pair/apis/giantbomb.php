<!DOCTYPE html>
<html>
<head>
<title></title>
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.js"></script>
<style>
	.line1 {
		font-size: 25px;
		font-weight: bold;
	}

	.line2 {
		font-size: 20px;
	}

</style>
</head>

<body>

 <br>
  <form action="index.php">
    <input type="submit" value="Back to Year Search">
  </form>
  <br>
<div class="results">

</div>
<script>

function setCookie(cname, cvalue) {
    document.cookie = cname + "=" + cvalue + ";";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}

function toEbay(title){
	setCookie("query", title);
	window.location = "ebay.php";
}

date = getCookie("date");
newDate = "publish_date:"+ date + "-01-01T09:28:56.321-10:00|"+ date + "-12-31T09:28:56.321-10:00";

$(document).ready(function(){
	$.ajax({
		url: "http://api.giantbomb.com/reviews/",
		type: "get",
		data: {api_key : "6fd9cea9f7e2232faec128a7dd7265ff15177205", filter : newDate, limit : "20", sort : "score:desc", field_list : "game"|"deck", format : "jsonp", json_callback : "gamer"},
		dataType: "jsonp",
        });
});

function gamer(data) {
	for (i = 0; i<20; i++) {
		temp = data.results[i];
	title = "" + temp.game.name;
	desc = "" + temp.deck;
	score = "" + temp.score;
	link = temp.site_detail_url;
	platforms = temp.platforms;
	publishDate = temp.publish_date;
	glink = "<a href=\'" + link + "\'>See full review at Giantbomb.com</a>";
	ebayButton = "<div><button type='button' onclick='toEbay(\"" + title + "\")'>Buy on Ebay</button></div>";

	$('.results').append("<div class='line1'> #" + (i+1) + " "+ title + " for " + platforms + "</div>");
	$('.results').append("<div class='line2'>Score : " + score + " out of 5 " + "- published: " + publishDate);
	$('.results').append("<br>");
	$('.results').append("<div class='line3'>Summary : " + desc);
	$('.results').append("<br>");
	$('.results').append("<div class='line4'>" + glink + "</div>");
	$('.results').append("<br>");
	$('.results').append(ebayButton);
	$('.results').append("<br>");
	$('.results').append("<hr>");
	}
}

</script>
</body>
</html>