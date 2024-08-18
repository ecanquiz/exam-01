//import { boot } from 'quasar/wrappers';
import { ref } from 'vue'
import { defineStore } from 'pinia';
import { getPosts } from '../services/post'
import type { Post } from '../models';

export const usePostStore = defineStore('post', {
  state: () => ({
    pending: false,
    posts: [] as Post[]
  }),

  getters: {
    customPosts(state) {
      return state.posts.map(
        (post: Post) => ({
          ...post,
          title: post.title.substring(0,7),
          body: post.body.substring(0,21)
        })
      );
    }
  },

  actions: {
    searchPosts() {      
      this.pending = true
      getPosts()
        .then(response => {
          this.posts = response.data as Post[]
        })
        .catch(
          error => console.log({
            errorCode: error.code, errorMessage: error.message
          })
        )
        .finally(() => this.pending = false)
    }
  }
});
