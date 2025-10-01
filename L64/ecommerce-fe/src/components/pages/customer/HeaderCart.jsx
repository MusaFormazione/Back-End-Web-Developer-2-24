import { useState } from "react";
import { useProducts } from "../../../contexts/ProductsContext"

const HeaderCart = () => {

    const {
        cart,
        removeFromCart
    } = useProducts();

    const [isOpen, setIsOpen] = useState(false);

    const toggleDropdown = () => {
        setIsOpen(prev => !prev);
    }

  return (
    <div className="dropdown">
        <button onClick={() => toggleDropdown()} className={`btn btn-secondary dropdown-toggle ${isOpen ? 'show' : ''}`} type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cart
        </button>
        <ul className={`dropdown-menu ${isOpen && cart-length > 0 ? 'show' : ''}`}>
            {cart.map(p => 
                <li>
                    <span 
                        key={`cart-item-${p.id}`} className="dropdown-item"
                        >
                            {p.name}
                            <small onClick={ () => removeFromCart(p.id)}>
                                Rimuovi
                            </small>
                    </span>
                </li>
            )}
        </ul>
    </div>
  )
}

export default HeaderCart