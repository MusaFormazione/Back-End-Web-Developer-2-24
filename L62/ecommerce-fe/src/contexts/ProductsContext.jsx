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

  };

   const getProductById = (id) => {

  };


  const addProduct = async (newProduct) => {

  };


  const updateProduct = async (product) => {

  };


  const deleteProduct = async (id) => {

  };

  useEffect(() => {
    // fetchProducts();
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