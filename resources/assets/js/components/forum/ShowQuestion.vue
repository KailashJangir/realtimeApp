<template>
  <v-card>
    <v-contianer fluid>
      <v-card-title>
      	<div>	
      		<div class="headline">
      			{{data.title}}
      		</div>
        		<span class="grey--text">{{data.user}} said {{data.created_at}}</span>
      	</div>
        <v-spacer></v-spacer>
        <v-btn color="teal" dark>{{data.reply_count}} Replies</v-btn>
      </v-card-title>

      <v-card-actions v-if="own">
        <v-btn
        class="ma-2"
        color="primary"
        dark
         @click="edit"
      >
        Edit
        </v-btn>
        <v-btn
        class="ma-2"
        color="red"
        dark
        @click="destroy"
      >
        Delete
        </v-icon>
      </v-btn>
      </v-card-actions>

    </v-contianer>
    <v-card-text>
      {{data.body}}
    </v-card-text>
  </v-card>
</template>

<script>
	
	export default {
		props:['data'],
    data(){
      return {
        own: User.own(this.data.user_id)
      }
    },

    methods:{
      destroy(){
        axios.delete(`/api/question/${this.data.id}`)
      .then(res => this.$router.push('/forum'))
      .catch(error => console.log(error.response.data))
      }, 
      edit(){
        EventBus.$emit('startEditing')
      }
    }
	}
</script>