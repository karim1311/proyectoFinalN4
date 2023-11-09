import React, { Children } from 'react'
import { NavLink } from 'react-router-dom'

export default function Sidebar({children}) {
    const menuItem=[
        {
            path:"/dashboard",
            name:"Inicio",
        },
        {
            path:"/bitacoras",
            name:"Bitacoras",
        },
        {
            path:"/enlaces",
            name:"Enlaces",
        },
        {
            path:"/roles",
            name:"Roles",
        },
        {
            path:"/usuarios",
            name:"Usuarios",
        },
    ]
  return (
    <div className='flex'>
        <div className='bg-[#000] text-[#fff] h-screen'>
            <div className='flex items-center p-4'>
                <h1 className='text-3xl'>Logo</h1>
                <div className='flex text-2xl'>
                    Barritas icono
                </div>
            </div>
            {
                menuItem.map((item, index)=>(
                    <NavLink to={item.path} key={index} className="link">
                        <div>{item.name}</div>
                    </NavLink>                ))
            }
        </div>
        <main className='w-[100%] p-5'>{children}</main>
    </div>
  )
}
