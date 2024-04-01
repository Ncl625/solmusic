<template>
    <div class="sign">

        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
    </div>
    <form @submit.prevent="signIn">
        <h3>Sign In Here</h3>
        
        <label for="email">Email</label>
        <input type="email" v-model="user.email" placeholder="Email or Phone" name="email" required>
        
        <label for="password">Password</label>
        <input type="password" v-model="user.password" placeholder="Password" name="password" required>
        
        <button @click="signIn()">Sign In</button>
        <div class="social">
            <!-- <div class="go"><i class="fab fa-google"></i>  Google</div>
            <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div> -->
        </div>
    </form>
</div>
    
</template>

<script>

import axios from 'axios'

export default {
    name:'signin',
    data() {
        return {
            user: {
                email:          '',
                password:       '',
            }
        }
    },
    methods: {
        signIn(){
            axios.post('http://127.0.0.1:8000/api/login', this.user)
            .then(res => {
                if (res.data.success) {
                    
                }
                localStorage.setItem('token',res.data.token)
                alert(res.data.message)

                this.$router.push({ name: 'home'})
            })
            .catch(function(error) {
                if(error.response){
                    console.log(error.response);
                }
            })
        }
    },
}
</script>