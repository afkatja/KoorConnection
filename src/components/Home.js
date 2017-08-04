import React, { Component } from 'react';
import PropTypes from 'prop-types';
import styled from 'styled-components';

import { sizes } from '../styles/styles';

import DataStore from '../flux/stores/DataStore';

import MainNav from './navigation/MainNav';
import FooterNav from './navigation/FooterNav';
import SocialNav from './navigation/SocialNav';

const SiteContainer = styled.div`
  max-width: ${sizes.siteWidth};
  margin-left: auto;
  margin-right: auto;
  background: #fff;
  display: flex;
  flex-direction: column;
  padding-top: ${sizes.mainNavHeight};
  main {
    flex: 1 1 auto;
    min-height: calc(100vh - ${sizes.mainNavHeight} - ${sizes.footerHeight});
  }
`;

export default class Home extends Component {

  static propTypes = {
    // children: PropTypes.node.isRequired,
  };

  render() {
    const pages = DataStore.getPages();
    const posts = DataStore.getPosts();
    const settings = DataStore.getSettings();
    console.log('do we have the settings?', settings);
    return (
      <SiteContainer className="site-wrap">
        <MainNav links={pages} />
        <main className="main">{this.props.children}</main>
        <FooterNav links={posts} />
        <SocialNav />
      </SiteContainer>
    );
  }

}
