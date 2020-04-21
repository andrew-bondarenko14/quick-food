<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <admin-sidebar :app="this"></admin-sidebar>
                <div class="col-md-9 col-sm-auto col-lg-10 px-4">
                    <span class="admin_title">Управление пользователями</span>
                    <div>
                        <router-link to="create-user"><button class="btn btn-info">Создать пользователя</button></router-link>
                    </div>
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Отчество</th>
                            <th>Логин</th>
                            <th>Email</th>
                            <th>Роль</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(user, index) in users" :key="user.id">
                            <th>{{ index+1 }}</th>
                            <th class="table_cell"><input type="text" v-model="user.name" @keyup.enter="checkUpdate(index)"></th>
                            <th class="table_cell"><input type="text" v-model="user.surname" @keyup.enter="checkUpdate(index)"></th>
                            <th class="table_cell"><input type="text" v-model="user.patronymic" @keyup.enter="checkUpdate(index)"></th>
                            <th class="table_cell"><input type="text" v-model="user.login" @keyup.enter="checkUpdate(index)"></th>
                            <th class="table_cell"><input type="email" v-model="user.email" @keyup.enter="checkUpdate(index)"></th>
                            <th class="table_cell">
                                <select v-model="user.role_id" @change="checkUpdate(index)">
                                    <option v-for="role in roles" v-bind:value="role.id">{{role.name}}</option>
                                </select>
                            </th>
                            <th><button class="btn btn-danger" @click="deleteUser(user.id, index)">del</button></th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import AdminSidebar from '../sidebars/AdminSidebar';
    export default {
        name: "EditUsers",
        components: {
            AdminSidebar
        },
        data() {
            return {
                users: [],
                currentUser: [],
                roles: [
                    {
                        id: 1,
                        name: 'Пользователь'
                    },
                    {
                        id: 2,
                        name: 'Модер'
                    },
                    {
                        id: 3,
                        name: 'Админ'
                    }
                ]
            }
        },
        mounted() {
            this.read();
        },
        methods: {
            read() {
                axios.get('/users')
                    .then(response => (this.users= response.data));
            },
            update() {
                axios.put('/update-user/', this.currentUser)
                    .then(function(response) {
                        console.log(response);
                    });
            },
            deleteUser(id, index) {
                axios.delete('/users/'+id)
                    .then(function(response) {
                        console.log(response);
                    });
                this.users.splice(index, 1)
                console.log(this.users[index])
            },
            checkUpdate(index) {
                this.currentUser = this.users[index];
                this.update();
            }
        }
    }
</script>

<style scoped>

</style>