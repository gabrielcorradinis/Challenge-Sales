<template>
<div>
    <v-form @submit.prevent>
        <v-container>
            <v-row>
                <v-col cols="12" md="6">
                    <v-text-field v-model="name" label="Name" :rules="nameRules"></v-text-field>
                </v-col>
                <v-col cols="12" md="6">
                    <v-text-field v-model="email" label="Email" :rules="emailRules"></v-text-field>
                </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" md="12">
                <v-btn type="submit" block width="100%" height="68px" @click="createSeller()">Submit</v-btn>
              </v-col>
            </v-row>
        </v-container>
    </v-form>
    <v-row class="d-flex justify-center">
      <v-col cols="12" md="11" > 
        <v-alert v-if="formFail" type="error" class="mt-3 text-center" >Please fill in all fields.</v-alert>
      </v-col>
    </v-row>
    <v-row class="d-flex justify-center">
      <v-col cols="12" md="11" > 
        <v-alert v-if="formSuccess" type="success" class="mt-3 text-center" >Seller created!</v-alert>
      </v-col>
    </v-row>
    <v-row class="d-flex justify-center">
      <v-col cols="12" md="11" > 
        <v-alert v-if="formError" type="warning" class="mt-3 text-center" >An error has occurred.</v-alert>
      </v-col>
    </v-row>
</div>
</template>

<script>
import axios from "axios"

export default {
  name: 'NewSeller',
  data() {
    return {
      name: '',
      nameRules: [
        value => {
          if (value) return true
          return 'Name is required.'
        },
      ],
      email: '',
      emailRules: [
        value => {
          if (value) return true

          return 'E-mail is required.'
          },
          value => {
            if (/.+@.+\..+/.test(value)) return true

            return 'E-mail must be valid.'
          },
        ],
      formError: false,
      formFail: false,
      formSuccess: false,
    };
  },
  methods: {
    createSeller(){
      if (!this.name || !this.email) {
        this.formFail = true;
        return;
      }
      
      const data = {
        name: this.name,
        email: this.email
      };
      axios.post('http://localhost:8384/api/seller/create', data)
        .then(response => {
          this.name = null;
          this.email = null;
          this.formError = false;
          this.formFail = false;
          this.formSuccess = true;

          setTimeout(() => {
            this.formSuccess = false;
          },3000);
        })
        .catch(error => {
          this.formFail = true;
          setTimeout(() => {
            this.formFail = false;
          },3000);
        })
    },
  },
};
</script>

<style scoped>

</style>
