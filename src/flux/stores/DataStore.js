import { alt } from '../alt/alt';
import DataActions from '../actions/DataActions';

class DataStore {
  constructor() {
    this.data = {};
    this.bindListeners({
      handleSuccess: DataActions.GET_SUCCESS,
    });
    this.exportPublicMethods({
      getAll: this.getAll,
      getPages: this.getPages,
      getPosts: this.getPosts,
      getSettings: this.getSettings,
      getPageBySlug: this.getPageBySlug,
    });
  }

  handleSuccess(data) {
    this.setState({ data });
  }

  getAll() {
    return this.getState().data;
  }

  getPages() {
    return this.getState().data.pages;
  }

  getPosts() {
    return this.getState().data.posts;
  }

  getSettings() {
    return this.getState().data.settings;
  }

  getPageBySlug(slug) {
    const pages = this.getState().data.pages;
    return pages[Object.keys(pages).find(page => console.log('get page by slug', pages[page].slug, slug) || pages[page].slug === slug)] || {};
  }
}

export default alt.createStore(DataStore, 'DataStore');
