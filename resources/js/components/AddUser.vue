<template>
  <div>
    <div class="container">
      <h2>Add User</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Add User
            <router-link to="/" class="btn btn-info pull-right" style="margin-top:-7px;margin-left:2px;">User List</router-link>
        </div>
        <div class="panel-body">
          <form @submit.prevent="addUser">
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" v-model="user.username" />
            </div>
            <div class="form-group">
              <label>Password</label>
              <input
                type="password"
                class="form-control"
                v-model="user.password"
              />
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
  methods: {
    addUser() {
      this.axios
        .post("http://localhost:8000/api/users", this.user)
        .then((response) => this.$router.push({ name: "home" }))
        .catch((err) => console.log(err))
        .finally(() => (this.loading = false));
    },
  },
};
</script>
