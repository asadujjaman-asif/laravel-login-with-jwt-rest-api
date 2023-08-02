<section class="main-area">
		<form action="" id="form" class="form">
			<h2>Verify OTP</h2>
			<div class="input-control">
				<label for="otp">OTP Code</label>
				<input type="text" class="input-field" id="otp" placeholder="Enter your OTP here" msg="OTP is required">
				<i class="fa-solid fa-circle-exclamation failure-icon"></i>
        		<i class="fa-regular fa-circle-check success-icon"></i>
				<small class="error"></small>
			</div>
			<button class="submit-button">Register User</button>
		</form>
		<hr>
        <div class="have-account">	
            <a href="{{route('login')}}">Sign In</a>
            <a>|</a>
            <a href="{{route('register')}}">Sign Up</a>
        </div>
	</section>
	<script type="text/javascript">
		const formElement=getInput('form');
		const otp=getInput('otp');
		formElement.addEventListener('submit',function(e){
			e.preventDefault();
			isRequired(
				[otp]
			);
		});
		function getInput(id){
			const input = document.getElementById(id);
			return input;
		}
		function isRequired(inputArr){
			inputArr.forEach(function(inputField){
				inputField.value===''?showErrorMessage(inputField,inputField.getAttribute("msg")):showSuccessMessage(inputField);
			});
		}
		function checkLength(input,min,max,message){
			if(input.value.length<min){
				showErrorMessage(input,message+" must be atleast "+min+" characters");
			}else if(input.value.length>max){
				showErrorMessage(input,message+" must be less than "+max+" characters");
			}else{
				showSuccessMessage(input);
			}
		}
		function showErrorMessage(inputName,message){
			var elementName=inputName.parentElement;
			elementName.className='input-control error-msg show-msg';
			elementName.querySelector('small').innerText=message;
			elementName.getElementsByClassName('failure-icon')[0].style.opacity = '1';
			elementName.getElementsByClassName('success-icon')[0].style.opacity = '0';
		}
		function showSuccessMessage(inputName){
			var elementName=inputName.parentElement;
			elementName.className='input-control success-msg show-msg';
			elementName.querySelector('small').innerText='';
			elementName.getElementsByClassName('success-icon')[0].style.opacity = '1';
			elementName.getElementsByClassName('failure-icon')[0].style.opacity = '0';
		}
	</script>