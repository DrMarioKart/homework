// Find the largest in an array & output the number.  Array has positive integers from 1 to n, in any order.
var ar = [4,2,10,20,1];

function largestIntInArray(x) {
	biggest = 0;
	for (var i = 0; i < x.length; i++) {
		if (x[i] >= biggest) {
			biggest = x[i];
		}
	}
	console.log(biggest);
}

largestIntInArray(ar);