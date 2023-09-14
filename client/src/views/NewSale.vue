<template>
<div>
    <v-form @submit.prevent>
        <v-container>
            <v-row>
                <v-col cols="12" md="4">
                  <v-select v-model="selectedSeller" :items="sellers" item-title="name" item-value="id" label="Saller"></v-select>
                </v-col>

                <v-col cols="12" md="4">
                    <v-text-field v-model="amount" label="Amount" hide-details required></v-text-field>
                </v-col>
            </v-row>

            <v-row>
                <v-col cols="12" md="4">
                    <v-btn type="submit" block class="mt-2" @click="createSale()">Submit</v-btn>
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
            amount: '',
            selectedSeller: '',
            sellers: []
        };
    },
    mounted() {
      this.getSellers();
    },
    methods: {
        createSale() {
            const data = {
                seller_id: this.selectedSeller,
                amount: this.amount
            };
            axios.post('http://localhost:8384/api/sales/new-sale', data)
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    // console.log(error);
                })
        },
        getSellers() {
          axios.get('http://localhost:8384/api/seller/list')
                .then(response => {
                    // this.sellers = response.data.sellers.map(seller => ({
                    //   id: seller.id,
                    //   name: seller.name 
                    // }));
                    this.sellers = response.data.sellers;
                    console.log(this.sellers);
                })
                .catch(error => {
                    // console.log(error);
                })
        }
    },
};
</script>

<style scoped>

</style>
