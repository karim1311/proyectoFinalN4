import { useEffect, useState } from "react";
import { Link } from "react-router-dom";

const endpoint = "http://127.0.0.1:8000/api";

export default function Usuarios() {
  const [busqueda, setBusqueda] = useState("");
  const [resultadosFiltrados, setResultadosFiltrados] = useState([]); // Inicializa con un array vacío
  const [usuarios, setUsuarios] = useState([]);
  useEffect(() => {
    fetch('http://127.0.0.1:8000/api/usuarios')
    // Exito
    .then(response => response.json())// convertir a json
    .then(json => {
        console.log(json);
        setUsuarios(json)
    })    //imprimir los datos en la consola
    .catch(err => console.log('Solicitud fallida', err)); // Capturar errores
  }, []);

  const deleteUsuario = async (id) => {
    fetch(`${endpoint}/usuario/${id}}`, {
      method: "DELETE",
    })
      .then((res) => res.text()) // or res.json()
      .then((res) => console.log(res));
  };

  useEffect(() => {
    // Filtrar los resultados basados en el valor de búsqueda
    const resultados = usuarios.filter((usuario) =>
      usuario.usuario.toLowerCase().includes(busqueda.toLowerCase()) ||
      usuario.correo.toLowerCase().includes(busqueda.toLowerCase()) ||
      usuario.habilitado.toLowerCase().includes(busqueda.toLowerCase())
    );
    setResultadosFiltrados(resultados);
  }, [usuarios, busqueda]);

  const handleInputChange = (event) => {
    const valorBusqueda = event.target.value;
    setBusqueda(valorBusqueda);
  };

  return (
    <div className="bg-[#1f252e] inline-block w-full overflow-auto m-[-50]">
      <div className="flex justify-start w-5/6 p-0">
        <Link to="/usuariocreate" className="button  btn-lg mt-2 mb-2 ">
          Create Usuario
        </Link>
      </div>
      <div className="flex lg:justify-between border-b-2 border-fuchsia-900 pb-1">
        <h2 className="text-2xl text-gray-500 font-bold">Todos los usuarios</h2>
        <div className="text-center flex-auto">
          <input
            type="text"
            name="busca"
            placeholder="Search..."
            className="
          text-slate-400
          bg-[#1f252e]
           w-1/3
           py-2
           border-b-2 border-slate-100
           outline-none
           focus:border-yellow-400
         "
            value={busqueda}
            onChange={handleInputChange}
          />
        </div>
      </div>
      <table className="table table-striped border-separate space-y-6 text-sm m-auto mx-auto">
        <thead className="bg-[#434a5a] text-black">
          <tr className="tra">
            <th className="p-3">PERSONA</th>
            <th className="p-3">USUARIO</th>
            <th className="p-3 text-left">CORREO</th>
            <th className="p-3 text-left">HABILITADO</th>
            <th className="p-3 text-left">FECHA</th>
            <th className="p-3 text-left">ROL</th>
            <th className="p-3 text-left">ID CREADOR</th>
            <th className="p-3 text-left">ACCIÓN</th>
          </tr>
        </thead>
        <tbody>
          {resultadosFiltrados.map((usuario) => (
            <tr
              key={usuario.id}
              className="bg-[#323846] lg:text-black text-center tra"
            >
              <td className="p-1 font-extrabold text-[#01eefe]">
                {usuario.id}
              </td>
              <td className="p-1"> {usuario.usuario}</td>
              <td className="p-1 font-medium capitalize">{usuario.correo}</td>
              <td className="p-1 font-medium capitalize">
                {usuario.habilitado}
              </td>
              <td className="p-1">{usuario.fecha}</td>
              <td className="p-1">{usuario.rol}</td>
              <td className="p-1">{usuario.usuariocreacion}</td>
              <td className="p-1">
                <Link to={`/usuarioedit/${usuario.id}`} className="mr-3">
                  <i className="fa-solid fa-pencil text-green-700" />
                </Link>
                <button
                  className="ml-3"
                  onClick={() => deleteUsuario(usuario.id)}
                >
                  <i className="fa-solid fa-trash-can text-red-700" />
                </button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}
