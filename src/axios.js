// src/axios.js
import axios from 'axios';

const instance = axios.create({
  baseURL: process.env.VUE_APP_API_URL || 'http://127.0.0.1:8000/api',
  timeout: 1000,
});

export default instance;
