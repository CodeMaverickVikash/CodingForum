const form = document.getElementById('form');
const firstname = document.getElementById('firstName');
const lastname = document.getElementById('lastName');
const email = document.getElementById('email');
const password = document.getElementById('password');
const c_password = document.getElementById('c_password');

form.addEventListener('submit', (e) => {
	e.preventDefault();

	checkInputs();
});

function setErrorFor(input, message){
	const formv = input.parentElement; // formv
	const small = formv.querySelector('small');

	// add error message inside small
	small.innerText = message;

	// add error class
	formv.className = 'formv error';

}

function setSuccessFor(input){
	const formv = input.parentElement; // formv

	// add error class
	formv.className = 'formv success';

}

function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

const sendData = (data, sRate, count) =>{
	if (sRate == count) {
		// console.log(data.firstname);
		$.ajax({
			url: "partials/signuphandler.php",
			type: "post",
			data: data,

			success: function(data, status){
				// alert("successfully inserted");
				var showError = "username already exist";
				if (data == showError) {
					alert(data);
				}else{
					location.href = `login.php`;
				}
				
			}
		});
		// template literals
		// location.href = `partials/signuphandler.php?data=${obj}`
	}
}

// for sending data to another page or anywhere
const successMsg = (data) =>{
	let formCon = document.getElementsByClassName('formv');

	var count = formCon.length - 1;
	for(var i=0; i<formCon.length ; i++){
		if (formCon[i].className == "formv success") {
			var sRate = 0 + i;
			sendData(data, sRate, count);
		}else{
			return false;
		}
	}
}

function checkInputs(){
	// get value from the input
	const firstnameValue = firstname.value.trim();
	const lastnameValue = lastname.value.trim();
	const emailValue = email.value.trim();
	const passwordValue = password.value.trim();
	const c_passwordValue = c_password.value.trim();
	// console.log(firstnameValue);

	// json object
	var data = {"firstname": firstnameValue,"lastname": lastnameValue,"email": emailValue,"password": passwordValue,"c_password": c_passwordValue};

	if (firstnameValue == '') {
		// show error
		// add error class
		setErrorFor(firstname, 'This field is required');
	}
	else{
		// add success class
		setSuccessFor(firstname);
	}

	if (lastnameValue == '') {
		// show error
		// add error class
		setErrorFor(lastname, 'This field is required');
	}
	else{
		// add success class
		setSuccessFor(lastname);
	}

	if(emailValue === '') {
		setErrorFor(email, 'This field is required');
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Please enter a valid email');
	} else {
		setSuccessFor(email);
	}

	// for password
	if (passwordValue == '') {
		// show error
		// add error class
		setErrorFor(password, 'This field is required');
	}
	else{
		// add success class
		setSuccessFor(password);
	}

	if(c_passwordValue === '') {
		setErrorFor(c_password, 'This field is required');
	} else if(passwordValue !== c_passwordValue) {
		setErrorFor(c_password, 'Passwords does not match');
	} else{
		setSuccessFor(c_password);
	}

	// console.log("Everthing is ok");
	successMsg(data);
}