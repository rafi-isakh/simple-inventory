<template>
  <div>
    <div class="container">
      <h2>Users</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Users
            <router-link to="/add" class="btn btn-info pull-right" style="margin-top:-7px;margin-left:2px;">Add User</router-link>
        </div>
        <div class="panel-body">
          <table class="table">
            <thead>
              <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Role</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in users" :key="user.id">
                <td>{{ user.username }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.role }}</td>
                <td>
                  <div class="btn-group" role="group">
                    <router-link
                      :to="{ name: 'edit', params: { id: user.id } }"
                      class="btn btn-success"
                      >Edit</router-link
                    >
                    <button
                      class="btn btn-danger"
                      @click="deleteUser(user.id)"
                    >
                      Delete
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      users: [],
    };
  },
  created() {
    this.axios.get("http://localhost:8000/api/users").then((response) => {
      this.users = response.data;
    });
  },
  methods: {
    deleteUser(id) {
      this.axios
        .delete(`http://localhost:8000/api/users/${id}`)
        .then((response) => {
          let i = this.users.map((data) => data.id).indexOf(id);
          this.users.splice(i, 1);
        });
    },
  },
};
</script>
                