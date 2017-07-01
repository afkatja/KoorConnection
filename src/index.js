import React, { Component } from 'react';
import { render } from 'react-dom';
import { Router, Switch, Route } from 'react-router-dom';
import { createBrowserHistory } from 'history';

import DataActions from './flux/actions/DataActions';

import './styles/styles';

import Home from './components/Home';
import NotFound from './components/NotFound';

class App {
  state = {
    pages: [],
    posts: [],
    settings: [],
    users: [],
  };

  buildPagesRoutes(pages) {
    console.log('building routes for pages', pages);
    return pages.map((page, i) => {
      <Route key={i} component={Home} path={`/${page.slug}`} exact />
    });
  }

  buildPostsRoutes(posts) {
    return posts.map((post, i) => {
      <Route key={i} component={Home} path={`/${post.slug}`} exact />
    })
  }

  setContent = (data) => {
    this.state.pages = data.pages;
    this.state.posts = data.posts;
  };

  setSettings = data => this.state.settings = data.settings;

  run() {
    DataActions.getPages(response => {
      this.setContent(response);
      render (
        <Router history={createBrowserHistory()}>
          <Switch>
            <Route exact path="/" component={Home} />
            {this.buildPagesRoutes(response.pages)}
            {this.buildPostsRoutes(response.posts)}
            <Route component={NotFound} />
          </Switch>
        </Router>,
        document.getElementById('root')
      );
    });
    DataActions.getSettings(response => this.setSettings(response.data));
  }
}
new App().run();

if (module.hot) {
  module.hot.accept();
}
