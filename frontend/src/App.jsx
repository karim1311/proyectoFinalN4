import "./App.css";
import { BrowserRouter, Route, Routes} from "react-router-dom";
import Register from "./components/Register";
import Login from "./components/login";
import Dashboard from "./components/Dashboard";
import Bitacoras from "./components/Bitacoras";
import Usuarios from "./components/Usuarios";
import Roles from "./components/Roles";
import Enlaces from "./components/Enlaces";
import Sidebar from "./components/Sidebar";


function App() {
  return (
    <BrowserRouter>
      <Sidebar>
        <Routes>
          <Route path="/" element={<Dashboard />} />
          <Route path="/dashboard" element={<Dashboard />} />
          <Route path="/bitacoras" element={<Bitacoras />} />
          <Route path="/enlaces" element={<Enlaces />} />
          <Route path="/roles" element={<Roles />} />
          <Route path="/usuarios" element={<Usuarios />} />
        </Routes>
      </Sidebar>
    </BrowserRouter>
  );
}

export default App;
