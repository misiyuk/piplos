<template>
    <b-navbar toggleable="md" type="dark" variant="info">

        <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>

        <b-navbar-brand :to="{ name: 'home' }">Logo</b-navbar-brand>

        <b-collapse is-nav id="nav_collapse">

            <b-navbar-nav>
                <b-nav-item :to="{ name: 'home' }" exact>Home</b-nav-item>
                <b-nav-item-dropdown text="Categories">
                    <b-dropdown-item v-bind:key="category.slug" v-for="category in categories" :to="{ name: 'category', params: { slug: category.slug } }">{{ category.name }}</b-dropdown-item>
                </b-nav-item-dropdown>
                <b-nav-item :to="{ name: 'contacts' }">Contacts</b-nav-item>
            </b-navbar-nav>

        </b-collapse>
    </b-navbar>

    <!-- navbar-1.vue -->
</template>

<script>

    import axios from "axios";

    export default {
        data() {
            return {
                categories: []
            }
        },
        mounted() {
            axios
                .get('/categories')
                .then(response => {
                    this.categories = response.data;
                })
        },
        name: 'Nav'
    }
</script>