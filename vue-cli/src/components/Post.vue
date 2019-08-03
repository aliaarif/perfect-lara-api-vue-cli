<template>
  <div>
    <form class="post" @submit.prevent="post">
      <button type="submit">Post</button>
    </form>
    <div>{{ data }}</div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      data: ""
    };
  },
  methods: {
    post: function() {
      this.$store.dispatch("post").then(res => {
        console.info(res.data);
        this.data = res.data;
        //this.$router.push("/login");
      });
    }
  },

  created() {
    //console.log(localStorage.getItem("token"));
  }
};
</script>