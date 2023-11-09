import React from "react";
import { Router, Link } from "react-router-dom";

export default function Dashboard() {
  return (
    <>
      <main className="flex h-screen bg-slate-600">
        <aside className="flex justify-start flex-col bg-[#222d32]">
            <div>
              <Link to="/roles">Roles</Link>
            </div>
            <div>
              <Link to="/usuarios">Usuarios</Link>
            </div>
            <div>
              <Link to="/bitacoras">Bitacoras</Link>
            </div>
            <div>
              <Link to="/enlaces">Enlaces</Link>
            </div>
        </aside>
        <div>aqui puedes ver los datos</div>
      </main>
    </>
  );
}
