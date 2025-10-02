import { useState } from "react";
import { useOrder } from "../../contexts/OrderContext"

const HeaderCart = () => {

    const {
        cart,
        removeFromCart
    } = useOrder();

    const [isOpen, setIsOpen] = useState(false);

    const toggleDropdown = () => {
        setIsOpen(prev => !prev);
    }

  return (
    <div className="dropdown">
        <button onClick={() => toggleDropdown()} className={`btn btn-secondary dropdown-toggle ${isOpen ? 'show' : ''}`} type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cart
        </button>
        <ul className={`dropdown-menu ${isOpen && cart.length > 0 ? 'show' : ''}`}>
            {cart.map(p => 
                <li key={`cart-item-${crypto.randomUUID()}`}>
                    <span className="dropdown-item">
                            {p.name}
                            x{p.quantity}
                            <small className="btn btn-danger ms-2" onClick={ () => removeFromCart(p.id)}>
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