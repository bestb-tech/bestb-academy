<template>
    <div class="content">
        <div class="md-layout">
            <div
                class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100"
            >
                <md-card>
                    <md-card-header data-background-color="green">
                        <h4 class="title">Quản lí tin tức</h4>
                        <div>
                            <form-news :model="{}" :action="'ADD'"></form-news>
                        </div>
                    </md-card-header>
                    <md-card-content>
                        <news-table></news-table>
                    </md-card-content>
                </md-card>
            </div>
        </div>
    </div>
</template>

<script>
    import formNews from '../../backend/components/Dialog/FormNews';
    import newsTable from '../../backend/components/Tables/NewsTable';
    export default {
        name: "News",
        components:{formNews,newsTable},


    }
</script>

<style scoped>

</style>
