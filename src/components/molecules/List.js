import React from 'react';
import styled from 'styled-components';
import { media } from '../../styles/styles';

export default styled.ul`
  display: flex;
  align-items: center;
  list-style: none;
  padding: 0;
  margin: 0;
  &.main-nav {
    height: 100%;
    align-items: flex-end;
  }
  &.centered {
    justify-content: center;
  }
  &.bullets {
    list-style: disc;
    padding-left: 20px;
  }
  ${media.mobileLandscape`
    flex-direction: column;
  `}
`;
