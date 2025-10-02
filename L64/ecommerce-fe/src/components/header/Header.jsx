import AdminNav from "./AdminNav"
import CustomerNav from "./CustomerNav"
import { BrowserRouter, Link, Routes, Route } from "react-router"
import Home from '../pages/Home';
import Login from '../pages/Login';
import Register from '../pages/Register'
import AdminOrders from '../pages/admin/AdminOrders';
import CreaProdotto from '../pages/admin/CreaProdotto';
import GestioneProdotti from '../pages/admin/GestioneProdotti';
import ModificaProdotto from '../pages/admin/ModificaProdotto';
import Carrello from '../pages/customer/Carrello';
import OrderDetail from '../pages/customer/OrderDetail';
import Orders from '../pages/customer/Orders';
import OrdineCompletato from '../pages/customer/OrdineCompletato';
import { useAuth } from '../../contexts/AuthContext';
import { useProducts } from '../../contexts/ProductsContext';
import Logout from "./Logout";
import HeaderCart from "./HeaderCart";

const Header = () => {


    const { 
        user,
        isGuest,
        isAdmin,
        isCustomer,
        loading: authLoading
     } = useAuth();  

     const {
        loading: productsLoading
     } = useProducts();

    return (
        <>
        <BrowserRouter>
        <header className="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

            
            <ul className="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><Link to="/" className="nav-link px-2 link-secondary">Home</Link></li>
            </ul>


            { isCustomer() && <>
                <CustomerNav/>
                <HeaderCart/>
            </>}

            { isAdmin() && <AdminNav/>}

            { isGuest() &&

                <div className="col-md-3 text-end">
                    <Link to='/login' className="btn btn-outline-primary me-2">Login</Link>
                    <Link to='/register' className="btn btn-primary">Sign-up</Link> 
                </div>
            }
            {!isGuest() && <div>
                    Ciao {user.name} |  <Logout/>
                   </div>}
        </header>

        {(productsLoading || authLoading) && <div className="alert alert-info">CARICAMENTO IN CORSO</div>}

        <Routes>
            {/* Rotte pubbliche */}
            <Route path="/" element={<Home/>}>Home</Route>
            <Route path="/login" element={<Login/>}>Login</Route>
            <Route path="/register" element={<Register/>}>Register</Route>

            {/* Rotte Admin */}
            <Route path="/admin/prodotti" element={<GestioneProdotti/>}>Prodotti</Route>
            <Route path="/admin/prodotti/new" element={<CreaProdotto/>}>Nuovo prodotto</Route>
            <Route path="/admin/prodotti/:id" element={<ModificaProdotto/>}>Modifica prodotto</Route>
            <Route path="/admin/ordini" element={<AdminOrders/>}>Ordini</Route>

            {/* Rotte Customer */}
            <Route path="/customer/ordini" element={<Orders/>}>Ordini</Route>
            <Route path="/customer/ordini/:id" element={<OrderDetail/>}>Ordini</Route>
            <Route path="/customer/carrello" element={<Carrello/>}>Carrello</Route>
            <Route path="/customer/thank-you" element={<OrdineCompletato/>}>Thank you Page</Route>


        </Routes>
        </BrowserRouter>
    </>
    )
}

export default Header