import { Link } from "react-router";
import React, { useState } from 'react';
import { useAuth } from '../../contexts/AuthContext';

const Login = () => {

  const { login, loading, error, } = useAuth();
  const [success, setSuccess] = useState(false);
  const [formData, setFormData] = useState({
    email: '',
    password: ''
  });

  const handleLoginRequest = (e) => {
    e.preventDefault();

    login({...formData})
    .then(() => setSuccess(true));
    
  }

  const handleChange = (e) => {
    const {name, value} = e.target;
    
    setFormData({...formData, [name]: value});
  }
  

  return (
    <div className='container'>
      <h1>Login Page</h1>
      <form onSubmit={handleLoginRequest}>

        <input type="email" onChange={handleChange} className='form-control mb-3' placeholder='email' name='email' />

        <input type="password" onChange={handleChange} className='form-control mb-3' placeholder='password' name='password' />

        <button disabled={loading} type='submit' className='btn btn-primary'>
          {loading ? 'Accesso in corso' : 'Accedi'}
        </button>

      </form>

      {
        error && !loading &&
        <div className="alert alert-danger">
          Accesso fallito
        </div>
      }

      {
        
        !error && !loading && success &&
        <div className="alert alert-success">
          Accesso eseguito
          {/* Todo: fare redirect ad altra pagina */}
        </div>

      }

      <Link to="/register">Non hai un account? Registrati qui</Link>

    </div>
  )
}

export default Login