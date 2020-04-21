<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <moder-sidebar :app="this"></moder-sidebar>
                <div class="col-md-9 col-sm-auto col-lg-10 px-4">
                    <span class="admin_title">Окно создания новой категории</span>
                    <div class="create_category">
                        <div>
                            <div>Введите название категории</div>
                            <input type="text" v-model="category.name">
                        </div>
                        <div>
                            <div>Добавьте изображение</div>
                            <input type="file" id="file" ref="file" v-on:change="handleFileUpload()">
                            <button class="btn btn-primary" v-on:click="submitFile(index)">Загрузить</button>
                        </div>
                        <button class="btn btn-light" @click="create()">Создать категорию</button>
                        <div v-show="createSuccess">
                            <button class="btn btn-success" disabled style="cursor: default;">Категория успешно создана</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ModerSidebar from '../sidebars/ModerSidebar';
    export default {
        name: "CreateCategory",
        components: {
            ModerSidebar
        },
        data() {
            return {
                category: {
                    name: '',
                    img: null,
                },
                createSuccess: false,
            }
        },
        methods: {
            create() {
                axios.post('/categories/create', this.category)
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