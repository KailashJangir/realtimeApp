<template>
    <v-toolbar>
      <v-toolbar-title>Vuetify</v-toolbar-title>
      <v-spacer></v-spacer>
      <div class="hidden-sm-and-down">
        <v-btn text>Forum</v-btn>
        <v-btn text>Ask Question</v-btn>
        <v-btn text>Category</v-btn>
        <router-link to='/login'>
          <v-btn text>Login</v-btn>
        </router-link>
      </div>
    </v-toolbar>
</template>