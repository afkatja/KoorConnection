import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { Link } from 'react-router-dom';
import styled, { css } from 'styled-components';
import { transparentize } from 'polished';

import { colors, typography } from '../../styles/styles';

const styles = css`
  cursor: pointer;
  text-decoration: none;
  color: ${colors.$blue};
  &:visited,
  &:hover,
  &:focus {
    color: ${colors.$brownLight}
  }
  &.nav-link {
    font-family: ${typography.styledFont};
    display: block;
    text-shadow: 0px 1px 1px ${transparentize(0.5, '#fff')};
    word-break: break-all;
    white-space: nowrap;
    color: ${colors.$blue};

    &:hover,
    &:focus {
      color: ${colors.$darkBrown};
    }
  }
  &.label-link {
    display: inline-block;
    margin-left: 5px;
  }
  &.compact-link {
    display: inline-block;
    font-size: ${typography.compactFontSize};
  }
  &.small-link {
    font-size: ${typography.compactFontSize};
  }
  &.left {
    margin-right: 15px;
    margin-left: 0;
    text-align: left;
    flex: 1;
  }
  &.right {
    margin-left: auto;
    text-align: right;
    flex: 1;
  }
  &.centered {
    text-align: center;
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
`;

const StyledLink = styled(Link)`
  ${styles}
`;

const StyledAnchor = styled.a`
  ${styles}
`;

export default class LinkItem extends Component {
  static PropTypes = {
    to: PropTypes.string,
  };

  static defaultProps = {
    to: '',
  };

  render() {
    const { to, ...props } = this.props;
    const rendered = to ? <StyledLink to={to} {...props} /> : <StyledAnchor {...props} />;
    return (rendered);
  }
}
