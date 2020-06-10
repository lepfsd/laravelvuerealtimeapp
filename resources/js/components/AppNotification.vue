<template>
<div class="text-center">
    <v-menu offset-y>
      <template v-slot:activator="{ on, attrs }">
        <v-btn class="ma-2" text icon color="red lighten-2" v-bind="attrs" v-on="on">
                <v-icon >{{ icons.mdiBellOutline }}</v-icon> {{unreadCount}}
            </v-btn>
      </template>
      <v-list>
        <v-list-tile v-for="item in unread" :key="item.id">
            <router-link :to="item.data.path">
                 <v-list-tile-title @click="readIt(item.data)">{{ item.data.question }}</v-list-tile-title>
            </router-link>
        </v-list-tile>
        <v-divider></v-divider>
        <v-list-tile v-for="item in read" :key="item.id">
            <router-link :to="item.data.path">
                 <v-list-tile-title>{{ item.data.question }}</v-list-tile-title>
            </router-link>
        </v-list-tile>
      </v-list>
    </v-menu>
  </div>
    
</template>

<script>

import { mdiBellOutline } from '@mdi/js';

export default {
    data: () => ({
      icons: {
        mdiBellOutline,
      },
      items: [
        { title: 'Click Me' },
        { title: 'Click Me' },
        { title: 'Click Me' },
        { title: 'Click Me 2' },
      ],
      read: {},
      unread: {},
      unreadCount: 0
    }),
    created() {
        if(User.loggedIn()){
            this.getNotifications()
        }
    },
    methods: {
        getNotifications() {
            axios.post('/api/notifications')
                .then( res => {
                    this.read = res.data.read
                    this.unread = res.data.unread
                    this.unreadCount = res.data.unread.length
                })
        },
        readIt(notification) {
            axios.post('/api/markAsRead', {id: notification.id})
                .then( res => {
                    this.unread.splice(notification,1)
                    this.read.push(notification)
                    this.unreadCount--
                })
        }
    }
  }
</script>

<style>

</style>