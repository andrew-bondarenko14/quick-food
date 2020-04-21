<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <admin-sidebar :app="this"></admin-sidebar>
                <div class="col-md-9 col-sm-auto col-lg-10 px-4">
                    <span class="admin_title">Окно создания нового пользователя</span>
                    <div class="create_user">
                        <div>
                            <div>Введите имя</div>
                            <input type="text" v-model="user.name">
                        </div>
                        <div>
                            <div>Введите фамилию</div>
                            <input type="text" v-model="user.surname">
                        </div>
                        <div>
                            <div>Введите отчество</div>
                            <input type="text" v-model="user.patronymic">
                        </div>
                        <div>
                            <div>Введите логин</div>
                            <input type="text" v-model="user.login">
                        </div>
                        <div>
                            <div>Введите email</div>
                            <input type="email" v-model="user.email">
                        </div>
                        <div>
                            <div>Введите пароль</div>
                            <input type="password" v-model="user.password">
                        </div>
                        <div>
                            <div>Повторите пароль</div>
                            <input type="password">
                        </div>
                        <div>
                            <div>Укажите роль</div>
                            <select v-model="user.role_id" @change="">
                                <option v-for="role in roles" v-bind:value="role.id">{{role.name}}</option>
                            </select>
                        </div>
                        <button class="btn btn-light" @click="create()">Создать пользователя</button>
                        <div v-show="createSuccess">
                            <button class="btn btn-success" disabled style="cursor: default;">Пользователь успешно создан</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import AdminSidebar from '../sidebars/AdminSidebar';
    export default {
        name: "CreateUser",
        components: {
            AdminSidebar
        },
        data() {
            return {
                user: {},
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
                ],
                createSuccess: false,
            }
        },
        methods: {
            create() {
                axios.post('/users/create', this.user)
                    .then(function(response) {
                        console.log(response);
                    });
                this.createSuccess = true;
            }
        }
    }
</script>

<style scoped>

</style>