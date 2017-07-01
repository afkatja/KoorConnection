import React, { Component } from 'react';
import PropTypes from 'prop-types';

import LinkItem from '../atoms/Link';

export default class MainNav extends Component {

  static propTypes = {
    links: PropTypes.arrayOf(PropTypes.object.isRequired).isRequired,
  };

  render() {
    return (
      <nav>
        <ul>
          {this.props.links.map((link, i) => (
            <li key={link.id}>
              <LinkItem to={link.slug}>{link.title.rendered}</LinkItem>
            </li>
          ))}
        </ul>
      </nav>
    );
  }

}
