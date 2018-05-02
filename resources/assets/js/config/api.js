'use strict';
import axios from 'axios';
import {baseUrl} from './env';
let loadinginstace;
axios.interceptors.request.use(config => {
  // loading
  if (sessionStorage.token) {  // 判断是否存在token，如果存在的话，则每个http header都加上token
    config.headers.token  = JSON.parse(sessionStorage.token);
    config.headers.user_id  = JSON.parse(sessionStorage.sysUser).userId
  }
  return config;
}, error => {
  return Promise.reject(error);
});

axios.interceptors.response.use(response => {
  return response;
}, error => {
  // if (error.response) {
  //   switch (error.response.status) {
  //     case 401:
  //       store.commit('loginOut')
  //       router.replace({
  //         path: 'login',
  //         query: {redirect: router.currentRoute.fullPath}
  //       })
  //   }
  // }
  return Promise.resolve(error.response);
});

function checkStatus (response) {
  // loading
  // 如果http状态码正常，则直接返回数据
  if (response && (response.status === 200 || response.status === 304 || response.status === 400)) {
    return response.data;
  }
  // 异常状态下，把错误信息返回去
  return {
    status: -404,
    msg: '网络异常'
  };
}

function checkCode (res) {
  // 如果code异常(这里已经包括网络错误，服务器错误，后端抛出的错误)，可以弹出一个错误提示，告诉用户
  if (res.status === -404) {
    console.log(res.msg);
  }
  if (res.data && (!res.success)) {
    console.log(res.msg);
//  alert(res.data.error_msg)
  }
  return res;
}

export default {
  post (url, data, urlData) {
    return axios({
      method: 'POST',
      // eslint-disable-next-line
      baseURL: urlData ? urlData : baseUrl,
      url,
      data: data,
      timeout: 20000,
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Content-Type': 'application/json;charset=UTF-8'
      }
    }).then(
      (response) => {
        return checkStatus(response);
      }
    ).then(
      (res) => {
        return checkCode(res);
      }
    );
  },
  put (url, data) {
    return axios({
      method: 'PUT',
      baseURL: baseUrl,
      url,
      data: data,
      timeout: 10000,
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Content-Type': 'application/json;charset=UTF-8'
      }
    }).then(
      (response) => {
        return checkStatus(response);
      }
    ).then(
      (res) => {
        return checkCode(res);
      }
    );
  },
  get (url, params, urlData) {
    return axios({
      method: 'GET',
      baseURL: urlData || baseUrl,
      url,
      params, // get 请求时带的参数
      timeout: 10000,
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
    }).then(
      (response) => {
        return checkStatus(response);
      }
    ).then(
      (res) => {
        return checkCode(res);
      }
    );
  },
  delete (url, params) {
    return axios({
      method: 'DELETE',
      baseURL: baseUrl,
      url,
      params, // get 请求时带的参数
      timeout: 10000,
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Content-Type': 'application/json;charset=UTF-8'
      }
    }).then(
      (response) => {
        return checkStatus(response);
      }
    ).then(
      (res) => {
        return checkCode(res);
      }
    );
  }
};
