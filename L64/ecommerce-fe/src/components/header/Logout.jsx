import { useNavigate } from "react-router"
import { useAuth } from '../../contexts/AuthContext';

const Logout = () => {

        const navigate = useNavigate();

    const { logout} = useAuth();  

     const logoutProcess = () => {
        logout().then(()=> {
            navigate('/login');
        })
     }

  return (
     <button onClick={logoutProcess} className="btn btn-danger">Logout</button>
                
  )
}

export default Logout