// Given 2 numbers, find the one closest to 10. if they are equidistant, output second number.

d = prompt("Enter any number");
e = prompt("Enter another number");

function EquidistantTo10(d,e) {
	if (Math.abs(10-d) < Math.abs(10-e)) {
		console.log("The number closest to 10 is " + d);
	}
	else {
		console.log("The number closest to 10 is " + e);
	}
}

EquidistantTo10(d,e);