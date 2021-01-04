<template>
    <div class="content">
        <div class="md-layout">
            <div
                class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100"
            >
                <md-card>
                    <md-card-header data-background-color="green">
                        <h4 class="title">Quản lí giảng viên</h4>
                        <div>
                            <form-teacher :model="{}" :action="'ADD'"></form-teacher>
                        </div>
                    </md-card-header>
                    <md-card-content>
                        <teachers-table></teachers-table>
                    </md-card-content>
                </md-card>
            </div>
        </div>
    </div>
</template>

<script>
    import TeachersTable from "../components/Tables/TeachersTable";
    import formTeacher from '../components/Dialog/FormTeacher';
    export default {
        name: "Teachers",
        components: {TeachersTable,formTeacher},
        data:()=>({
            showDialog: false,
        }),
    }
</script>

<style scoped>

</style>
