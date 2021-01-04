<template>
    <div>
        <md-table v-model="users_admin" :table-header-color="tableHeaderColor">
            <md-table-row slot="md-table-row" slot-scope="{ item }"  md-selectable="multiple" md-auto-select >
                <md-table-cell md-label="Tên">{{ item.name }}</md-table-cell>
                <md-table-cell md-label="Email">{{ item.email }}</md-table-cell>
                <md-table-cell md-label="Chức vụ">{{ item.role_name }}</md-table-cell>
                <md-table-cell md-label="Ngày tạo">{{ item.created_at }}</md-table-cell>
            </md-table-row>
        </md-table>
    </div>
</template>

<script>
    import {mapGetters} from "vuex";

    export default {
        name: "users-table",
        props: {
            tableHeaderColor: {
                type: String,
                default: ""
                },
        },
        mounted() {
            this.$store.dispatch('fetchUserAdmin')
        },
        computed: {
            ...mapGetters([
                'users_admin'
            ])
        },
        data() {
            return {
                selected: [],
                // users: [
                //     {
                //         name: "Dakota Rice",
                //         salary: "$36,738",
                //         country: "Niger",
                //         city: "Oud-Turnhout"
                //     },
                //     {
                //         name: "Minerva Hooper",
                //         salary: "$23,738",
                //         country: "Curaçao",
                //         city: "Sinaai-Waas"
                //     },
                //     {
                //         name: "Sage Rodriguez",
                //         salary: "$56,142",
                //         country: "Netherlands",
                //         city: "Overland Park"
                //     },
                //     {
                //         name: "Philip Chaney",
                //         salary: "$38,735",
                //         country: "Korea, South",
                //         city: "Gloucester"
                //     },
                //     {
                //         name: "Doris Greene",
                //         salary: "$63,542",
                //         country: "Malawi",
                //         city: "Feldkirchen in Kārnten"
                //     },
                //     {
                //         name: "Mason Porter",
                //         salary: "$78,615",
                //         country: "Chile",
                //         city: "Gloucester"
                //     }
                // ]
            };
        }
    };
</script>

<style scoped>

</style>
