import React, { Component } from 'react';
import PropTypes from 'prop-types';
import styled from 'styled-components';

import { sizes, media } from '../../styles/styles';

import LogoLink from '../atoms/Logo';
import List from '../molecules/List';
import LinkItem from '../atoms/Link';

const NavContainer = styled.header`
  flex: none;
  position: fixed;
  top: 0;
  width: 100%;
  max-width: ${sizes.siteWidth};
  height: ${sizes.mainNavHeight};
  display: flex;
  align-items: center;
`;

const Nav = styled.nav`
  margni-left: auto;
  height: 100%;
  li:not(:last-child) {
    margin-right: 10px;
  }
  ${media.mobileLandscape`
    li:not(:last-child) {
      margin-right: 0;
      margin-bottom: 10px;
    }
  `}
`;

export default class MainNav extends Component {

  static propTypes = {
    links: PropTypes.arrayOf(PropTypes.object.isRequired).isRequired,
  };

  render() {
    return (
      <NavContainer className="container">
        <LogoLink />
        <Nav>
          <List className="main-nav">
            {this.props.links.map((link, i) => (
              <li key={link.id}>
                <LinkItem to={link.slug} className="nav-link">{link.title.rendered}</LinkItem>
              </li>
            ))}
          </List>
        </Nav>
      </NavContainer>
    );
  }
}
