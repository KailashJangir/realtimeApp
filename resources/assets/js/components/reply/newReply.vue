<template>
		<div class="mt-4">
			<v-col
          cols="12"
        >
			<v-textarea
        	auto-grow
        	label="Body"
        	v-model="body"
        	rows="1">	</v-textarea>
        </v-col>
		<v-col
          cols="12"
        >
        	<v-btn color="blue" @click="submit">Reply</v-btn>
        </v-col>
		</div>
</template>
<script>
	export default{
		props:['questionId'],
		data(){
			return{
				body:null
			}
		},
		methods:{
			submit(){
				axios.post(`/api/question/${this.questionId}/reply`,{body:this.body})
				.then(res => {
					this.body = null
				})
			}
		}
	}
</script>