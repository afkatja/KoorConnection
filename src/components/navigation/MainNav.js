import React, { Component } from 'react';
import PropTypes from 'prop-types';
import styled from 'styled-components';

import { sizes, media } from '../../styles/styles';

import List from '../molecules/List';
import LinkItem from '../atoms/Link';

const Nav = styled.nav`
  flex: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  padding: 20px 0;
  height: ${sizes.mainNavHeight};
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
      <Nav>
        <List className="centered">
          {this.props.links.map((link, i) => (
            <li key={link.id}>
              <LinkItem to={link.slug} className="nav-link">{link.title.rendered}</LinkItem>
            </li>
          ))}
        </List>
      </Nav>
    );
  }

}
