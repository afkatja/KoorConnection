import React, { Component } from 'react';
import PropTypes from 'prop-types';

import LinkItem from '../atoms/Link';

export default class FooterNav extends Component {

  static propTypes = {
    links: PropTypes.arrayOf(PropTypes.object),
  };

  static defaultProps = {
    links: [{}],
  };

  render() {
    return (
      <footer>
        <ul>
          {this.props.links.map((link, i) => (
            <li key={i}><LinkItem to={link.slug}>{link.title.rendered}</LinkItem></li>
          ))}
        </ul>
      </footer>
    );
  }

}
