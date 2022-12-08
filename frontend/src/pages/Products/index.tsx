import { useNavigate } from "react-router-dom";
import Footer from "../../components/Footer";
import ProductCard from "../../components/ProductCard";
import { useEffect, useState } from "react";
import { IProduct } from "../../interfaces/IProduct";
import { list, deleteMany } from "../../services/product";
import styles from '../style.module.css';
import logo from '../../assets/images/logo.png';

export function Products() {
  const navigate = useNavigate();
  const [products, setProducts] = useState<IProduct[]>();

  const [selectedProducts, setSelectedProducts] = useState<number[]>([]);

  const getProducts = async () => {
    const response = await list();
    setProducts(response.data);
  }

  const selectProduct = (id: number) => {
    setSelectedProducts([...selectedProducts, id]);
  }

  const deleteProducts = async (ids: number[]) => {
    await deleteMany(ids);
    return getProducts();
  }

  useEffect(() => {
    getProducts()
  }, [])

  return (
    <main className={styles.mainContainer}>
      <header>
        <div className={styles.titleContainer}>
          <img src={logo} alt="logo" />
          <h1>Product List</h1>
        </div>
        <div className={styles.actionButtons}>
          <button className={styles.addBtn} id="add" onClick={()=> { navigate("/addproduct") }}>ADD</button>
          <button className={styles.deleteBtn} id="delete-product-btn" onClick={() => deleteProducts(selectedProducts)}>MASS DELETE</button>
        </div>
      </header>

      <div className={styles.productContainer}>
        {products && products?.map((product) => (
          <ProductCard data={product} selectProduct={selectProduct} key={product.id}/>
        ))}
      </div>
      <Footer />
    </main>
  )
}