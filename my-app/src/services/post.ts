import axios, { AxiosResponse } from 'axios'
import type { Post } from '../models';

const instance = axios.create({
  baseURL: 'https://jsonplaceholder.typicode.com'
});

export const getPosts = async (): Promise<AxiosResponse<Post[], any>> => {
  return await instance.get(`/posts`);
}