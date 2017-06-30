import React, { Component } from 'react';
import { render } from 'react-dom';
import { Router, Switch, Route } from 'react-router-dom';
import { createBrowserHistory } from 'history';

import DataActions from './flux/actions/DataActions';

import Home from './components/Home';
import NotFound from './components/NotFound';

class App {
  buildRoutes(data) {
    console.log('building routes', data);
    return data.map((page, i) => {
      <Route key={i} component={Home} path={`/${page.slug}`} exact />
    });
  }

  run() {
    DataActions.getPages(response => {
      render (
        <Router history={createBrowserHistory()}>
          <Switch>
            <Route exact path="/" component={Home} />
            {this.buildRoutes(response)}
            <Route component={NotFound} />
          </Switch>
        </Router>,
        document.getElementById('root')
      );
    });
  }
}
new App().run();
