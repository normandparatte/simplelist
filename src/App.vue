<template>
  <div id="app">
    <MenuPrincipal></MenuPrincipal>
    <router-view></router-view>
  </div>
</template>

<script>
import MenuPrincipal from '@/components/MenuPrincipal.vue';
export default {
  name: 'app',
  components: {
    MenuPrincipal
  }
};
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
