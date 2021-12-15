<template>
	<v-form @submit.prevent="create">
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
        <v-col
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

        </v-col>
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
        <v-btn color="green" type="submit">Create</v-btn>

        <!-- <router-link to="/signup"><v-btn color="green">Create</v-btn></router-link> -->
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
					title:null,
					category_id:null,
					body:null
				},
				categories:{}
			}
		},
		created() {
			axios.get('api/category')
			.then(res => this.categories = res.data.data)
			.catch(error => console.log(error.response.data));
		},
		methods : {
			create() {
				axios.post('api/question', this.form)
				.then(res => this.$router.push(res.data.path))
				.catch(error => console.log(error.response));
			}
		}
	}
</script>