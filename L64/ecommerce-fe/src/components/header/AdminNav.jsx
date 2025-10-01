import { Link } from 'react-router'

const AdminNav = () => {
    return (
        <ul className="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><Link to="/admin/prodotti" className="nav-link px-2 link-secondary">Prodotti</Link></li>
            <li><Link to="/admin/ordini" className="nav-link px-2 link-secondary">Lista ordini</Link></li>
        </ul>
    )
}

export default AdminNav