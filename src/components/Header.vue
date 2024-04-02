<template>
    
        	<!-- Page Preloder -->
	<!-- <div id="preloder">
		<div class="loader"></div>
	</div> -->

	<!-- Header section -->
	<div class="main_header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
              <router-link to="" class="navbar-brand"><i class="fas fa-headphones-alt"></i></router-link>
              <router-link :to="{ name: 'home' }" class="navbar-brand"><img src="../assets/img/logo.png" alt=""></router-link>
              <!-- <a class="navbar-brand" href="#">
                <i class="fas fa-headphones-alt"></i>Music</a> -->
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <router-link :to="{ name: 'home' }" class="nav-link">Home</router-link>
                    <!-- <a class="nav-link active" aria-current="page" href="#">Home</a> -->
                  </li>
                  <li class="nav-item">
                    <router-link :to="{ name: 'about' }" class="nav-link">About</router-link>
                    <!-- <a class="nav-link" href="#">About</a> -->
                  </li>
                  <li class="nav-item">
                    <router-link :to="{ name: 'gallery' }" class="nav-link">Gallery</router-link>
                    <!-- <a class="nav-link" href="#">Gallery</a> -->
                  </li>
                  <li class="nav-item">
                    <router-link :to="{ name: 'contact' }" class="nav-link">Contact</router-link>
                    <!-- <a class="nav-link" href="#">Contact</a> -->
                  </li>
                </ul>
                <router-link :to="{ name: 'signin' }" class="my-btn" v-if="!isLoggedIn">Sign in</router-link>
                <router-link to="" class="my-btn" v-if="isLoggedIn" @click="logout">Sign out</router-link>
                <!-- <form class="d-flex">
                  <button class="my-btn" type="submit">
                     Sign in
                  </button>
                </form> -->
              </div>
            </div>
          </nav>
    </div>
	<!-- Header section end -->

    
</template>


<script>
import axios from "axios";
export default {
  data() {
    return {
      // You can initialize other data properties here if needed
    };
  },
  computed: {
    isLoggedIn() {
      // Retrieve the token from localStorage
      const token = localStorage.getItem('token');

      // Perform the conditional check based on the presence of the token
      return Boolean(token);
    },
  },
  methods: {
    logout(){
      // let token = localStorage.getItem('token')
      // axios.get('http://127.0.0.1:8000/api/logout').defaults.headers = {
      //   Authorization : "Bearer" + token,
      // }
      this.$router.push({ name: 'signin' })
        localStorage.removeItem('token')
    }
  },
};
</script>