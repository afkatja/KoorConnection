import { injectGlobal, css, keyframes } from 'styled-components';
import { mix, transparentize } from 'polished';
import WebFont from 'webfontloader';

WebFont.load({
  google: {
    families: ['Copse:400,700', 'sans-serif']
  }
});

// eslint-disable-next-line no-unused-expressions
injectGlobal`
  html, body {
    min-height: 100%;
    margin: 0;
    padding: 0;
    width: 100%;
    font-size: 16px;
    line-height: 1.5;
    font-family: 'Helvetica, Arial', sans-serif;
    color: {colors.$black};
  }

  #root {
    display: block;
    min-height: 100%;
    position: relative;
    width: 100%;
    -webkit-font-smoothing: antialiased;
    [data-reactroot] {
      min-height: 100%;
    }
  }

  * {
    box-sizing: border-box;
  }
`;

export const colors = {
  $light: '#FFFEF5', //rgba(44, 87, 255, .1)
  $lightBlue: '#E6EEF5',
  $blue: '#2A3670',
  $black: '#0F0C09',
  $blueAlpha: transparentize(0.8, '#2A3670'),
  $brownLight: '#AD9B89',

  //mixed colors
  $lightWarmBrown: mix(0.25, '#D1C0AE', '#fff'),
};

export const typography = {
  compactFontSize: '12px',
  regularFontSize: '16px',
};

export const sizes = {
  tabletLandscape: 1024,
  tabletPortrait: 768,
  mobileLandscape: 60,
  mobilePortrait: 380,
};

// eslint-disable-next-line import/prefer-default-export
export const media = Object.keys(sizes).reduce((accumulator, label) => ({
  ...accumulator,
  [label]: (...args) => css`
    @media (max-width: ${sizes[label]}px) {
      ${css(...args)}
    }
  `,
}), {});

export const mediaMin = {
  landscape: (...args) => css`
    @media (min-width: ${sizes.mobileLandscape + 1}px) {
      ${css(...args)}
    }
  `,
  tablet: (...args) => css`
    @media (min-width: ${sizes.tabletPortrait + 1}px) {
      ${css(...args)}
    }
  `,
};

export function centerHorizontal() {
  return `
    left: 50%;
    transform: translateX(-50%);
  `;
}
export function centerVertical() {
  return `
    top: 50%;
    transform: translateY(-50%);
  `;
}
export function centerAll() {
  return `
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  `;
}

export const reveal = keyframes`
  0% {
    opacity: 0;
    transform: scale3d(.3, .3, .3);
  }

  20% {
    transform: scale3d(1.1, 1.1, 1.1);
  }

  40% {
    transform: scale3d(.9, .9, .9);
  }

  60% {
    opacity: 1;
    transform: scale3d(1.03, 1.03, 1.03);
  }

  80% {
    transform: scale3d(.97, .97, .97);
  }

  to {
    opacity: 1;
    transform: scale3d(1, 1, 1);
  }
`;

export const fadeIn = keyframes`
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
`;

export const fadeOut = keyframes`
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
`;
