import React, { useState } from 'react'
import { Link } from "react-router";
import { useAuth } from '../../contexts/AuthContext';
import { useNavigate } from "react-router";

const Register = () => {

  const navigate = useNavigate();
  const [form, setForm] = useState({
    name:'',
    email:'',
    password:''
  });
  const { register, loading, error } = useAuth();

  function handleChange(e){
    const {name, value} = e.target;

    setForm({...form, [name]:value})
  }

  function handleSubmit(e){
    e.preventDefault();
    register(form)
    .then(() => navigate('/login'));
  }



  return (
    <div className='container'>
      <h1>Register Page</h1>
      <form onSubmit={handleSubmit}>

        <input type="text" onChange={handleChange} className='form-control mb-3' placeholder='name' name='name' />
        
        <input type="email" onChange={handleChange}  className='form-control mb-3' placeholder='email' name='email' />

        <input type="password" onChange={handleChange} className='form-control mb-3' placeholder='password' name='password' />

        <button className='btn btn-primary'>Register</button>

      </form>

       {
        error && !loading &&
        <div className="alert alert-danger">
          Registrazione fallita
        </div>
      }

      <Link to="/login">Hai già un account? Accedi qui</Link>

    </div>
  )
}

export default Register