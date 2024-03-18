import React, { useEffect, useState } from "react"
import { Link } from "react-router-dom";
import "../style/event.css"
import Navbar from "./Navbar";
import Footer from "./Footer";

export default function Events() {
    const [event, setEvent] = useState([]);
    const [page, setPage] = useState(0);
    const [city, setCity] = useState("");
    const [titre, setTitre] = useState("");
    const [tag, setTag] = useState("");
    const [search, setSearch] = useState("");

    const Img = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZMKBMeZXhhKDJ6ENZ8T4VV6ANVWIcTYDUPg&usqp=CAU"

    let newDate = new Date()
    let day = newDate.getDate();
    let month = newDate.getMonth() + 1;
    if (month.length !== 2) {
        month = "0" + month
    }
    let year = newDate.getFullYear();
    let date = year + "-" + month + "-" + day;

    useEffect(() => {

        let first = titre != '' ? event.filter(filter => filter.fields.title?.includes(titre)) : event
        let second = first != '' ? first.filter(filter => filter.fields.city?.includes(city)) : first
        let last = second != '' ? second.filter(filter => filter.fields.tags?.includes(tag)) : second

        setEvent(last)

        let city_filter = (city != '' ? `&facet=city&refine.city=${city}` : ``)
        let tag_filter = (tag != "" ? `&facet=tags&refine.tags=${tag}` : ``)

        fetch(`https://public.opendatasoft.com/api/records/1.0/search/?dataset=evenements-publics-cibul&q=${titre}`
            + city_filter + tag_filter
            + `&start=${page}`)
            .then(res => res.json())
            .then(res => {
                setEvent(res.records);
                console.log(page, titre, city, tag)
            })
        console.log(titre)
    }, [page, titre, tag, city]);

    return (
        <div className="container1">
            <div className="nav">
                <Navbar />
            </div>
            <div id="body">
                <div id="menue">
                    <h1>Menu</h1>
                    <h3>Filtres</h3>
                    <input className="lieu1"
                        placeholder="Nom"
                        type="text"
                        name="nom"
                        value={titre}
                        onChange={(e) => setTitre(e.target.value.charAt(0).toUpperCase() + e.target.value.slice(1))}
                    // onChange={(e) => { functionOne(); functionTwo(e); }}
                    />
                    <input className="lieu"
                        placeholder="Lieu"
                        type="text"
                        name="lieu"
                        value={city}
                        onChange={(e) => setCity(e.target.value)}
                    />
                    {/* <input
                    placeholder="categorie"
                    type="text"
                    name="tag"
                    value={tag}
                    onChange={(e) => setTag(e.target.value)}
                /> */}
                    <div class="select">
                        <select
                            type="text"
                            name="tag"
                            value={tag}
                            onChange={(e) => setTag(e.target.value)} className="opt"
                        >
                            <option class="catégories">Catégories</option>
                            <option value="danse">Danse</option>
                            <option value="Musique">Musique</option>
                            <option value="Conférence">Conférence</option>
                            <option value="Festival">Festival</option>
                            <option value="Cirque">Cirque</option>
                        </select>
                    </div>


                </div>
                <div id="event_list">
                    <h1>Evenements à venir</h1>
                    {/* {event.filter(filter => filter.fields.title?.includes(titre)).map((e) => */}

                    {event.map((e) =>

                        <Link to={"/detail/" + e.recordid}>
                            <section>
                                <article>
                                    <img src={
                                        e.fields.image_thumb != null ? e.fields.image_thumb : Img
                                    }
                                        alt="" className="image_thumb" />
                                </article>
                                <article id="info">
                                    <ul className="info1">
                                        <li className="debut">Debut : {e.fields.date_start}</li>
                                        <li className="fin">Fin :{e.fields.date_end}</li>
                                        <li className="ville">Ville:{e.fields.city}</li>
                                        <li className="dep">Department: {e.fields.department}</li>
                                        {/* <li>categorie: {e.fields.tags}</li> */}
                                    </ul>
                                    <h3 className="info">{e.fields.title}</h3>
                                    <p className="info">{e.fields.description}</p>
                                </article>

                            </section>
                        </Link>
                    )}
                    <div id="button">
                        {page
                            ? < button onClick={() => setPage(page - 10)} className="btn">Précédants</button>
                            : ""
                        }
                        <button onClick={() => setPage(page + 10)} className="btn">Suivant</button>
                    </div>
                </div>

            </div >

            <div className="footer">
                <Footer />
            </div>
        </div>
    );

}