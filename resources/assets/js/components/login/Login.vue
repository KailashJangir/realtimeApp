<template>
  <v-form @submit.prevent="login">
    <v-container>
      <v-row>
        <v-col
          cols="12"
          md="4"
        >
          <v-text-field
            v-model="form.email"
            label="E-mail"
            required
          ></v-text-field>
        </v-col>
        <v-col
          cols="12"
          md="4"
        >
          <v-text-field
            v-model="form.password"
            type="password"
            label="Password"
            required
          ></v-text-field>
        </v-col>
        <v-col
          cols="12"
          md="4"
        >
        <v-btn color="green" type="submit">Login</v-btn>

        <router-link to="/signup"><v-btn color="green">SignUp</v-btn></router-link>
        </v-col>
      </v-row>
    </v-container>
  </v-form>
</template>
<script>
	export default {
		data() {
			return {
				form: {
					email:null,
					password:null
				}
			}
		},

		created() {
			if(User.loggedIn()){
				this$router.push({name:'forum'})
			}
		},

		methods : {
			login() {
				User.login(this.form)
				//this.$router.push({name:'forum'});
			}
		}
	}
</script>