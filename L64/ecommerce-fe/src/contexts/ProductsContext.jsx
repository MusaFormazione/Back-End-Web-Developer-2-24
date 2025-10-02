import { createContext, useContext, useState, useEffect } from 'react';
import CrudProducts from '../utils/ProductsCrud';

/**
 * Context for managing products state
 */
const ProductsContext = createContext();


export const useProducts = () => {
  const context = useContext(ProductsContext);
  if (!context) {
    throw new Error('useProducts must be used within a ProductsProvider');
  }
  return context;
};

export const ProductsProvider = ({ children }) => {
  const [products, setProducts] = useState([]);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(null);



  const getProducts = async () => {
    setLoading(true);
    setError(null);
    try {
      const data = await CrudProducts.getAllProducts();
      setProducts(data.products || data);
    } catch (err) {
      setError('Errore nel caricamento dei prodotti');
      console.error(err);
    } finally {
      setLoading(false);
    }
  };

   const getProductById = (id) => {
    return products.find(product => product.id === parseInt(id));
  };


  const addProduct = async (newProduct) => {
    setLoading(true);
    setError(null);
    try {
      const data = await CrudProducts.createProduct(newProduct);
      if (data.product) {
        setProducts(prev => [...prev, data.product]);
        return data;
      }
    } catch (err) {
      setError('Errore nella creazione del prodotto');
      console.error(err);
      throw err;
    } finally {
      setLoading(false);
    }
  };


  const updateProduct = async (product) => {
    setLoading(true);
    setError(null);
    try {
      const data = await CrudProducts.editProduct(product);
      
      // Aggiorna sempre lo stato locale con i dati che abbiamo inviato
      // più eventuali dati aggiornati dal server
      const updatedProduct = data.product || data || product;
      
      setProducts(prev => 
        prev.map(p => p.id === product.id ? updatedProduct : p)
      );
      
      return data;
    } catch (err) {
      setError('Errore nell\'aggiornamento del prodotto');
      console.error(err);
      throw err;
    } finally {
      setLoading(false);
    }
  };


  const deleteProduct = async (id) => {
    setLoading(true);
    setError(null);
    try {
      await CrudProducts.deleteProduct(id);
      setProducts(prev => prev.filter(p => p.id !== parseInt(id)));
    } catch (err) {
      setError('Errore nell\'eliminazione del prodotto');
      console.error(err);
      throw err;
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    getProducts();
  }, []);

  const value = {
    products,
    loading,
    error,
    getProducts,
    addProduct,
    updateProduct,
    deleteProduct,
    getProductById
  };

  return (
    <ProductsContext.Provider value={value}>
      {children}
    </ProductsContext.Provider>
  );
};