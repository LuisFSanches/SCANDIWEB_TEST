export interface IProduct {
  id?: number;
  name: string;
  price: number;
  sku: string;
  type: string;
  size?: string;
  weight?: number;
  height?: number;
  width?: number;
  length?: number;
  created_at?: Date;
}