<template>
<div>
    <v-form @submit.prevent>
        <v-container>
            <v-row>
                <v-col cols="12" md="6">
                  <v-select v-model="selectedSeller" :items="sellers" item-title="name" item-value="id" label="Saller" :rules="[v => !!v || 'Seller is required']"></v-select>
                </v-col>
                <v-col cols="12" md="6">
                    <v-text-field v-model="amount" label="Amount" :rules="amountRules"          prefix="R$" ></v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="12" md="12">
                    <v-btn type="submit" block width="100%" height="68px" @click="createSale()">Submit</v-btn>
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
        <v-alert v-if="formSuccess" type="success" class="mt-3 text-center" >Sale created!</v-alert>
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
    name: 'NewSale',
    data() {
        return {
            selectedSeller: null,
            amount: '',
            amountRules: [ value => {
                if (/[0-9-]+/.test(value)) return true

                    return 'Only numbers'
                },
            ],
            sellers: [],
            formError: false,
            formFail: false,
            formSuccess: false,
        };
    },
    mounted() {
      this.getSellers();
    },
    methods: {
        createSale() {
            if (!this.selectedSeller || !this.amount) {
                this.formFail = true;
                return;
            }
            const data = {
                seller_id: this.selectedSeller,
                amount: this.amount
            };
            axios.post('http://localhost:8384/api/sales/new-sale', data)
                .then(response => {
                    this.selectedSeller = null;
                    this.amount = null;
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
        getSellers() {
          axios.get('http://localhost:8384/api/seller/list')
                .then(response => {
                    this.sellers = response.data.sellers;
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
