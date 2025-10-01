import { createContext, useContext, useState, useEffect } from 'react';

/**
 * Context for managing authentication state
 */
const AuthContext = createContext();


export const useAuth = () => {
    const context = useContext(AuthContext);
    if (!context) {
        throw new Error('useAuth must be used within an AuthProvider');
    }
    return context;
};


export const AuthProvider = ({ children }) => {
    const [user, setUser] = useState(null);
    const [role, setRole] = useState(null);
    const [accessToken, setAccessToken] = useState(localStorage.getItem('access_token') || null);
    const [isAuthenticated, setIsAuthenticated] = useState(false);
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState(null);

    const baseApiUrl = 'http://localhost:8000/api';
    const registerUrl = `${baseApiUrl}/register`;
    const loginUrl = `${baseApiUrl}/login`;
    const logoutUrl = `${baseApiUrl}/logout`;


    function saveAccessData(userObj, newAccessToken){
        setAccessToken(newAccessToken)
        setUser(userObj)
        setRole(userObj.role)
        setIsAuthenticated(true);
    }
    

    const login = async (accessData) => {
        
        setLoading(true);

        try{
            const response = await fetch(loginUrl, {
                method: 'POST',
                body: JSON.stringify(accessData),
                headers: {
                    'Content-Type': 'application/json'
                },
            })
            const {user: userObj, access_token} = await response.json();
            
            localStorage.setItem('access_token',access_token);
            localStorage.setItem('user', JSON.stringify(userObj));
            
            saveAccessData(userObj, access_token);
            

            return user;

        }catch(error){
            setUser(null);
            setRole(null);
            setIsAuthenticated(false);
            setAccessToken(null);
            console.error("Login failed", error);
            setError(true);
        }finally{
            setLoading(false);
        }
    
    };


    const logout = async () => {
        setLoading(true);
        try{
            const response = await fetch(logoutUrl, {
                method: 'POST',
                headers: {
                    'Authentication': `Bearer ${accessToken}`,
                    'Content-Type': 'application/json'
                }
            })

            removeAccessData()
            
            return await response.json();

        }catch(error){
            console.error("Logout failed", error);
        }finally{
            setLoading(false);
        }
    };

    function removeAccessData(){
        setAccessToken(null)
        setUser(null)
        setRole(null)
        setIsAuthenticated(false);

        localStorage.removeItem('user')
        localStorage.removeItem('access_token')
    }


    const register = async (data) => {

        
        try{
            // const {name, email, password} = data;
            //controllare che questi dati esistano
            
            const response = await fetch(registerUrl, {
                method: 'POST',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json'
                },
            })
            return await response.json();

        }catch(error){
            console.error("Register failed", error);
        }finally{
            setLoading(false);
        }
    };

    const isAdmin = () => {
        return isAuthenticated && role === 'admin';
    }

    const isCustomer = () => {
        return isAuthenticated && role === 'customer';
    }

    const isGuest = () => {
        return !isAuthenticated;
    }


    function restoreUser(){
        const accessToken = localStorage.getItem('access_token'); 

        if(!accessToken) return;
        
        const userJson = localStorage.getItem('user');
        
        if(!userJson) return;

        const userObj = JSON.parse(userJson);

        saveAccessData(userObj, accessToken);

    }

    useEffect(()=>{
        restoreUser()
    }, [])

    const value = {
        user,
        role,
        loading,
        error,
        login,
        logout,
        register,
        isGuest,
        isAdmin,
        isCustomer
    }



    return (
        <AuthContext.Provider value={value}>
            {children}
        </AuthContext.Provider>
    );
};