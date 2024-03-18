import React from "react";
import  { BrowserRouter as Router, Route } from "react-router-dom";
import Event from "../Component/eventList"
import Detail from "../Component/detail"
import "../style/home.css";
import Register from "./Register";
import Login from "./Login";


function Routes(){
    return(
    <div>
       <Router>
            <Routes>
                <Route path="/" element={<Event />} />
                <Route path="/detail/:id" element={<Detail />} />
                <Route path="/register" element={<Register/>}/>
                <Route path="/login" element={<Login/>}/>
            </Routes>
        </Router>
    </div>
    )
}
export default Routes();