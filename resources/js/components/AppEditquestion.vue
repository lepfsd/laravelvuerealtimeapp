<template>
    <v-container fluid>
        <v-form @submit.prevent="update">
            <v-row>
                <v-col md="6">
                    <v-text-field
                        v-model="form.title"
                        label="Title"
                        required
                        type="text"
                    ></v-text-field>
                </v-col> 
            </v-row>
            <v-row>
                <v-col md="12">
                    <vue-simplemde v-model="form.body" ref="markdownEditor" />
                </v-col>
            </v-row>
            <v-row>
                <v-card-actions>
                    <v-btn class="ma-2" color="primary" type="submit" >
                        save
                    </v-btn>
                    <v-btn class="ma-2" color="red" dark @click="cancel">
                        cancel
                    </v-btn>
                </v-card-actions>

            </v-row>
        </v-form>
    </v-container>
</template>

<script>

import VueSimplemde from 'vue-simplemde'

export default {
    props: ['data'],
    components: {
      VueSimplemde
    },
    data() {
        return {
            form: {
                title : null,
                body : null
            }
        }
    },
    methods: {
        cancel() {
            EventBus.$emit('cancelEditing')
        },
        update() {
            axios.patch(`/api/question/${this.form.slug}`, this.form)
                .then(res => this.cancel())
                .catch(error => console.log(error.response.data))
        }  
    },
    created() {
        this.form = this.data
    }
}
</script>