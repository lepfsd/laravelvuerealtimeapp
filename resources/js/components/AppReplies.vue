<template>
    <v-container>
        <app-reply v-for="reply in replies" :data="reply" :key="reply.id" ></app-reply>
    </v-container>
</template>

<script>
import AppReply from './AppReply'
export default {
    components: {
        AppReply
    },
    props: ['replies']
}
</script>