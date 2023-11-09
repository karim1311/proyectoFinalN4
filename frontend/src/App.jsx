import "./App.css";
import { Route, Routes, Router, Link } from "react-router-dom";
import Register from "./components/Register";
import Login from "./components/login";
import Dashboard from "./components/Dashboard";
import Bitacoras from "./components/Bitacoras";
import Usuarios from "./components/Usuarios";
import Roles from "./components/Roles";
import Enlaces from "./components/Enlaces";

function App() {
  return (
    <>
        <Routes>
          <Route path="/" element={<Dashboard />} />
          <Route path="/login" element={<Login />} />
          <Route path="/bitacoras" element={<Bitacoras />} />
          <Route path="/usuarios" element={<Usuarios />} />
          <Route path="/roles" element={<Roles />} />
          <Route path="/enlaces" element={<Enlaces />} />
        </Routes>
    </>
  );
}

export default App;
