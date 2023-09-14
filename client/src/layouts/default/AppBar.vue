<template>
  <v-navigation-drawer expand-on-hover rail>
        <v-list density="compact" nav>
          <v-list-item prepend-icon="mdi mdi-home" title="Home" :to="'home'"></v-list-item>
          <v-list-item prepend-icon="mdi mdi-account-plus" title="New Seller" :to="'new-seller'"></v-list-item>
          <v-list-item prepend-icon="mdi mdi-account-group" title="Sellers" :to="'sellers'"></v-list-item>
          <v-list-item prepend-icon="mdi mdi-sale" title="New Sale" :to="'new-sale'"></v-list-item>
          <v-list-item prepend-icon="mdi mdi-alert" title="Sales" :to="'sales'"></v-list-item>
        </v-list>
  </v-navigation-drawer>
</template>