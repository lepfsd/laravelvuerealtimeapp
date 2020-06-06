<template>
    <div class="mt-3">
        <v-card>
            <v-card-title>
                <div class="headlin">{{data.user}} </div>    
                <div class="ml-2"> said {{data.created_at}} </div>
            </v-card-title>    
            <v-divider></v-divider>
            <v-card-text v-html="data.reply"></v-card-text>
            <v-card-actions v-if="own" >
                <v-btn text small color="primary"  >edit</v-btn>
                <v-btn text small color="error" @click="destroy" >delete</v-btn>
            </v-card-actions>
        </v-card>
    </div>
</template>

<script>
export default {
    props: ['data', 'index'],
    computed: {
        own() {
            User.own(this.data.user_id)
        }
    },
    methods: {
        destroy() {
            EventBus.$emit('deleteReply', this.index)
        }
    }
}
</script>