import {Facebook, Instagram, Pinterest, Twitter} from "@material-ui/icons";
import styled from "styled-components";

const Container = styled.div`
  display: flex;
  background-color: rgba(60, 151, 207, 0.6);
  padding-left: 190px;
`;
const Left = styled.div`
  flex: 1;
  display: flex;
  flex-direction: column;
  padding: 20px;
`;
const Logo = styled.h3`
  display: flex;
  font-family: cursive;
`;

const Desc = styled.p`
  margin: 20px 0px;
`;
const SocialContainer = styled.div`
  display: flex;
`;
const SocialIcon = styled.div`
  width: 40px;
  height: 40px;
  border-radius: 50%;
  color: white;
  background-color: #${(props) => props.color};
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 20px;
`;

const Center = styled.div`
  flex: 1;
  padding: 20px;
`;
const Title = styled.h3`
  margin-bottom: 20px;
`;
const List = styled.ul`
  margin-bottom: 0px;
  padding: 0px;
  list-style: none;
  display: flex;
  flex-wrap: wrap;
`;
const ListItem = styled.li`
  width: 50%;
  margin-bottom: 10px;
`;

const Footer = () => {
  return (
    <Container className="fter">
      <Left>
        <Logo className="fter1">Eventoo</Logo>
        <Desc>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugit
          voluptate doloribus natus, delectus odio nihil laborum veritatis!
          Autem magni quaerat eius unde doloribus, facilis explicabo. Accusamus
          obcaecati voluptatum ipsa corporis.
        </Desc>
        <SocialContainer id="scontainer">
          <SocialIcon color="3B5999">
            <Facebook />
          </SocialIcon>

          <SocialIcon color="E4405F">
            <Twitter />
          </SocialIcon>

          <SocialIcon color="55ACEE">
            <Instagram />
          </SocialIcon>

          <SocialIcon color="E60023">
            <Pinterest />
          </SocialIcon>
        </SocialContainer>
      </Left>
      <Center>
        <Title>Liens</Title>
        <List>
          <ListItem>Home</ListItem>
          <ListItem>Mon compte</ListItem>
          <ListItem>Mon compte</ListItem>
          <ListItem>Mon agenda</ListItem>
        </List>
      </Center>
    </Container> 
  );
};

export default Footer;
