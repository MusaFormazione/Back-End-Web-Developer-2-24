import { useEffect, useState } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import './App.css';
import Header from './components/header/Header';
import CrudProducts from './utils/ProductsCrud';

function App() {

  const [user, setUser] = useState(null);
  const [role, setRole] = useState(null);

  const [products, setProducts] = useState([]);

  useEffect(() => {

    //Recupera informazioni sull'utente e imposta il ruolo
    setUser(null);
    setRole(null);

  }, []);

  useEffect(() => {

    CrudProducts.getAllProducts()
      .then(data => {
        setProducts(data);
      });


  }, []);


  return (
    <>
      <Header user={user} role={role} />

      <div className="container">
        <div className="row">
          {
            products.map(p => {
              return <>
                <div className="col-12 col-md-6 col-lg-4 mb-2">

                  <div className="card">
                    <img src="" className="card-img-top" />
                      <div className="card-body">
                        <h5 className="card-title">{p.name}</h5>
                        <p className="card-text">{p.description}</p>
                      </div>
                      <ul className="list-group list-group-flush">
                        <li className="list-group-item">{p.price}€</li>
                      </ul>
                      {role != 'admin' && <div className="card-body">
                        <button className="cart-button btn btn-warning">Add to cart</button>
                      </div>}
                  </div>
                </div>
              </>;
            })
          }
        </div>
      </div>
    </>
  )
}

export default App
