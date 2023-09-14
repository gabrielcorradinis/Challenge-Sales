<template>
<div>
    <v-form @submit.prevent>
        <v-container>
            <v-row>
                <v-col cols="12" md="4">
                    <v-text-field v-model="name" label="Name" required hide-details></v-text-field>
                </v-col>

                <v-col cols="12" md="4">
                    <v-text-field v-model="email" label="Email" hide-details required></v-text-field>
                </v-col>
            </v-row>

            <v-row>
              <v-col cols="12" md="4">
                <v-btn type="submit" block class="mt-2" @click="createSeller()">Submit</v-btn>
              </v-col>
            </v-row>

        </v-container>
    </v-form>
</div>
</template>

<script>
import axios from "axios"

export default {
  name: 'NewSeller',
  data() {
    return {
      name: '',
      email: '',
    };
  },
  methods: {
    createSeller(){
      const data = {
        name: this.name,
        email: this.email
      };
      axios.post('http://localhost:8384/api/seller/create', data)
        .then(response => {
          console.log(response);
        })
        .catch(error => {
          console.log(error);
        })
    },
  },
};
</script>

<style scoped>

</style>
