import { createContext, useContext, useState } from 'react';

/**
 * Context for managing orders and cart state
 */
const OrderContext = createContext();

export const useOrder = () => {
  const context = useContext(OrderContext);
  if (!context) {
    throw new Error('useOrder must be used within an OrderProvider');
  }
  return context;
};

export const OrderProvider = ({ children }) => {
  const [cart, setCart] = useState([]);

  const addToCart = product => {

    const updated = cart.reduce((acc, p) => {

        if(p.id === product.id){
            p.quantity++;   
        }else{
            acc.push({...product, quantity : 1});
        }
        
        return acc;
    }, []);


    setCart(updated)
  }

  const removeFromCart = id => {
    setCart(prev => prev.filter(p => p.id != id));
  }

  const value = {
    cart,
    addToCart,
    removeFromCart
  };

  return (
    <OrderContext.Provider value={value}>
      {children}
    </OrderContext.Provider>
  );
};