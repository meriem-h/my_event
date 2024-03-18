import React from 'react';
import GgLogin from '../component/GgLogin';


function Search() {
  
    return (
        <div className='container'>
        <h2>Recherche</h2>
        <GgLogin/>
        <input type="search" placeholder='Rechercher'></input>
   </div>
    );
  }
  
export default Search;
