import React, { useEffect, useState } from "react"
import {BrowserRouter as Router, Switch, Route, Routes, Link} from "react-router-dom";
import Event from "../component/eventList";
import Detail from "../component/detail";
import "../style/home.css";
import Navbar from "../component/Navbar";
import Register from "./Register";
import Login from "./Login";

export default function Home() {
    return (
        <div>
           
        <Router>
            <Routes>
                <Route path="/" element={<Event/>} />
                <Route path="/detail/:id" element={<Detail/>} />
                <Route path="/register" element={<Register/>} />
                <Route path="/Login" element={<Login/>} />
            </Routes>
        </Router>
         </div>
    )

}
