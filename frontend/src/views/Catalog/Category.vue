<template>
    <div class="contacts">
        <div v-bind:key="index" v-for="(product, index) in products">
            <b-card :title="product.name"
                    :sub-title="'Price: $' + product.price">
                <p class="card-text">
                    {{ product.previewText }}
                </p>
                <router-link :to="{ name: 'product', params: { slug: product.slug } }" class="card-link">Detail</router-link>
            </b-card>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        data() {
            return {
                products: []
            }
        },
        mounted() {
            getCategoryProducts(this);
        },
        beforeRouteUpdate (to, from, next) {
            next();
            getCategoryProducts(this);
        },
        name: 'category',
    }

    function getCategoryProducts(el) {
        axios
            .get(el.$route.fullPath)
            .then(response => {
                el.products = response.data;
            })
    }
</script>