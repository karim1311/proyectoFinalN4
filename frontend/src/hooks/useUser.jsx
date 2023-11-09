// import { useCallback, useContext } from "react";
// import Context from "../context/UserContext";

// export default function useUser () {
//     const {lvl, setLvl} = useContext(Context)

//     const login =  useCallback(() => {
//         setLvl('test')
//     }, [setLvl])

//     return {
//         isLogged: Boolean(lvl),
//         login
//     }
// }