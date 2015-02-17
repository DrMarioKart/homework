x = "racecar"
// x = "hello"
// x = "bob"
// x = "abba"

function palindrome(y) {
	var i = 0
	while (i < parseInt(x.length/2)) {
		z = y.length-i;
		if (y[i] === y[z-1]) {
			i = i + 1;
		}	
		else 
		{
			break;
		}
	}
	if (i == parseInt(x.length/2)) {
		console.log("Palindrome");
	}
	else {
		console.log("Not a Palindrome");
	}
}

palindrome(x);