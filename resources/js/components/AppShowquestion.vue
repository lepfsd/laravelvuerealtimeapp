<template>
    <v-card>
        <v-container fluid>
            <v-card-title>
                <div>
                    <div class="headline">
                        {{ data.title }}
                    </div>
                    <span class="grey--text"> {{data.user}} said {{data.created_at}} </span>
                </div>
                <v-spacer></v-spacer>
                <v-btn text small color="primary">{{data.reply_count}} replies</v-btn>
            </v-card-title>
            <v-card-text v-html="body" ></v-card-text>
            <v-card-actions v-if="own">
                <v-btn class="ma-2" color="primary" dark @click="edit">
                    edit
                </v-btn>
                <v-btn class="ma-2" color="red" dark @click="destroy">
                    delete
                </v-btn>
            </v-card-actions>
        </v-container>
    </v-card>
</template>

<script>

export default {
    props: ['data'],
    data() {
        return {
            own: User.own(this.data.user_id)
        }
    },
    computed: {
        
        body(){
            return this.data.body
        }
    },
    methods: {
        destroy() {
            axios.delete(`/api/question/${this.data.slug}`)
                .then(res => this.$router.push('/forum'))
                .catch(error => console.log(error))
        },
        edit() {
            EventBus.$emit('startEditing')
        }
    }
}
</script>