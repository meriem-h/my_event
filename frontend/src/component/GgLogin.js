import React from 'react';
import ReactDOM from 'react-dom';
import GoogleLogin from 'react-google-login';

function GgLogin(){
const handleFailure = (result) => {
  alert(result);
}
const handleLogin = (googleData) => {
  console.log(googleData);
}

return(
  <div>
    <div >
  <GoogleLogin id="google" className='ggle nav-item'
    clientId={process.env.REACT_APP_GOOGLE_CLIENT_ID}
    buttonText="Continuer avec Google"
    onSuccess={handleLogin}
    onFailure={handleFailure}
    cookiePolicy={'single_host_origin'}
  ></GoogleLogin>
  </div>
  </div>
)
}
export default GgLogin;
