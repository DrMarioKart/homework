// Given a number, whole, or floating. Round a number to the nearest whole number without using Math.round() and output the result

f = prompt("Enter any number");
g = 0;

function roundToNearest(f){
	g = f.toString();
	if (g.indexOf(".") === -1) {
		console.log(g + " is a whole number already");
	}
	else 
	{
		i = Number(g.substr(g.indexOf(".")))
		if (i >= 0.5) {
			console.log("The closest whole number is " + (1+Number(g.substring(0,g.indexOf(".")))));
		}
		else {
			console.log("The closest whole number is " + g.substring(0,g.indexOf(".")));
		}
	}
	
}

roundToNearest(f);