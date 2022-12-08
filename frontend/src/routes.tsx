import { BrowserRouter, Routes, Route, Navigate } from "react-router-dom";
import { Products } from "./pages/Products";
import { NewProduct } from "./pages/NewProduct";

export default function routes() {
  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route path="/"element={<Products />} />
        </Routes>
        <Routes>
          <Route path="/new-product"element={<NewProduct />} />
        </Routes>
      </BrowserRouter>
    </>
  )
}