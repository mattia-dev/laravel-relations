<template>
<div>
    <div>
        <div class="form-group">
            <textarea class="form-control" v-model="commentBody" @keyup.enter="sendComment" cols="30" rows="5" placeholder="Write a comment with Vue..."></textarea>
        </div>
        
        <div class="clearfix">
            <button @click="sendComment"  class="btn btn-secondary float-right" type="submit">Commenta</button>
        </div>
    </div>
    
    <h4>Vue comments</h4>

    <div v-for="comment in comments" :key="comment.id" class="comment">
        <p>{{ comment.body }}</p>
    </div>
</div>


</template>

<script>
export default {
  data() {
    return {
      comments: [],
      articleID: window.location.pathname.replace("/articles/", ""),
      commentBody: '',
    };
  },
  created() {
    this.getComments();
  },
  methods: {
    getComments() {
      axios.get(`/api/comments?article_id=${this.articleID}}`).then((res) => {
        this.comments = res.data;
      });
    },
    sendComment() {
      axios.post('/api/comments', {
        text: this.commentBody,
        article_id: this.articleID
      }).then((res)=>  {
        this.comments = res.data.data;
      });
      this.commentBody = '';
    }
  },
};
</script>