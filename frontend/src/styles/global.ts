import { createGlobalStyle } from "styled-components";

export const GlobalStyle = createGlobalStyle`
    :root{
      --black: #000000;
      --ligh-black: #2c2c2c;
      --dark-purple: #412966;
      --light-purple: #665384;
      --red: #de1f26;
    }

    ::-webkit-scrollbar{width:6px; height: 10px;border-left:1px solid #E6ECF8;}

    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body{
      background: #fafafa;
    }

    html{
      @media(max-width: 1080px) {
          font-size: 93.75%; // 15px
      }
      @media(max-width: 720px){
          font-size: 87.5%;
      }
    }

    h1, h2, h3, h4, h5, strong, th, td, label {
      font-family: 'Ubuntu', sans-serif;
      font-weight: 500;
    }
    p, a, label, span,{
      font-family: 'Roboto', sans-serif;
    }

    a{
      outline: none;
      text-decoration: none;
    }

    button {
      cursor: pointer;
      outline: none;
      border: none;
      background: none;
      color: #fff;
      font-size: 1.15rem;
      font-weight: 600;
    }

    input,textarea,select {
      font-size: 1rem;
      font-family: 'Roboto', sans-serif;
      border: none;
      outline: none;
    }
`;
