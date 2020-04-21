<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <admin-sidebar :app="this"></admin-sidebar>
                <div class="col-md-9 col-sm-auto col-lg-10 px-4">
                    <span class="admin_title">Админ панель</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import AdminSidebar from '../sidebars/AdminSidebar';
    export default {
        name: "MainPageAdmin",
        components: {
            AdminSidebar
        }
    }

</script>

<style scoped>

</style>