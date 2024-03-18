import React, { useState } from 'react';

function Agenda() {
    let url = 'https://api.openagenda.com/v2/agendas?key=6020e477cc1447f5a0bef98079a56b46';
     
    const [agendas, setAgendas] = useState([ ]);
  
    fetch(url, { method: "GET"})
    .then(res => res.json())
    .then(data =>{
        setAgendas(data.agendas);
        console.log("1",agendas)
    });
    console.log("2",agendas)
      return (
          <div className='container'>
          <h2>Agenda</h2>
     </div>
      );
}

export default Agenda;
