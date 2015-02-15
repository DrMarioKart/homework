z = prompt("Enter any string");

function capLast3(str) {
	console.log(str.substr(0,str.length-3)+str.substr(str.length-3).toUpperCase());
};

capLast3(z);