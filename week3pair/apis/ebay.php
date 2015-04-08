<!DOCTYPE html>
<html>
<head>
<title></title>
</head>

<body>

  <br>
  <form action="giantbomb.php">
    <input type="submit" value="Back To Results Page">
  </form>
  <br>
  <form action="index.php">
    <input type="submit" value="Back To Year Search">
  </form>
  <br>
	<div id="results"></div>
</body>
<script>
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
gtitle = encodeURI(getCookie("query"));
gtitle = "" + gtitle;
console.log(gtitle);
// Parse the response and build an HTML table to display search results
function _cb_findItemsByKeywords(root) {
	var items = root.findItemsByKeywordsResponse[0].searchResult[0].item || [];
  	var html = [];
  	html.push('<table width="100%" border="0" cellspacing="0" cellpadding="3"><tbody>');
  	for (var i = 0; i < items.length; ++i) {
    	var item     = items[i];
    	var title    = item.title;
    	var pic      = item.galleryURL;
    	var viewitem = item.viewItemURL;
    if (null != title && null != viewitem) {
      html.push('<tr><td>' + '<img src="' + pic + '" border="0">' + '</td>' +
      '<td><a href="' + viewitem + '" target="_blank">' + title + '</a></td></tr>');
    }
  }
  html.push('</tbody></table>');
  document.getElementById("results").innerHTML = html.join("");
}  
// End _cb_findItemsByKeywords() function

// Construct the request
// Replace MyAppID with your Production AppID

var url = "http://svcs.ebay.com/services/search/FindingService/v1";
    url += "?OPERATION-NAME=findItemsByKeywords";
    url += "&SERVICE-VERSION=1.0.0";
    url += "&SECURITY-APPNAME=ShaneKuk-3716-4ab8-a380-b482f56c1431";
    url += "&GLOBAL-ID=EBAY-US";
    url += "&RESPONSE-DATA-FORMAT=JSON";
    url += "&callback=_cb_findItemsByKeywords";
    url += "&REST-PAYLOAD";
    url += "&keywords=";
    url += gtitle;
    url += "&paginationInput.entriesPerPage=10";

console.log(url);

    // Submit the request
    s=document.createElement('script'); // create script element
	s.src= url;
	document.body.appendChild(s);
    </script>
<html>