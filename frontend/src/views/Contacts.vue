<template>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Contacts
                </div>
                <div class="card-body">
                    <b-alert variant="danger" v-if="error" show>{{ error }}</b-alert>

                    <b-form @submit="contacts">
                        <b-form-group label="Name" label-for="name">
                            <b-form-input id="name" name="name" type="text" v-model="form.name" required></b-form-input>
                        </b-form-group>
                        <b-form-group label="Email address" label-for="email">
                            <b-form-input id="email" name="email" type="email" v-model="form.email" required></b-form-input>
                        </b-form-group>
                        <b-form-group label="Subject" label-for="subject">
                            <b-form-input id="subject" name="subject" type="text" v-model="form.subject" required></b-form-input>
                        </b-form-group>
                        <b-form-group label="Body" label-for="body">
                            <b-form-textarea id="body"
                                             name="body"
                                             v-model="form.body"
                                             placeholder="Enter something"
                                             :rows="3"
                                             :max-rows="6"></b-form-textarea>
                        </b-form-group>
                        <b-button type="submit" variant="primary">Submit</b-button>
                    </b-form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";
    export default {
        name: 'contacts',
        data() {
            return {
                form: {
                    name: null,
                    email: null,
                    subject: null,
                    body: null,
                },
                error: null
            }
        },
        methods: {
            contacts(event) {
                event.preventDefault();
                let url = this.$route.fullPath;
                let req = {
                    url,
                    method: 'PUT',
                    data: this.form
                };
                axios(req)
                    .then(response => {
                        if (response.data.error) {
                            this.form.name = response.data.form.name;
                            this.form.email = response.data.form.email;
                            this.form.subject = response.data.form.subject;
                            this.form.body = response.data.form.body;
                            this.error = response.data.myError;
                        } else {
                            this.$router.push('/thank')
                        }
                    });
            }
        }
    }
</script>