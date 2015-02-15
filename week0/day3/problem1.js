x = prompt("Enter any string");

function swapFirstLastLetter(str) {
	console.log(str.substring(str.length-1) + str.substring(1,str.length-1) + str.substring(0,1));
}
swapFirstLastLetter(x);
