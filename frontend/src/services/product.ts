import { IProduct } from "../interfaces/IProduct";
import { api } from "./api";

export const list = async () => {
  const response = await api.get('/product');
  return response;
}

export const create = async ({ 
  name, 
  price, 
  sku, 
  type, 
  size, 
  weight, 
  height, 
  width, 
  length 
}: IProduct) => {

  const response = await api.post('/product', {
    name,
    price,
    sku,
    type,
    size: size || null,
    weight: weight || null,
    height: height || null,
    width: width || null,
    length: length || null
  });

  return response;
}

export const deleteMany = async (ids: number[]) => {
  try {
    await api.post('/product/deleteMany', {
      ids
    });
  } catch(error) {
    return error;
  }

}