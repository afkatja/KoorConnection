import React, { Component } from 'react';
import PropTypes from 'prop-types';

import DataStore from '../flux/stores/DataStore';

import MainNav from './navigation/MainNav';
import FooterNav from './navigation/FooterNav';

export default class Home extends Component {

  static propTypes = {
    // children: PropTypes.node.isRequired,
  };

  render() {
    const pages = DataStore.getPages();
    const posts = DataStore.getPosts();
    return (
      <div className="site-wrap">
        <MainNav links={pages} />
        <main className="main">{this.props.children}</main>
        <FooterNav links={posts} />
      </div>
    );
  }

}
