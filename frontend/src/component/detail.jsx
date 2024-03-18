import React, { useEffect, useState } from "react"
import { BrowserRouter as Router, Switch, Route, Link, useParams } from "react-router-dom";
import Navbar from "./Navbar";

export default function Detail() {
    const [event, setEvent] = useState({});
    const [eventId, setEventId] = useState(0)
    const { id } = useParams();

    // /catalog/datasets/{dataset_id}/records/{record_id}

    useEffect(() => {
        // fetch(`https://public.opendatasoft.com/api/v2/catalog/datasets/evenements-publics-cibul/records?limit=10&offset=${id}`)
        fetch(`https://public.opendatasoft.com/api/v2/catalog/datasets/evenements-publics-cibul/records/${id}`)

            .then(res => res.json())
            .then(res => {
                // setEvent(res.records);
                setEvent(res);
            })
    }, []);

    return (  
    <div className="container">
    {/* <Navbar/> */}
        <div>
            {/* {event.map((e) => */}
            <div>
                <h2>{event.record?.fields.title}</h2>
                <img src={event.record?.fields.image} alt="image" />
                <h4>{event.record?.fields.description}</h4>
                <p>{event.record?.fields.free_text}</p>
            </div>
            {/* )} */}
            {/* {id
                ? < button onClick={() => setEventId(eventId - 1)}>previous</button>
                : ""
            }
            <button onClick={() => setEventId(eventId + 1)}>next</button> */}

        </div >
        </div>
    );

}