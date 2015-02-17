//Determine if a number is prime or not
//Then find all primes between 2 and 1000
//Then find all primes between 2 and 10,000 etc
function isPrime(n) {	
	var limit = Math.round(Math.sqrt(n));
	var counter = 3;
	if (n % 2 === 0) {
		return(false);
	}
	else {
		while (counter <= limit) {
			if (n % counter === 0) {
				return(false);
			}
			else {
				counter = counter + 2;
			}
		}
		return(true);
	}
}

function makePrimesList() {
	var lim = prompt("Enter a number to list all primes between it and 2");
	var count = 3;
	var answers = [];
	while (count <= lim) {
		if (isPrime(count)) {
			answers.push(count);
		}
		else {
		}
		count += 2;
	}
	for (var i = 0; i < answers.length; i++) {
		console.log(answers[i]);
	}
}

makePrimesList();

