<template>
  <div>

    <button v-if="logged_out" @click="triggerLogin">login with google</button>
    <button v-else @click="logout">logout</button>
  </div>
</template>

<script>
export default {
    mounted () {
        window.addEventListener('message', this.onMessage, false)
    },

    beforeDestroy () {
        window.removeEventListener('message', this.onMessage)
    },
  data() {
      return {
         logged_out : true,
          token: '',
          user: {}
      }
  },
    methods: {
        triggerLogin(){
           // const newWindow = .openWindow('Login')
            axios.get('/api/triggerLogin')
                .then((response)=>{
                    //window.open(response.data)
                    //newWindow.location.href = response.data;
                  window.open(response.data)
                })
                .catch((err) => {
                    console.log(err)
                })
        }/*,
      login(){
        axios.get('api/auth/google')
            .then((response)=>{
                //window.open(response.data)
                newWindow.location.href = response.data;
            })
            .catch((err) => {
                console.log(err)
            })
      }*/,
        logout() {
            const vm = this
            axios.post('http://localhost:8000/api/logout?token='+vm.token)
                .then((response)=>{
                    vm.token = ''
                    vm.user = null
                    vm.logged_out = true
                    localStorage.setItem('jwt','')
                    localStorage.setItem('user','')
                })
                .catch((err) => {
                    console.log(err)
                })
        },
        onMessage (e) {
            if (e.origin !== window.origin || !e.data.token) {
                return
            }

            var user_data = JSON.parse(e.data.user.replace(/&quot;/g,'"'));
            this.user = user_data
            this.token = e.data.token
            this.logged_out = false

            localStorage.setItem('user',user_data )
           localStorage.setItem('jwt',e.data.token)


        }
    }
}
</script>
