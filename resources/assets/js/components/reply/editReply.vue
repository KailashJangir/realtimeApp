<template>
	<div class="mt-4">
			<v-col
          cols="12"
        >
			<v-textarea
        	auto-grow
        	v-model="reply.reply"
        	rows="1">	</v-textarea>
        </v-col>
		<v-col
          cols="12" md="4"
        >
        	<v-btn color="blue" @click="update">Save</v-btn>
        	<v-btn color="grey" @click="cancel">Cancel</v-btn>
        </v-col>

		</div>
</template>

<script>
	export default {
		props:['reply'],

		methods:{
			cancel(){
				EventBus.$emit('cancelEditing')
			},

			update(){
				axios.patch(`/api/question/${this.reply.question_id}/reply/${this.reply.id}`, {body:this.reply.reply})
				.then(res => this.cancel())
			}
		}

	}
</script>