<template>
    <div class="mt-3">
        <v-card>
            <v-card-title>
                <div class="headlin">{{data.user}} </div>    
                <div class="ml-2"> said {{data.created_at}} </div>
                <v-spacer></v-spacer>
                <app-like :content="data"></app-like>
            </v-card-title>    
            <v-divider></v-divider>
            <app-edit-reply v-if="editing" :reply=data></app-edit-reply>
            <v-card-text v-else v-html="data.reply"></v-card-text>
            <v-divider></v-divider>
            <div v-if="!editing">
                <v-card-actions>
                    <v-btn text small color="primary" @click="edit" >edit</v-btn>
                    <v-btn text small color="error" @click="destroy" >delete</v-btn>
                </v-card-actions>
            </div>
        </v-card>
    </div>
</template>

<script>
import AppEditReply from './AppEditReply'
import AppLike from './AppLike'
export default {
    components: {
        AppEditReply, AppLike
    },
    props: ['data', 'index'],
    data() {
        return {
            editing: false
        }
    },
    computed: {
        own() {
            User.own(this.data.user_id)
        }
    },
    created() {
        this.listen()
    },
    methods: {
        destroy() {
            EventBus.$emit('deleteReply', this.index)
        },
        edit() {
            this.editing = true
        },
        listen() {
            EventBus.$on('cancelEditing', () => {
                this.editing = false
            })
        }
    }
}
</script>