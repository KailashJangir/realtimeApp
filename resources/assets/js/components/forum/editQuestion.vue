<template>
	
	<v-form @submit.prevent="update">
    <v-container>
      <v-row>
        <v-col
          cols="12"
          md="4"
        >
          <v-text-field
            v-model="form.title"
            label="Title"
            required
          ></v-text-field>
        </v-col>
        <!-- <v-col
          cols="12"
          md="4"
        >
          <v-select
          :items="categories"
          item-text="name"
          item-value="id"
          v-model="form.category_id"
          label="Category"
          autocomplete
        ></v-select>

        </v-col> -->
		<v-col
          cols="12"
          md="4"
        >
		<v-textarea
        auto-grow
        label="Body"
        v-model="form.body"
        rows="1"
      ></v-textarea>
        </v-col>
        <v-col
          cols="12"
          md="4"
        >
        <v-btn color="green" type="submit">Save</v-btn>
        <v-btn color="grey" @click="cancel">Cancel</v-btn>
        </v-col>
      </v-row>
    </v-container>
  </v-form>
</template>

<script type="text/javascript">
	export default {
		props:['data'],
		data() {
			return {
				form: {
					title:null,
					category_id:null,
					body:null
				},
				categories:{}
			}
		},
		methods:{
			cancel(){
				EventBus.$emit('cancelEditing')
			},
			update(){
				axios.patch(`/api/question/${this.form.id}`,this.form)
				.then(res => this.cancel())
			}
		},
		mounted(){
			this.form = this.data
		}
	}
</script>