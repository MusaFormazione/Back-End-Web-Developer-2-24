import React, { useState } from 'react';
import { Link } from 'react-router';
import { useProducts } from '../../../contexts/ProductsContext';

const GestioneProdotti = () => {
  const { products, loading, error, deleteProduct } = useProducts();
  const [deletingId, setDeletingId] = useState(null);

  const handleDelete = async (id, productName) => {
    if (confirm(`Sei sicuro di voler eliminare il prodotto "${productName}"?`)) {
      setDeletingId(id);
      try {
        await deleteProduct(id);
        alert('Prodotto eliminato con successo!');
      } catch {
        alert('Errore nell\'eliminazione del prodotto');
      } finally {
        setDeletingId(null);
      }
    }
  };

  if (loading) {
    return (
      <div className="container mt-4">
        <div className="d-flex justify-content-center">
          <div className="spinner-border" role="status">
            <span className="visually-hidden">Caricamento...</span>
          </div>
        </div>
      </div>
    );
  }

  if (error) {
    return (
      <div className="container mt-4">
        <div className="alert alert-danger" role="alert">
          <h4 className="alert-heading">Errore!</h4>
          <p>{error}</p>
        </div>
      </div>
    );
  }

  return (
    <div className="container mt-4">
      <div className="d-flex justify-content-between align-items-center mb-4">
        <h2>Gestione Prodotti</h2>
        <Link to="/admin/prodotti/new" className="btn btn-primary">
          <i className="bi bi-plus-circle me-2"></i>
          Nuovo Prodotto
        </Link>
      </div>

      {products.length === 0 ? (
        <div className="text-center py-5">
          <h4>Nessun prodotto trovato</h4>
          <p className="text-muted">Inizia creando il tuo primo prodotto!</p>
          <Link to="/admin/prodotti/new" className="btn btn-primary">
            Crea Primo Prodotto
          </Link>
        </div>
      ) : (
        <div className="card">
          <div className="card-body">
            <div className="table-responsive">
              <table className="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col" className="text-center">Azioni</th>
                  </tr>
                </thead>
                <tbody>
                  {products.map((product) => (
                    <tr key={product.id}>
                      <th scope="row">{product.id}</th>
                      <td>
                        <strong>{product.name}</strong>
                      </td>
                      <td>
                        <span className="text-muted">
                          {product.description?.length > 50 
                            ? `${product.description.substring(0, 50)}...` 
                            : product.description}
                        </span>
                      </td>
                      <td>
                        <span className="fw-bold">€ {parseFloat(product.price).toFixed(2)}</span>
                      </td>
                      <td className="text-center">
                        <div className="btn-group" role="group">
                          <Link 
                            to={`/admin/prodotti/${product.id}`} 
                            className="btn btn-sm btn-outline-primary"
                            title="Modifica prodotto"
                          >
                            <i className="bi bi-pencil"></i>
                            Modifica
                          </Link>
                          <button 
                            className="btn btn-sm btn-outline-danger"
                            onClick={() => handleDelete(product.id, product.name)}
                            disabled={deletingId === product.id}
                            title="Elimina prodotto"
                          >
                            {deletingId === product.id ? (
                              <>
                                <span className="spinner-border spinner-border-sm me-1" role="status"></span>
                                Eliminazione...
                              </>
                            ) : (
                              <>
                                <i className="bi bi-trash"></i>
                                Elimina
                              </>
                            )}
                          </button>
                        </div>
                      </td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          </div>
        </div>
      )}

      <div className="mt-3">
        <small className="text-muted">
          Totale prodotti: <strong>{products.length}</strong>
        </small>
      </div>
    </div>
  );
};

export default GestioneProdotti;