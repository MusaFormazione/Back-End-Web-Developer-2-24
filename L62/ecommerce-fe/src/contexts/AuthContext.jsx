import { createContext, useContext, useState } from 'react';

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


    const login = async (email, password) => {
        
        setLoading(true);

        try{
            const response = await fetch(loginUrl, {
                method: 'POST',
                body: JSON.stringify({ email, password })
            })
            const {user, access_token} = await response.json();
            
            localStorage.setItem('access_token',access_token);
            localStorage.setItem('user', user);
            
            setUser(user);
            setRole(user.role);
            setIsAuthenticated(!!user);
            setAccessToken(access_token);

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
        try{

            const response = await fetch(logoutUrl, {
                method: 'POST',
                headers: {
                    'Authentication': `Bearer ${accessToken}`
                }
            })
            return await response.json();
        }catch(error){
            console.error("Logout failed", error);
        }finally{
            setLoading(false);
        }
    };


    const register = async (name, email, password) => {
        try{

            const response = await fetch(registerUrl, {
                method: 'POST',
                body: JSON.stringify({ name, email, password })
            })
            return await response.json();

        }catch(error){
            console.error("Register failed", error);
        }finally{
            setLoading(false);
        }
    };

    const isAdmin = () => {
        return role === 'admin';
    }

    const isCustomer = () => {
        return role === 'customer';
    }

    const isGuest = () => {
        return !isAuthenticated;
    }



    const value = {
        user,
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