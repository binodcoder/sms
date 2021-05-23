//validation text here
const inputs=document.querySelectorAll('input');
const form=document.getElementById('form');
const patterns={
	name:/^\D*$/,
	address:/^\D*$/,
	email:/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/,
	phone:/^[1-9]\d{2}-\d{3}-\d{4}/,
	faculty:/^\D*$/,
	password:/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/
	};
inputs.forEach((input)=>{
	input.addEventListener('keyup',(e)=>{
		validate(e.target, patterns[e.target.attributes.name.value])
	});
});
//validatin function
function validate(field,regex){
	if(regex.test(field.value)){
		field.className='valid';
	}else{
		field.className='invalid';
	}
}
form.addEventListener('submit',(e)=>{
	e.preventDefault();
})

