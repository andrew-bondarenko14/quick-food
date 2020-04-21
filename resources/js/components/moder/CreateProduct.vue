<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <moder-sidebar :app="this"></moder-sidebar>
                <div class="col-md-9 col-sm-auto col-lg-10 px-4">
                    <span class="admin_title">Окно создания нового продукта</span>
                    <div class="create_category">
                        <div>
                            <div>Введите название продукта</div>
                            <input type="text" v-model="product.name">
                        </div>
                        <div>
                            <div>Введите краткое описание</div>
                            <textarea cols="30" rows="10" v-model="product.short_description"></textarea>
                        </div>
                        <div>
                            <div>Введите полное описание</div>
                            <textarea cols="30" rows="10" v-model="product.full_description"></textarea>
                        </div>
                        <div>
                            <div>Введите цену</div>
                            <input type="number" v-model="product.price">
                        </div>
                        <div>
                            <div>Введите вес</div>
                            <input type="number" v-model="product.weight">
                        </div>
                        <div>
                            <div>Укажите категорию</div>
                            <select v-model="product.category_id" @change="">
                                <option v-for="category in categories" v-bind:value="category.id">{{category.name}}</option>
                            </select>
                        </div>
                        <div>
                            <div>Добавьте изображение</div>
                            <input type="file" id="file" ref="file" v-on:change="handleFileUpload()">
                            <button class="btn btn-primary" v-on:click="submitFile(index)">Загрузить</button>
                        </div>
                        <button class="btn btn-light" @click="create()">Создать продукт</button>
                        <div v-show="createSuccess">
                            <button class="btn btn-success" disabled style="cursor: default;">Продукт успешно создан</button>
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
        name: "CreateProduct",
        components: {
            ModerSidebar
        },
        data() {
            return {
                product: {},
                categories: [],
                createSuccess: false,
            }
        },
        mounted() {
            this.getCategories();
        },
        methods: {
            create() {
                axios.post('/products/create', this.product)
                    .then(function(response) {
                        console.log(response);
                    });
                this.createSuccess = true;
            },

            getCategories() {
                axios.get('/get-categories')
                    .then(response => (this.categories= response.data));
            },
        }
    }
</script>

<style scoped>

</style>