import { useState } from 'react';
import './App.css'

function App() {

  const [createdTravel, setCreatedTravel] = useState(null);
  const [newTravel, setNewTravel] = useState({});

  async function createTravel(e){
    e.preventDefault();

    const formData = new FormData(e.target);

    const response = await fetch('http://localhost:8000/api/travel',{
      method:'POST',
      body:formData
    })

    if(!response.ok) throw new Error('Errore creazione prodotto');

    const data = await response.json();

    setCreatedTravel(data);

  }

  function handleNewTravelChange(e){

    const {name, value} = e.target;

    setNewTravel({
      ...newTravel, 
      [name]: value
    })
  }

  return (
    <>

    {createdTravel && (
      <div>
        <h2>Viaggio creato con successo!</h2>
        <p>Titolo: {createdTravel.titolo}</p>
        <p>Descrizione: {createdTravel.descrizione}</p>
        <p>Prezzo: {createdTravel.prezzo}</p>
        <p>Data di partenza: {createdTravel.data_partenza}</p>
        <p>Data di ritorno: {createdTravel.data_ritorno}</p>
        <p>Destinazione: {createdTravel.destinazione}</p>
        <img src={createdTravel.immagine} alt={createdTravel.titolo} />
      </div>
    )}
      <form onSubmit={createTravel}>

          <input type="text" name='titolo' placeholder='titolo' value={newTravel.titolo} onChange={handleNewTravelChange} />

          <input type="text" name='descrizione' placeholder='descrizione' value={newTravel.descrizione} onChange={handleNewTravelChange} />

          <input type="number" name='prezzo' placeholder='prezzo' value={newTravel.prezzo} onChange={handleNewTravelChange} />

          <input type="date" name='data_partenza' placeholder='data_partenza' value={newTravel.data_partenza} onChange={handleNewTravelChange} />

          <input type="date" name='data_ritorno' placeholder='data_ritorno' value={newTravel.data_ritorno} onChange={handleNewTravelChange} />

          <input type="text" name='destinazione' placeholder='destinazione' value={newTravel.destinazione} onChange={handleNewTravelChange} />

          <input type="file" name='immagine' onChange={handleNewTravelChange} />

          <button>Crea Viaggio</button>
      </form>
    </>
  )
}

export default App
