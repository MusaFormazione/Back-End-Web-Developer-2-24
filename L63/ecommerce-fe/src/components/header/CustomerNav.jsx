import { Link } from "react-router"


const CustomerNav = () => {
  return (
     <ul className="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><Link to="/customer/carrello" className="nav-link px-2 link-secondary">Carrello</Link></li>
                    <li><Link to="/customer/ordini" className="nav-link px-2 link-secondary">Ordini</Link></li>
                </ul>
  )
}

export default CustomerNav