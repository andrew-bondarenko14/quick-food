<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <moder-sidebar :app="this"></moder-sidebar>
                <div class="col-md-9 col-sm-auto col-lg-10 px-4">
                    <span class="admin_title">Управление продуктами</span>
                    <div>
                        <router-link to="create-product"><button class="btn btn-info">Создать продукт</button></router-link>
                    </div>
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Название продукта</th>
                            <th>Краткое описание</th>
                            <th>Полное описание</th>
                            <th>Цена</th>
                            <th>Вес</th>
                            <th>Изображение</th>
                            <th>Категория</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(product, index) in products" :key="product.id">
                            <th>{{ index+1 }}</th>
                            <th class="table_cell"><input type="text" v-model="product.name" @keyup.enter="checkUpdate(index)"></th>
                            <th class="table_cell"><textarea v-model="product.short_description" @keyup.enter="checkUpdate(index)"></textarea></th>
                            <th class="table_cell"><textarea v-model="product.full_description" @keyup.enter="checkUpdate(index)"></textarea></th>
                            <th class="table_cell"><input type="number" v-model="product.price" @keyup.enter="checkUpdate(index)"></th>
                            <th class="table_cell"><input type="number" v-model="product.weight" @keyup.enter="checkUpdate(index)"></th>
                            <th class="table_cell d-flex upload_image">
                                <img :src="'../images/categories/'+product.img" alt="" style="width: 100px;">
                                <!--<input type="file" id="file" ref="file" v-on:change="handleFileUpload()">
                                <button class="btn btn-primary" v-on:click="submitFile(index)">Загрузить</button>-->
                            </th>
                            <th class="table_cell">
                                <select v-model="product.category_id" @change="checkUpdate(index)">
                                    <option v-for="category in categories" v-bind:value="category.id">{{category.name}}</option>
                                </select>
                            </th>
                            <th><button class="btn btn-danger" @click="deleteProduct(product.id, index)">del</button></th>
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
        name: "EditProducts",
        components: {
            ModerSidebar
        },
        data() {
            return {
                products: [],
                currentProduct: [],
                categories: [],
                file: '',
            }
        },
        mounted() {
            this.read();
            this.getCategories();
        },
        methods: {
            read() {
                axios.get('/products')
                    .then(response => (this.products= response.data));
            },
            getCategories() {
                axios.get('/get-categories')
                    .then(response => (this.categories= response.data));
            },
            update() {
                axios.put('/update-product', this.currentProduct)
                    .then(function(response) {
                        console.log(response);
                    });
            },
            checkUpdate(index) {
                this.currentProduct = this.products[index];
                this.update();
            },
            deleteProduct(id, index) {
                axios.delete('/products/'+id)
                    .then(function(response) {
                        console.log(response);
                    });
                this.products.splice(index, 1);
            },
        }
    }
</script>

<style scoped>

</style>