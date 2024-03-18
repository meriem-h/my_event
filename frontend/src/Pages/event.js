import React, { useEffect, useState } from 'react';

function Events() {
let url = 'https://public.opendatasoft.com/api/v2/catalog/datasets/evenements-publics-cibul';
 

const [events, setEvents] = useState({});

useEffect(() => {
    fetch(url, { method: "GET"})
    .then(res => res.json())
    .then(data =>{
     setEvents(data );
    // console.log("1", data)
}).catch((err) => {
    console.log(err);
  });
}, []);
let display = events.dataset.fields;
console.log("2", display)

return (
  <div>
  <h2>Evenements</h2>
    <table>
      <thead>
      <tr key={"header"}>
        {Object.keys(display).map((key)=> (
          <th>{key}</th>
        ))}
      </tr>
      </thead>
      {/* {Object.values(display).map((item) => (
        <thead>
        <tr key={item.id}>
          {Object.values(item).map((val) => (
            <td>{val}</td>
          ))}
        </tr>
        </thead>
      ))} */}
    </table>
    </div>
  );
  }
  export default Events;