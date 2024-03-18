import React from 'react';
import { useState} from 'react';
import "../App.css";

function Login() {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
  
    const [submitted, setSubmitted] = useState(false);
    const [error, setError] = useState(false);
   
  
    const handleEmail = (e) => {
      setEmail(e.target.value);
      setSubmitted(false);
    };
   
    const handlePassword = (e) => {
      setPassword(e.target.value);
      setSubmitted(false);
    };
  
    const onSubmit = (event) =>{
      event.preventDefault()  
  
      let url = '/api/login'
      let tmp = {"email":email, "password":password};
      let _object = JSON.stringify(tmp);
  
      function HandleResponse(){
        window.location.href = "/"
      }
      
      function HandleError(){
        alert('Echec de votre connexion!')
      }
      fetch(url, { method: "POST", body:_object})
      .then((res) => {
        console.log(res);
        if(res.status === 200){
          HandleResponse();
        } else{
          HandleError();
        }
      })
      
    }

  return (
    <div className='container'>
    <div className='cont'>
        <div className="title">Connexion</div>
        <form onSubmit={onSubmit} className="form">
          <input className="input" type='email' name="email" placeholder="email" value={email} onChange={handleEmail}></input>
          <input className="input" type='password' name="password"  placeholder="password"  value={password} onChange={handlePassword}></input>
          <div>VOUS SOUVENEZ-VOUS DE VOTRE MOT DE PASSE ?</div>
          <div>S'INSCRIRE </div>
          <button className="button" type="submit">S'INSCRIRE</button>
        </form>
        </div>
      </div>
  );
};

export default Login;
