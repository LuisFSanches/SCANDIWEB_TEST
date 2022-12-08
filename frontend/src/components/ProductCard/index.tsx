import { IProduct } from '../../interfaces/IProduct';
import { Container, ProductInfo } from './style';

import { formatCurrency } from "../../utils/formatCurrency";

interface IProductCard {
  data: IProduct;
  selectProduct: (id: number) => void;
}

export default function ProductCard({ data, selectProduct }: IProductCard) {
  const type = data['type'];

  const checkType = () => {
    switch(type) {
      case 'Book':
        return { label: `Weight: ${data['weight']} Kg`, color: '#C7DCA6' };
      case 'DVD':
        return { label: `Size: ${data['size']}Mb`, color: '#ea9999'};
      case 'Furniture':
        return {
          label: `Dimension: 
            ${data['length']} x ${data['width']} x ${data['height']}
          `,
          color: '#E1B164'
        }
      default:
        return null;
    }
  }

  return (
    <Container color={checkType()?.color as string}>
      <div style={{ width: '100%', padding: '10px' }}>
        <input type="checkbox" className="delete-checkbox" onChange={() => selectProduct(data['id'] as number)}/>
      </div>
      <ProductInfo>
        <p>{data['sku']}</p>
        <p>{data['name']}</p>
        <p>{formatCurrency(data['price'])}</p>
        <p>{checkType()?.label}</p>
      </ProductInfo>
    </Container>
  )
}