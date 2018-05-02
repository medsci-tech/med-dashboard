import fetch from '../config/api'
// 这里统一配置
export const pcReg = (start, end) => fetch.post('http://statistics.local.com/api/statistics/mime/register?start_date=' + start + '&end_date=' + end);
export const pcBro = (start, end) => fetch.post('http://statistics.local.com/api/statistics/mime/dau?start_date='+ start + '&end_date=' + end);
export const wcReg = (start, end) => fetch.post('http://statistics.local.com/api/statistics/mime/wechat-register?start_date='+ start + '&end_date='+ end);
export const wcBro = (start, end) => fetch.post('http://statistics.local.com/api/statistics/mime/wechat-dau?start_date='+ start + '&end_date='+ end);
export const userAuth = (start, end) => fetch.post('http://statistics.local.com/api/statistics/mime/profile?start_date='+ start + '&end_date='+ end )