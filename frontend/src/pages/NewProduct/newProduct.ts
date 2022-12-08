import styled from "styled-components";

export const BodyContainer = styled.div`
  height: 87vh;
  display: flex;

  img {
    width: 50vw;
  }

  @media(max-width: 950px) {
    #banner {
      display: none;
    } 
  }
`

export const Form = styled.form`
  width: 50vw;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 0 auto;
  padding: 5px 15px;
  overflow-y: auto;

  button {
    width: 170px;
    padding: 10px;
    align-self: center;
    margin-top: 12px;
    border-radius: 10px;
    background-color: var(--dark-purple);
    font-size: 20px;

    &:hover {
      filter: brightness(75%);
    }
  }

  @media(max-width: 950px) {
    width: 90vw; 
  }
`

export const FormGroup = styled.div`
  width: 80%;
  display: flex;
  flex-direction: column;
  padding: 0.3rem 1rem;

  label {
    align-self: start;
    margin-left: 10px;
    margin-bottom: 5px;
    font-size: 1.3rem;
    font-weight: 600;
    color: var(--ligh-black);
  }

  input,
  select {
    width: 100%;
    padding: 0.4rem;
    border: 1px solid var(--black);
    border-radius: 1rem;
    background: var(--light-purple);
    font-size: 1.2rem;
    font-weight: 600;
    color: #fff;
  }

  .error-message {
    align-self: center;
    color: red;
    font-size: 18px;
    font-weight: 700;
  }

  @media(max-width: 1250px) {
    width: 100%; 
  }
`
export const FormHeader = styled.div`
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;

  h1 {
    color: var(--ligh-black);
  }

  img {
    width: 90px;
  }
`