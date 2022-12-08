import styled from "styled-components";

interface IContainer {
  color: string;
}

export const Container = styled.div<IContainer>`
  width: 270px;
  height: 250px;
  border-radius: 10px;
  border: 2px solid var(--dark-purple);
  background-color: ${(props) => props.color};
  box-shadow: 0.1rem 0.1rem 0.2rem 0.1rem #939393;
  
  .delete-checkbox {
    width: 20px;
    height: 20px;
  }

  @media(max-width: 845px) {
    width: 240px;
    height: 240px;
  }

  @media(max-width: 535px) {
    width: 300px;
    height: 220px;
  }
`

export const ProductInfo = styled.div`
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;

  p {
    padding: 8px 0;
    font-size: 20px;
    text-align: center;
  }

`