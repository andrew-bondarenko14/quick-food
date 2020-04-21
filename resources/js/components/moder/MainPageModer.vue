<template>
    <div>
        <div class="container-fluid">
            <div class="row">
                <moder-sidebar :app="this"></moder-sidebar>
                <div class="col-md-9 col-sm-auto col-lg-10 px-4">
                    <span class="admin_title">Модер панель</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ModerSidebar from '../sidebars/ModerSidebar';
    export default {
        name: "MainPageModer",
        components: {
            ModerSidebar
        }
    }
</script>

<style scoped>

</style>