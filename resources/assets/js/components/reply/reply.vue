<template>
	<v-container>
		<div class="mt-3">
			<v-card>
				<v-card-title>
					<div class="headline">{{data.user}}</div>
					<div class="ml-2"> said {{data.created_at}}</div>
				</v-card-title>
				<v-divider></v-divider>

				<edit-reply :reply="data" v-if="editing"></edit-reply>

				<v-card-text v-else v-html="data.reply"></v-card-text>
				<v-divider></v-divider>
				<div v-if="!editing">
					<v-card-actions v-if="own">
			    	<v-btn color="blue" @click="edit">Edit</v-btn>
			    	<v-btn color="red" @click="destroy">Delete</v-btn>
				</v-card-actions>
				</div>
			</v-card>
		</div>
	</v-container>
</template>

<script>
	import EditReply from './editReply'
	export default {
		props:['data','index'],
		components:{EditReply},
		data(){
			return {
				editing:false,
			}
		},
		computed: {
			own(){
				return User.own(this.data.user_id)
			}
		},
		created(){
			this.listen()
		},
		methods:{
			destroy(){
				EventBus.$emit('deleteReply',this.index)
			},
			edit(){
				this.editing = true
			},

			listen(){
				EventBus.$on('cancelEditing', () => {
					this.editing = false
				})
			}
		}
	}
</script>