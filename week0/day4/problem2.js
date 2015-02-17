// Given an Int array - Compute the sum of an integer array, output sum.

var ar = [4,2,10,20,1];

function sumIntArray(x) {
	total = 0;
	for (var i = 0; i < x.length; i++) {
		total += x[i];
	}
	console.log(total);
}

sumIntArray(ar);