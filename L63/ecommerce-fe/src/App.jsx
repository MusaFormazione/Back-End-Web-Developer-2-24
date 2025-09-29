import 'bootstrap/dist/css/bootstrap.min.css';
import './App.css';
import Header from './components/header/Header';
import Home from './components/pages/Home';
import { ProductsProvider } from './contexts/ProductsContext';
import { AuthProvider } from './contexts/AuthContext';

function AppContent() {


  return (
    <>
      <Header />
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
