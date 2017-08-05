import React, { Component } from 'react';
import PropTypes from 'prop-types';

import DataStore from '../../flux/stores/DataStore';

import ContentContainer from '../organisms/ContentContainer';
import PhotoSlider from '../organisms/PhotoSlider';

const images = [
  { src: '/static/connection.jpg' },
  { src: '/static/kerst2016.jpg' },
  { src: '/static/kooruitje2015.jpg' },
  { src: '/static/koorweekend2014.jpg' },
  { src: '/static/koorweekend2016.jpg' },
  { src: '/static/mkf-cropped.jpg' },
];
export default class Frontpage extends Component {

  static propTypes = {

  };

  render() {
    const page = DataStore.getPageBySlug('index');
    console.log('frontpage', this.props, page);
    return (
      <ContentContainer>
        <h1>Frontpage</h1>
        <PhotoSlider images={images} />
      </ContentContainer>
    );
  }

}
