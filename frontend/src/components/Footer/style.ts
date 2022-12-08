import styled from "styled-components";

export const Container = styled.div`
  width: 100%;
  min-height: 60px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background-color: var(--dark-purple);
  position: absolute;
  bottom: 0;

  p {
    font-size: 18px;
    font-weight: 600;
    font-style: italic;
    color: #fff;
  }

  @media(max-width: 550px) {
    position: relative;
  }
`