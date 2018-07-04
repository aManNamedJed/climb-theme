<template>
  <div class="post-index-wrapper">
    <div id="post-index">
        <div v-for="post in posts" class="card mb-4" :key="post.id">
          <div class="card-header">
            <h2 class="my-0">
              <a :href="post.link">
                <img src="http://placehold.it/960x540" alt="" class="img-fluid height-100">
              </a>
            </h2>
          </div>
          <div class="card-body">
            <h3>{{ post.title.rendered }}</h3>
          </div>
          <div class="card-footer">
            <a :href="post.link" class="btn btn-secondary btn-lg btn-block">Read Post</a>
          </div>
        </div>
    </div>
    <div class="pagination">
      <div @click="fetchPosts(prevPage)" :disabled="false" class="btn btn-secondary mr-1">Previous Page</div>
      <div @click="fetchPosts(nextPage)" :disabled="this.currentPage == this.totalPages? true : false" class="btn btn-secondary">Next Page</div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'blog-index',
  mounted() {
    this.fetchPosts(1);
  },
  data () {
    return {
      posts: [],
      totalPages: 1,
      prevPage: 0,
      nextPage: 0,
      currentPage: ''
    }
  },
  methods: {
    fetchPosts(pageNumber) {
      this.currentPage = pageNumber;
      this.$http.get('/wp-json/wp/v2/posts?filter[posts_per_page]=12&page=' + pageNumber).then(response => {
        this.posts = response.body;
        this.makePagination(response);
        console.log(response);
      }, response => {
        // error callback
      });
    },
    makePagination(data) {
      this.totalPages = data.headers.map["x-wp-totalpages"];
      this.prevPage = this.currentPage - 1;
      this.nextPage = this.currentPage + 1;
      console.log({
        pagination: {
          prevPage: this.prevPage,
          nextPage: this.nextPage
        }
      });
    }
  }
}
</script>

<style>
  .post-index-wrapper {
    background-color: #eee;
    padding: 2rem;
  }
  #post-index {
    column-count: 1;
  }
  #post-index .card {
    display: inline-block;
    margin: 0 0 4rem;
    width: 100%;
    border-radius: 0;
  }
  #post-index .card-header {
    padding: 0;
    border-radius: 0;
  }
  #post-index .card-footer {
    padding: 0;
    border-radius: 0;
  }
  #post-index .card-body img {
    width: 100%;
    height: 100%;
  }
  @media screen and (min-width: 768px ) {
    #post-index {
      column-count: 2;
      column-gap: 2rem;
    }
  }
  @media screen and (min-width: 1200px ) {
    #post-index {
      column-count: 2;
      column-gap: 2rem;
    }
  }
</style>