import Users from './components/Users.vue';
import AddUser from './components/AddUser.vue';
import UpdateUser from './components/UpdateUser.vue';

export const routes = [{
    name: 'home',
    path: '/',
    component: Users
  },
  {
    name: 'add',
    path: '/add',
    component: AddUser
  },
  {
    name: 'edit',
    path: '/edit/:id',
    component: UpdateUser
  }
];