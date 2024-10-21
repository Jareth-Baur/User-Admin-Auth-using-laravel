/*=============== SHOW HIDE PASSWORD LOGIN ===============*/
const passwordAccess = (loginPass, loginEye) =>{
   const input = document.getElementById(loginPass),
         iconEye = document.getElementById(loginEye)

   iconEye.addEventListener('click', () =>{
      // Change password to text
      input.type === 'password' ? input.type = 'text'
						              : input.type = 'password'

      // Icon change
      iconEye.classList.toggle('ri-eye-fill')
      iconEye.classList.toggle('ri-eye-off-fill')
   })
}
passwordAccess('password','loginPassword')

/*=============== SHOW HIDE PASSWORD CREATE ACCOUNT ===============*/
const passwordRegister = (loginPass, loginEye) =>{
   const input = document.getElementById(loginPass),
         iconEye = document.getElementById(loginEye)

   iconEye.addEventListener('click', () =>{
      // Change password to text
      input.type === 'password' ? input.type = 'text'
						              : input.type = 'password'

      // Icon change
      iconEye.classList.toggle('ri-eye-fill')
      iconEye.classList.toggle('ri-eye-off-fill')
   })
}
passwordRegister('passwordCreate','loginPasswordCreate')

/*=============== SHOW HIDE LOGIN & CREATE ACCOUNT ===============*/
const loginAcessRegister = document.getElementById('loginAccessRegister'),
      buttonRegister = document.getElementById('loginButtonRegister'),
      buttonAccess = document.getElementById('loginButtonAccess')
buttonRegister.addEventListener('click', () => {
   loginAcessRegister.classList.add('active')
})

buttonAccess.addEventListener('click', () => {
   loginAcessRegister.classList.remove('active')
})

// Updated variable names and IDs
const authFormToggle = document.getElementById('authFormToggle');
const navRegisterButton = document.getElementById('navRegisterButton'); // The Register link in the navigation
const navLoginButton = document.getElementById('navLoginButton'); // The Login link in the navigation

// Automatically show the register form when the "Register" link is clicked
navRegisterButton.addEventListener('click', (e) => {
    e.preventDefault(); // Prevent the link from navigating
    authFormToggle.querySelector('.login__access').classList.remove('active');
    authFormToggle.querySelector('.login__register').classList.add('active');
});

// Automatically show the login form when the "Log in" link is clicked
navLoginButton.addEventListener('click', (e) => {
    e.preventDefault(); // Prevent the link from navigating
    authFormToggle.querySelector('.login__register').classList.remove('active');
    authFormToggle.querySelector('.login__access').classList.add('active');
});

