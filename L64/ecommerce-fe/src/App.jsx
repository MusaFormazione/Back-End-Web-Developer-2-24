import 'bootstrap/dist/css/bootstrap.min.css';
import './App.css';
import Header from './components/header/Header';
import { ProductsProvider } from './contexts/ProductsContext';
import { AuthProvider } from './contexts/AuthContext';

function AppContent() {


  return (
    <>
      <Header />
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
