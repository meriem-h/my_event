import React from 'react';
import styled from 'styled-components';
import { Link, BrowserRouter as Router} from "react-router-dom";
import GgLogin from './GgLogin';


const Container = styled.div`
  height: 60px;
  background-color: rgba(60, 151, 207, 0.6);
  padding: 8px
`
const Wrapper = styled.div`
 padding: 10px 20px;
 display: flex;
 justify-content: space-between;
 align-items: center;
`
const Left = styled.div`
  width: 33.3%;
  flex: 1;
  align-items: center;
  display: flex;
  margin-left: 300px;
  `
const Right = styled.div`
width: 33.3%;
flex: 1;
display: flex;
align-items: center;
justify-content: flex-end;
`
const Logo = styled.h3`
font-weight: bold;
font-family: cursive;
`
const Navbar = () => {
  return (
      <Container className='nav_cont'>
        <Wrapper>
        <Left>
          <Logo className='nav-item2'>Eventoo</Logo>
        </Left>
     <Right>
          <GgLogin/>
          <Link className='link l-register' to="/register">Inscription</Link>
          <Link className='link' to="/login">Connexion</Link>
    </Right>
        </Wrapper>
      </Container>
  )
}

export default Navbar
