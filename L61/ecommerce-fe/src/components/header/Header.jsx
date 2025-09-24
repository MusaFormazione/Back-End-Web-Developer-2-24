import AdminNav from "./AdminNav"
import CustomerNav from "./CustomerNav"
import { BrowserRouter, Link, Routes, Route } from "react-router"
import Home from '../pages/Home';
import Login from '../pages/Login';
import Register from '../pages/Register'

const Header = ({ user, role }) => {
    return (
        <>
        <BrowserRouter>
        <header className="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

            
            <ul className="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><Link to="/" className="nav-link px-2 link-secondary">Home</Link></li>
            </ul>

            { user && role === 'customer' && <CustomerNav/>}

            { user && role === 'admin' && <AdminNav/>}

            { !user &&

                <div className="col-md-3 text-end">
                    <Link to='/login' className="btn btn-outline-primary me-2">Login</Link>
                    <Link to='/register' className="btn btn-primary">Sign-up</Link> 
                </div>
            }
        </header>

        <Routes>

            <Route path="/" element={<Home/>}>Home</Route>
            <Route path="/login" element={<Login/>}>Login</Route>
            <Route path="/register" element={<Register/>}>Register</Route>

        </Routes>
        </BrowserRouter>
    </>
    )
}

export default Header