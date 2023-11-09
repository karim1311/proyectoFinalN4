// import React from 'react'
// import { Link } from 'react-router-dom'

// import useUser from '../hooks/useUser'


// export default function Header() {
//     // const isLogged = false
//     const {isLogged, logout} = useUser()

//     const handleClick = e => {
//       e.preventDefault()
//       logout()
//     }

//   return (
//     <header className='flex justify-end'>
//         {
//             isLogged
//              ? <Link to='#' onClick={handleClick} className='text-black text-base font-semibold hover:underline'>
//                 Logout
//              </Link>
//               : <Link to='/login' className='text-black text-base font-semibold hover:underline'>
//                 Login
//               </Link>
//         }
//     </header>
//   )
// }
