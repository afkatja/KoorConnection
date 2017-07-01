import React, { Component } from 'react';
import PropTypes from 'prop-types';
import styled from 'styled-components';
import { Link } from 'react-router-dom';

import { sizes, media } from '../../styles/styles';

import Logo from '../../assets/Logo';

const LogoImg = styled(Link)`
  display: block;
  height: ${sizes.logoSize};
  > svg {
    height: 100%;
  }
  ${media.mobileLandscape`
    height: ${sizes.logoSize / 1.5};
  `}
`

export default class LogoLink extends Component {

  static propTypes = {

  };

  render() {
    return (
      <LogoImg to="/" title="Connection" rel="home">
        <Logo />
      </LogoImg>
    );
  }

}
