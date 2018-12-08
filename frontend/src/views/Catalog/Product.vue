<template>
    <div class="contacts">
        <b-jumbotron bg-variant="info" text-variant="white" border-variant="dark">
            <template slot="header">
                {{ product.name }}
            </template>
            <template slot="lead">
                Price: ${{ product.price }}
            </template>
            <hr class="my-4">
            {{ product.detailText }}
        </b-jumbotron>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        data() {
            return {
                product: null
            }
        },
        mounted() {
            axios
                .get(this.$route.fullPath)
                .then(response => {
                    this.product = response.data;
                })
        },
        name: 'product',
    }
</script>