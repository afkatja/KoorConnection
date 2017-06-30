import React, { Component } from 'react';
import PropTypes from 'prop-types';

import DataStore from '../flux/stores/DataStore';

export default class Home extends Component {

  static propTypes = {

  };

  render() {
    const data = DataStore.getAll();
    console.log(data);
    return (
      <div>Home</div>
    );
  }

}
