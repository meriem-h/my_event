import React, { useEffect, useState } from "react"
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
import "../style/google.css"


export default function handleLogin() {



    return (
        <GoogleLogin
            clientId={process.env.REACT_APP_GOOGLEID}
            buttonText="Log in with Google"
            onSuccess={handleLogin}
            onFailure={handleLogin}
            cookiePolicy={'single_host_origin'}
        />

    )
}
