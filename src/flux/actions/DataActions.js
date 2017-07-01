import axios from 'axios';
import { alt } from '../alt/alt';

class DataActions {
  constructor() {
    const appUrl = 'http://koorconnection.nl';
    this.pagesEndpoint = `${appUrl}/wp-json/wp/v2/pages`;
    this.postsEndpoint = `${appUrl}/wp-json/wp/v2/posts`;
    this.settingsEndpoint = `${appUrl}/wp-json/wp/v2/settings`;
  }

  api(endPoint) {
   return new Promise((resolve, reject) => {
    axios.get(endPoint).then((response) => {
      console.log('connected to the api', endPoint, response);
      resolve(response.data);
    }).catch((error) => {
      console.error('error connecting to the api', error);
      reject(error);
    });
  });
  }

  getPages(cb){
    this.api(this.pagesEndpoint).then(response => {
    this.getPosts(response, cb)
  });
  return true;
  }

  getPosts(pages, cb){
    this.api(this.postsEndpoint).then(response => {
      const posts = response;
      const payload = { pages, posts };

      this.getSuccess(payload); // Pass returned data to the store
      cb(payload); // This callback will be used for dynamic route building
    });
    return true;
  }

  getSettings(cb) {
    this.api(this.settingsEndpoint).then(response => {
      console.log('get settings', response);
      const payload = { settings };
      this.getSuccess(payload);
      cb(payload);
    });
    return true;
  }

  // This returnes an object with Pages and Posts data together
  // The Alt Store will listen for this method to fire and will store the returned data
  getSuccess(payload){
    return payload;
  }
}

export default alt.createActions(DataActions);
