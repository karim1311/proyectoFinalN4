import { useState } from "react";
import { Route, Routes } from "react-router-dom";
import React from "react";

export default function Login() {
  const [correo, setCorreo] = useState("");
  const [clave, setClave] = useState("");

  const handleFormSubmit = (event) => {
    event.preventDefault();
    const dataToSubmit = {
      correo,
      clave,
    };
    fetch("http://127.0.0.1:8000/api/usuario", {
      method: "POST",
      headers: {
        "Content-type": "application/json; charset=UTF-8",
      },
      body: JSON.stringify(dataToSubmit),
    })
      .then((res) => res.json())
      .then((res) => {
        console.log(res);
      });
  };
  return (
    <>
      <main className="flex flex-col h-screen noto-sans">
        <section className="flex flex-col justify-center self-center w-[470px] h-[630px] border rounded-3xl border-[#BDBDBD] gap-8">
          <div className="flex w-[360px] self-center">
            <i></i>
            <p>DevChallenges</p>
          </div>
          <div className="flex flex-col w-[360px] justify-start pl-14 gap-3">
            <p className="flex text-left h-[50px] font-semibold text-lg">
              Login
            </p>
            <p className="flex text-left font-normal text-base"></p>
          </div>
          <form
            method="post"
            action="#"
            onSubmit={handleFormSubmit}
            className="flex self-center flex-col w-[357px] gap-3"
          >
            <div className="flex border rounded-lg border-[#BDBDBD] h-[48px] items-center">
              <i className="material-symbols-outlined icono p-1">mail</i>
              <input
                className="focus:outline-none"
                type="email"
                placeholder="Email"
                name="correo"
                value={correo}
                onChange={(event) => setCorreo(event.target.value)}
              />
            </div>
            <div className="flex border rounded-lg border-[#BDBDBD] h-[48px] items-center">
              <i className="material-symbols-outlined icono p-1">lock</i>
              <input
                className="focus:outline-none"
                type="password"
                placeholder="Password"
                name="clave"
                value={clave}
                onChange={(event) => setClave(event.target.value)}
              />
            </div>
            <button className="bg-[#2F80ED] text-white rounded-lg h-[38px]">
              Login
            </button>
          </form>
          <div className="flex flex-col gap-8 text-gray-500">
            <p>or continue with these social profile</p>
            <div className="flex justify-center gap-4">
              <span className="flex justify-center border rounded-full w-[42px] h-[42px] items-center align-middle">
                <i className="fa-brands fa-google icono"></i>
              </span>
              <span className="flex justify-center border rounded-full w-[42px] h-[42px] items-center align-middle">
                <i className="fa-brands fa-square-facebook icono"></i>
              </span>
              <span className="flex justify-center border rounded-full w-[42px] h-[42px] items-center align-middle">
                <i className="fa-brands fa-x-twitter icono"></i>
              </span>
              <span className="flex justify-center border text-[#828282] rounded-full w-[42px] h-[42px] items-center align-middle">
                <i className="fa-brands fa-github icono"></i>
              </span>
            </div>
            <p>
              Don't have an account yet?{" "}
              <a href="/" className="underline text-blue-600">
                Register
              </a>
            </p>
          </div>
        </section>
      </main>
    </>
  );
}
