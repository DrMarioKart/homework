// Given A, B, C, which of them is the biggest number? Output result
a = prompt("Enter the first number");
b = prompt("Enter the second number");
c = prompt("Enter the third number");

function biggestnumberABC(a,b,c) {
	if ((a <= b) && (b <= c)) {
		console.log("The biggest number is " + c);
	}
	else if ((a <= b) && (b >= c)) {
		console.log("The biggest number is " + b);
	}
	else if ((a >= b) && (b >= c)) {
		console.log("The biggest number is " + a);
	}
	else {
		console.log("The biggest number is " + a);
	}
};	

biggestnumberABC(a,b,c);
