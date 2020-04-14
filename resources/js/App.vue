<template>
  <div class="main">
    <loading v-if="$root.loading"></loading>
    <div class="container-fluid">
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link to="/" class="nav-link">Strona główna</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/test" class="nav-link">Test</router-link>
          </li>
        </ul>
      </nav>
      <br />
      <transition name="fade">
        <router-view></router-view>
      </transition>
    </div>
  </div>
</template>
<style>
    /* .fade-enter-active, .fade-leave-active {
      transition: opacity 0.5s
    }
    .fade-enter, .fade-leave-active {
      opacity: 0
    } */
</style>
<script>
    export default{
    }
</script>