y = prompt("Enter a 5 character string")

function cutLast3of5(str) {
	console.log(str.substr(str.length-3));
};

cutLast3of5(y);