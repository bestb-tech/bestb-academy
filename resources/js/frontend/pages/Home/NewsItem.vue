<template>
    <div class="p-3 col-12 col-lg-3 new-item">
        <a v-bind:href="'/news/' + item.slug" class="text-decoration-none">
            <b-card
                v-bind:title="item.name"
                v-bind:img-src="item.path_thumbnail"
                img-alt="Image"
                img-top
                tag="article"
                class="mb-lg-2 h-100"
            >
                <b-card-text>
                    <p v-html="short_description">{{short_description}}</p>
                    <br>
                    <span class="text-grey">
                        {{item.diff_created_at}}<br>
                        By:Bestb Academy
                    </span>
                </b-card-text>

            </b-card>
        </a>
    </div>
</template>

<script>
    import { Slide } from 'vue-carousel';
    export default {
        name: "NewsItem",
        components: {Slide},
        props:['item'],
        computed:{
            short_description(){
                return this.$props.item.content.split(' ').slice(0,8).join(' ');
            }
        }
    }
</script>

<style scoped>

</style>
