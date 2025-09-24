import React from 'react'
import { Link } from "react-router";

const Register = () => {
  return (
    <div className='container'>
      <h1>Register Page</h1>
      <form>

        <input type="text" className='form-control mb-3' placeholder='name' name='name' />
        
        <input type="email" className='form-control mb-3' placeholder='email' name='email' />

        <input type="password" className='form-control mb-3' placeholder='password' name='password' />

        <button className='btn btn-primary'>Register</button>

      </form>

      <Link to="/login">Hai già un account? Accedi qui</Link>

    </div>
  )
}

export default Register