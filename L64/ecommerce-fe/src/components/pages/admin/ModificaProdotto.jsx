import React, { useState, useEffect } from 'react';
import { useNavigate, useParams } from 'react-router';
import { useProducts } from '../../../contexts/ProductsContext';

const ModificaProdotto = () => {
  const navigate = useNavigate();
  const { id } = useParams();
  const { products, getProductById, updateProduct, loading } = useProducts();
  
  const [formData, setFormData] = useState({
    name: '',
    description: '',
    price: ''
  });

  const [errors, setErrors] = useState({});
  const [productFound, setProductFound] = useState(null); 
  const [initialDataLoaded, setInitialDataLoaded] = useState(false);
  const [isUpdating, setIsUpdating] = useState(false);

  useEffect(() => {
    // Aspetta che i prodotti siano caricati prima di cercare il prodotto
    if (products.length > 0 && !initialDataLoaded) {
      const product = getProductById(id);
      if (product) {
        setFormData({
          name: product.name || '',
          description: product.description || '',
          price: product.price?.toString() || ''
        });
        setProductFound(true);
        setInitialDataLoaded(true);
      } else {
        setProductFound(false);
      }
    } else if (products.length === 0 && !loading) {
      // Se non ci sono prodotti e non stiamo caricando, il prodotto non esiste
      setProductFound(false);
    }
  }, [id, products, getProductById, loading, initialDataLoaded]);

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData(prev => ({
      ...prev,
      [name]: value
    }));
    
    // Rimuovi l'errore quando l'utente inizia a digitare
    if (errors[name]) {
      setErrors(prev => ({
        ...prev,
        [name]: ''
      }));
    }
  };

  const validateForm = () => {
    const newErrors = {};
    
    if (!formData.name.trim()) {
      newErrors.name = 'Il nome del prodotto è obbligatorio';
    }
    
    if (!formData.description.trim()) {
      newErrors.description = 'La descrizione è obbligatoria';
    }
    
    if (!formData.price || isNaN(formData.price) || parseFloat(formData.price) <= 0) {
      newErrors.price = 'Il prezzo deve essere un numero maggiore di 0';
    }

    setErrors(newErrors);
    return Object.keys(newErrors).length === 0;
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    
    if (!validateForm()) {
      return;
    }

    setIsUpdating(true);
    try {
      const productData = {
        id: parseInt(id),
        ...formData,
        price: parseFloat(formData.price)
      };
      
      await updateProduct(productData);
      alert('Prodotto aggiornato con successo!');
      navigate('/admin/prodotti');
    } catch {
      alert('Errore nell\'aggiornamento del prodotto');
    } finally {
      setIsUpdating(false);
    }
  };

  if (productFound === null || loading) {
    return (
      <div className="container mt-4">
        <div className="d-flex justify-content-center">
          <div className="spinner-border" role="status">
            <span className="visually-hidden">Caricamento prodotto...</span>
          </div>
        </div>
      </div>
    );
  }

  if (productFound === false) {
    return (
      <div className="container mt-4">
        <div className="alert alert-danger" role="alert">
          <h4 className="alert-heading">Prodotto non trovato!</h4>
          <p>Il prodotto con ID {id} non esiste.</p>
          <hr />
          <button 
            className="btn btn-outline-danger"
            onClick={() => navigate('/admin/prodotti')}
          >
            Torna alla lista prodotti
          </button>
        </div>
      </div>
    );
  }

  return (
    <div className="container mt-4">
      <div className="row">
        <div className="col-md-8 mx-auto">
          <div className="card">
            <div className="card-header">
              <h3>Modifica Prodotto #{id}</h3>
            </div>
            <div className="card-body">
              <form onSubmit={handleSubmit}>
                <div className="mb-3">
                  <label htmlFor="name" className="form-label">Nome Prodotto *</label>
                  <input
                    type="text"
                    className={`form-control ${errors.name ? 'is-invalid' : ''}`}
                    id="name"
                    name="name"
                    value={formData.name}
                    onChange={handleChange}
                    placeholder="Inserisci il nome del prodotto"
                  />
                  {errors.name && <div className="invalid-feedback">{errors.name}</div>}
                </div>

                <div className="mb-3">
                  <label htmlFor="description" className="form-label">Descrizione *</label>
                  <textarea
                    className={`form-control ${errors.description ? 'is-invalid' : ''}`}
                    id="description"
                    name="description"
                    rows="4"
                    value={formData.description}
                    onChange={handleChange}
                    placeholder="Inserisci la descrizione del prodotto"
                  ></textarea>
                  {errors.description && <div className="invalid-feedback">{errors.description}</div>}
                </div>

                <div className="mb-3">
                  <label htmlFor="price" className="form-label">Prezzo (€) *</label>
                  <input
                    type="number"
                    step="0.01"
                    min="0"
                    className={`form-control ${errors.price ? 'is-invalid' : ''}`}
                    id="price"
                    name="price"
                    value={formData.price}
                    onChange={handleChange}
                    placeholder="0.00"
                  />
                  {errors.price && <div className="invalid-feedback">{errors.price}</div>}
                </div>

                <div className="d-flex gap-2">
                  <button 
                    type="submit" 
                    className="btn btn-primary"
                    disabled={isUpdating}
                  >
                    {isUpdating ? 'Aggiornamento...' : 'Aggiorna Prodotto'}
                  </button>
                  <button 
                    type="button" 
                    className="btn btn-secondary"
                    onClick={() => navigate('/admin/prodotti')}
                  >
                    Annulla
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default ModificaProdotto;