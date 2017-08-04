import React, { Component } from 'react';
import PropTypes from 'prop-types';
import styled from 'styled-components';
import  { centerAll, centerVertical, colors } from '../../styles/styles';

import { Facebook, Twitter, Youtube } from '../../assets/icons';

const SocialBar = styled.div`
  position: fixed;
  right: 0;
  ${centerVertical}
  background-color: ${colors.$black};
  box-shadow: -1px 0 5px ${colors.$brownLight};
  z-index: 20;
  border-radius: 5px 0 0 5px;
  padding: 1rem .5rem;
  transition: all .3s ease-in-out;
  &:hover {
    padding-right: 1rem;
    padding-left: 1rem;
  }
  ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    li {
      &:not(:last-child) {
        margin-bottom: 1rem;
      }
      a {
        position: relative;
        display: inline-block;
        text-indent: -999rem;
        overflow: hidden;
        width: 2rem;
        height: 2rem;
        > svg {
          text-indent: 0;
          position: absolute;
          ${centerAll}
          width: 100%;
          height: 100%;
          fill: ${colors.$light};
        }
        &:hover, &:focus {
          > svg {
            fill: ${colors.$brownLight};
          }
        }
      }
    }
  }
`;

export default class SocialNav extends Component {

  static propTypes = {

  };

  render() {
    return (
      <SocialBar>
  			<ul>
          <li><a href="https://twitter.com/KoorConnection" target="_blank"><Facebook /> @koorconnection</a></li>
          <li><a href="https://www.facebook.com/groups/273765169424858/" target="_blank"><Twitter />Connection group</a></li>
          <li><a href="http://www.youtube.com/channel/UCe-GYjf64U_fJKdyPQMIEhQ" target="_blank"><Youtube />Connection channel</a></li>
        </ul>
  		</SocialBar>
    );
  }

}
