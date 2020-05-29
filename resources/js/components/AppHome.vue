<template>
    <div>
        <app-toolbar></app-toolbar>
        <router-view></router-view>
        <app-footer></app-footer>
    </div>
</template>

<script>

import AppToolbar from './AppToolbar'
import AppLogin from './AppLogin'
import AppFooter from './AppFooter'

export default {
    components: { 
        AppToolbar,
        AppFooter,
        AppLogin
  }
}
</script>

<style>

</style>