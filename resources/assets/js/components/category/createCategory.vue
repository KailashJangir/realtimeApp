<template>
	<v-container>
	<v-form @submit.prevent="submit">
      <v-row>
        <v-col
          cols="12"
          md="4"
        >
          <v-text-field
            v-model="form.name"
            label="Category Name"
            required
          ></v-text-field>
        </v-col>
       <v-col
          cols="12"
          md="4"
        >
        <v-btn color="green" type="submit" v-if="editId">Update</v-btn>
        <v-btn color="teal" type="submit" v-else>Create</v-btn>

        <!-- <router-link to="/signup"><v-btn color="green">Create</v-btn></router-link> -->
        </v-col>
      </v-row>
  </v-form>
  <v-card>
		<v-toolbar color="indigo" dark>
			<v-toolbar-title>Categories</v-toolbar-title>
		</v-toolbar>
		<v-list>
			<div v-for="(category, index) in categories" :key="category.id">
				<v-list-item >
				<v-list-item-action>
			    	<v-btn color="green" @click="edit(index)">Edit</v-btn>
				</v-list-item-action>
				<v-list-item-content>
					<v-list-item-title>{{category.name}}</v-list-item-title>
				</v-list-item-content>
				<v-list-item-action>
				 		<v-btn color="red" @click="destroy(category.id,index)">Delete</v-btn>
				</v-list-item-action>
			</v-list-item>
			<v-divider></v-divider>
			</div>
		</v-list>
	</v-card>
</v-container>
</template>

<script>
	export default {
		data() {
			return {
				form: {
					name:null,
				},
				categories:{},
				editId:null,
				
			}
		},
		created() {
			if(!User.admin()){
				this.$router.push('/forum')
			}
			axios.get('/api/category')
			.then(res => this.categories = res.data.data)
			.catch(error => console.log(error.response.data));
		},
		methods : {
			submit() {
				this.editId ? this.update() :this.create()
			},
			create() {
				axios.post('/api/category', this.form)
				.then(res => this.categories.unshift(res.data))
				this.form.name = null
			},
			update() {
				axios.patch(`/api/category/${this.editId}`, this.form)
				.then(res => this.categories.unshift(res.data))
				this.form.name = null
			},
			destroy(id,index){
				axios.delete(`/api/category/${id}`)
				.then(res => this.categories.splice(index,1))
			},

			edit(index){
				this.form.name = this.categories[index].name
				this.editId = this.categories[index].id
				this.categories.splice(index,1)
			}

		}
	}
</script>