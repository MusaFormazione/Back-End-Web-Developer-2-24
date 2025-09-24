import { useEffect } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import './App.css';
import Header from './components/header/Header';
import Home from './components/pages/Home';
import { ProductsProvider } from './contexts/ProductsContext';
import { AuthProvider, useAuth } from './contexts/AuthContext';

function AppContent() {
  const { user, role } = useAuth();



  return (
    <>
      <Header user={user} role={role} />
      <main>
        <Home />
      </main>
    </>
  );
}

function App() {
  return (
    <AuthProvider>
      <ProductsProvider>
        <AppContent />
      </ProductsProvider>
    </AuthProvider>
  )
}

export default App
