import React, { Component } from 'react';
import PropTypes from 'prop-types';
import styled from 'styled-components';

import { media, widerThan, sizes } from '../../styles/styles';

const mobileStyle = css`
  height: 200px;
`;

const Slider = styled.div`
  height: 60vh;
  position: relative;
  ${widerThan(sizes.siteWidth)}
  img {
    position: absolute;
    z-index: 1;
    border: none;
    box-shadow: none;
    left: 0;
    top: 0;
    width: 100%;
    object-fit: cover;
    height: 100%;
    &.current {
      z-index: 3;
    }
  }
  ${media.mobileLandscape`
    ${mobileStyle}
  `}
`;

export default class PhotoSlider extends Component {

  static propTypes = {
    images: PropTypes.array.isRequired,
  };
  state = {
    activeImg: 0,
  };
  componentDidMount() {
    setInterval(() => cycleImages(), 15000);
  }

  cycleImages() {
    const $active = $container.find('.current'),
        $prev = $active.prev(),
        $next = ($container.find('.current').next().length > 0) ? $container.find('.current').next() : $container.find('img:first');
    $next.show().css('zIndex', 2);
    $active.fadeOut(1500, function(){ //fade out the top image
      $active.css('z-index', 1).removeClass('current'); //reset the z-index and unhide the image
      $next.css('z-index', 3).addClass('current').fadeIn(1500); //make the next image the top one
      $prev.hide();
    });
  };

  render() {
    return (
      <Slider>
        {this.props.images.map((image, i) => <img src={image.src} key={i} current={i == state.activeImg} />)}
      </Slider>
    );
  }
}
