<template>
    <div class="content">
        <div class="md-layout">
            <div
                class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100"
            >
                <md-card>
                    <md-card-header data-background-color="green">
                        <h4 class="title">Quản lí nhân viên</h4>
<!--                        <p class="category">Here is a subtitle for this table</p>-->
<!--                        <md-button class="md-primary">-->
<!--                            <md-icon>add</md-icon>-->
<!--                            Thêm-->
<!--                        </md-button>-->
                        <div>
                            <md-dialog :md-active.sync="showDialog">
                                <md-dialog-title>Preferences</md-dialog-title>
                                <div class="md-layout-item">
                                    <md-field>
                                        <label>User Name</label>
                                        <md-input v-model="username" type="text"></md-input>
                                    </md-field>
                                </div>

                                <div class="md-layout-item">
                                    <md-field>
                                        <label>User Name</label>
                                        <md-input v-model="username" type="text"></md-input>
                                    </md-field>
                                </div>


                                <md-dialog-actions>
                                    <md-button class="md-primary" @click="showDialog = false">Close</md-button>
                                    <md-button class="md-primary" @click="showDialog = false">Save</md-button>
                                </md-dialog-actions>
                            </md-dialog>

<!--                            <md-button class="md-primary md-raised" @click="showDialog = true">Show Dialog</md-button>-->
                            <md-button class="md-primary" @click="showDialog = true">
                                <md-icon>add</md-icon>
                                Thêm
                            </md-button>
                        </div>
                    </md-card-header>
                    <md-card-content>
                        <users-table></users-table>
                    </md-card-content>
                </md-card>
            </div>
        </div>
    </div>
</template>

<script>
    import UsersTable from "../components/Tables/UsersTable";
    export default {
        name: "ManageUsers",
        components: {UsersTable},
        data:()=>({
            showDialog: false
        })
    }
</script>

<style scoped>

</style>
