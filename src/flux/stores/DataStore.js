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

  getPageBySlug(slug) {
    const pages = this.getState().data.pages;
    return pages[Object.keys(pages).find(page => pages[page].slug === slug)] || {};
  }
}

export default alt.createStore(DataStore, 'DataStore');
