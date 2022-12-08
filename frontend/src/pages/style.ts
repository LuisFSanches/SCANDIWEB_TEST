import styled from "styled-components";

export const MainContainer = styled.div`
  width: 100vw;
  height: 100vh;
  display: flex;
  flex-direction: column;
  overflow-y: auto;
`

export const Header = styled.header`
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 5px 50px;
  border-bottom: 1px solid var(--dark-purple);

  @media(max-width: 650px) {
    padding: 5px 0px; 
  }
`

export const PageTitleContainer = styled.div`
  display: flex;
  align-items: center;
  
  img {
    width: 70px;
  }

  h1 {
    margin-left: 10px;
    color: #de1f26;
  }

  @media(max-width: 650px) {
    h1 {
      font-size: 25px;
    }
  }
`

export const ProductsContainer = styled.div`
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
  gap: 10px;
  margin-top: 10px;
  justify-items: center;
  overflow-y: auto;

  @media(max-width: 1450px) {
    grid-template-columns: 1fr 1fr 1fr 1fr;
  }

  @media(max-width: 1190px) {
    grid-template-columns: 1fr 1fr 1fr;
  }

  @media(max-width: 845px) {
    grid-template-columns: 1fr 1fr;
  }

  @media(max-width: 535px) {
    grid-template-columns: 1fr;
  }
`

export const ActionButtonsContainer = styled.div`
  width: 280px;
  display: flex;
  justify-content: space-between;

  #add {
    width: 85px;
    padding: 5px;
    border-radius: 5px;
    background: var(--dark-purple);
  }

  #delete-product-btn, #cancel {
    width: 150px;
    padding: 5px;
    border-radius: 5px;
    background: var(--red);
  }

  @media(max-width: 650px) {
    justify-content: end;
    margin-right: 15px;
    #cancel {
      width: 120px;
    }
  }

  @media(max-width: 450px) {
    flex-direction: column;
    margin-left: 40px;
  }

`
