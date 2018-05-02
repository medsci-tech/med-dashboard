/**
 * 存储sessionStorage
 */
export const setSessionStorage = (name, content) => {
  if (!name) return;
  if (typeof content !== 'string') {
    content = JSON.stringify(content);
  }
  window.sessionStorage.setItem(name, content);
};

/**
 * 获取sessionStorage
 */
export const getSessionStorage = name => {
  if (!name) return;
  return JSON.parse(window.sessionStorage.getItem(name));
};

/**
 * 删除sessionStorage
 */
export const removeSessionStorage = name => {
  if (!name) return;
  window.sessionStorage.removeItem(name);
};

/**
 * 存储localStorage
 */
export const setLocalStorage = (name, content) => {
  if (!name) return;
  var curTime = new Date().getTime();
  content = JSON.stringify({data: content, time: curTime});
  window.localStorage.setItem(name, content);
};

/**
 * 获取localStorage
 */
export const getLocalStorage = name => {
  if (!name) return;
  // var dataObjData = 1000
  // 过期时间为1周
  let dataObjData = 1000 * 60 * 60 * 24 * 7;
  let data = localStorage.getItem(name);
  let dataObj = JSON.parse(data);
  if (dataObj === null) {
    return;
  }
  if (new Date().getTime() - dataObj.time > dataObjData) {
    window.localStorage.removeItem(name);
  } else {
    return dataObj.data;
  }
  // return JSON.parse(window.localStorage.getItem(name))
};

/**
 * 删除localStorage
 */
export const removeLocalStorage = name => {
  if (!name) return;
  window.localStorage.removeItem(name);
};

// 获取非行间样式
export const getStyle = (obj, attr) => {
  if (obj.currentStyle) {
    return obj.currentStyle[attr];
  } else {
    return window.getComputedStyle(obj, false)[attr];
  }
};

/**
 *去最大公约数
 */
export const gcd = (a, b) => {
  if (b === 0) {
    return a;
  }
  let r = parseInt(a % b);
  return gcd(b, r);
};
/**
 * 日期格式化
 */
export function formatDate (date, fmt) {
  if (/(y+)/.test(fmt)) {
    fmt = fmt.replace(RegExp.$1, (date.getFullYear() + '').substr(4 - RegExp.$1.length));
  }
  let o = {
    'M+': date.getMonth() + 1,
    'd+': date.getDate(),
    'h+': date.getHours(),
    'm+': date.getMinutes(),
    's+': date.getSeconds()
  };
  for (let k in o) {
    if (new RegExp(`(${k})`).test(fmt)) {
      let str = o[k] + '';
      fmt = fmt.replace(RegExp.$1, (RegExp.$1.length === 1) ? str : padLeftZero(str));
    }
  }
  return fmt;
}
function padLeftZero (str) {
  return ('00' + str).substr(str.length);
};
/**
 * 导出excel
 * **/
export const download = (url) => {
  let a = document.createElement('a');
  a.href = url;
  a.id = 'downLoad';
  a.download = 'download';
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(document.getElementById('downLoad'));
};
