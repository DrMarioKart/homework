<!DOCTYPE html>
<html>
<head>
<title></title>
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.js"></script>
</head>
<body>
<br>
<h2>Find the highest reviewing 20 games from Giantbomb.com in each year</h2>
<p>*This site uses cookies</p>
<br>
<form id="year">
  <select id="year">
    <option value="2008">2008</option>
    <option value="2009">2009</option>
    <option value="2010">2010</option>
    <option value="2011">2011</option>
    <option value="2012">2012</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
  </select>
   <input type="submit" id="submit" value="Submit">
</form>

<script type="text/javascript">

function setCookie(cname, cvalue) {
    document.cookie = cname + "=" + cvalue + ";";
}

  $(document).ready(function(){
      $('input[type=submit]').click(function(e){
        //Variables to grab input fields and checkboxes
        e.preventDefault();
        document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
        year = $('select#year').val();
        setCookie("date", year);
        window.location = "giantbomb.php";
      });
    });

</script>
</body>
</html>
