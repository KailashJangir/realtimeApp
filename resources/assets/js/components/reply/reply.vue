<template>
	<v-container>
		<div class="mt-3">
			<v-card>
				<v-card-title>
					<div class="headline">{{data.user}}</div>
					<div class="ml-2"> said {{data.created_at}}</div>
					<v-spacer></v-spacer>
					<like :content="data"></like>
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
	import Like from '../likes/like'
	export default {
		props:['data','index'],
		components:{EditReply,Like},
		data(){
			return {
				editing:false,
				beforEditReplyBody:''
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
				this.beforEditReplyBody = this.data.reply
			},

			listen(){
				EventBus.$on('cancelEditing', (reply) => {
					this.editing = false

					if(reply !== this.data.reply){
						this.data.reply = this.beforEditReplyBody
						this.beforEditReplyBody = ''
					}
				})
			}
		}
	}
</script>