<template>
  <div>
    <div class="container">
      <h2>Update User</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Update User
            <router-link to="/" class="btn btn-info pull-right" style="margin-top:-7px;margin-left:2px;">User List</router-link>
        </div>
        <div class="panel-body">
          <form @submit.prevent="updateUser">
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" v-model="user.username" />
            </div>
            <div class="form-group">
              <label>Name</label>
              <input
                type="text"
                class="form-control"
                v-model="user.name"
              />
            </div>
            <div class="form-group">
              <label>Role</label>
              <select class="form-control" v-model="user.role">
                <option value="">Select role</option>
                <option value="1">Admin</option>
                <option value="2">User</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      user: {},
    };
  },
  created() {
    this.axios
      .get(`http://localhost:8000/api/users/${this.$route.params.id}`)
      .then((res) => {
        this.user = res.data;
      });
  },
  methods: {
    updateUser() {
      this.axios
        .patch(
          `http://localhost:8000/api/users/${this.$route.params.id}`,
          this.user
        )
        .then((res) => {
          this.$router.push({ name: "home" });
        });
    },
  },
};
</script>
           