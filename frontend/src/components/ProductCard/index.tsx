import { IProduct } from '../../interfaces/IProduct';

import { formatCurrency } from "../../utils/formatCurrency";

import cardStyles from './style.module.css';
interface IProductCard {
  data: IProduct;
  selectProduct: (id: number) => void;
}

export default function ProductCard({ data, selectProduct }: IProductCard) {
  const type = data['type'];

  const checkType = () => {
    switch(type) {
      case 'Book':
        return { label: `Weight: ${data['weight']} Kg`, color: '#7ae95f' };
      case 'DVD':
        return { label: `Size: ${data['size']}Mb`, color: '#ADADAD'};
      case 'Furniture':
        return {
          label: `Dimension: 
            ${data['length']} x ${data['width']} x ${data['height']}
          `,
          color: '#FFD700'
        }
      default:
        return null;
    }
  }

  return (
    <div 
      className={cardStyles.container} 
      style={{ backgroundColor: `${checkType()?.color}`}}
    >
      <div style={{ width: '100%', padding: '10px' }}>
        <input type="checkbox" className="delete-checkbox" onChange={() => selectProduct(data['id'] as number)}/>
      </div>
      <div className={cardStyles.productInfo}>
        <p>{data['sku']}</p>
        <p>{data['name']}</p>
        <p>{formatCurrency(data['price'])}</p>
        <p>{checkType()?.label}</p>
      </div>
    </div>
  )
}