<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <moder-sidebar :app="this"></moder-sidebar>
                <div class="col-md-9 col-sm-auto col-lg-10 px-4">
                    <span class="admin_title">Управление категориями</span>
                    <div>
                        <router-link to="create-category"><button class="btn btn-info">Создать категорию</button></router-link>
                    </div>
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Название категории</th>
                            <th>Изображение</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(category, index) in categories" :key="category.id">
                            <th>{{ index+1 }}</th>
                            <th class="table_cell"><input type="text" v-model="category.name" @keyup.enter="checkUpdate(index)"></th>
                            <th class="table_cell d-flex upload_image">
                                <img :src="'../images/categories/'+category.img" alt="" style="width: 150px;">
                                <!--<input type="file" id="file" ref="file" v-on:change="handleFileUpload()">
                                <button class="btn btn-primary" v-on:click="submitFile(index)">Загрузить</button>-->
                            </th>
                            <th><button class="btn btn-danger" @click="deleteCategory(category.id, index)">del</button></th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ModerSidebar from '../sidebars/ModerSidebar';
    export default {
        name: "EditCategories",
        components: {
            ModerSidebar
        },
        data() {
            return {
                categories: [],
                currentCategory: [],
                file: '',
            }
        },
        mounted() {
            this.read();
        },
        methods: {
            read() {
                axios.get('/get-categories')
                    .then(response => (this.categories= response.data));
            },
            update() {
                axios.put('/update-category', this.currentCategory)
                    .then(function(response) {
                        console.log(response);
                    });
            },
            checkUpdate(index) {
                this.currentCategory = this.categories[index];
                this.update();
                console.log(this.currentCategory);
            },/*
            submitFile(index){
                let formData = new FormData();
                formData.append('file', this.file);
                axios.post( '/update-image',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function(){
                    console.log('SUCCESS!!');
                    console.log(this.$refs.file);
                })
                    .catch(function(){
                        console.log('FAILURE!!');
                        console.log(refs);
                    });
            },
            handleFileUpload(){
                this.file = this.$refs.file.files;
            }*/
            deleteCategory(id, index) {
                axios.delete('/categories/'+id)
                    .then(function(response) {
                        console.log(response);
                    });
                this.categories.splice(index, 1);
            },
        }
    }
</script>

<style scoped>

</style>