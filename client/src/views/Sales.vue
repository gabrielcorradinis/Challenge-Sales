<template>
<div>
    <v-form @submit.prevent>
        <v-container>
            <v-row>
                <v-col cols="12" md="4">
                    <v-select v-model="selectedSeller" :items="sellers" item-title="name" item-value="id" label="Saller"></v-select>
                </v-col>

                <v-col cols="12" md="4">
                    <v-btn type="submit" block class="mt-2" @click="listSales()">Submit</v-btn>
                </v-col>
            </v-row>
        </v-container>
    </v-form>

    <v-table theme="dark">
        <thead>
            <tr>
                <th class="text-left">
                    ID
                </th>
                <th class="text-left">
                    Name
                </th>
                <th class="text-left">
                    Email
                </th>
                <th class="text-left">
                    Commission
                </th>
                <th class="text-left">
                    Amount
                </th>
                <th class="text-left">
                    Date of sale
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(sale, index) in sales.sales" :key="index">
                <td>{{ sale.id }}</td>
                <td>{{ sales.name }}</td>
                <td>{{ sales.email }}</td>
                <td>{{ sale.commission }}</td>
                <td>{{ sale.amount }}</td>
                <td>{{ sale.created_at }}</td>
            </tr>
        </tbody>
    </v-table>
</div>
</template>

<script>
import axios from "axios"

export default {
    name: 'NewSeller',
    data() {
        return {
            sales: [],
            sellers: [],
            selectedSeller: '',
        };
    },
    mounted() {
        this.listSeller();
    },
    methods: {
        listSeller() {
            axios.get('http://localhost:8384/api/seller/list')
                .then(response => {
                    this.sellers = response.data.sellers;
                })
                .catch(error => {
                    console.log(error);
                })
        },
        listSales() {
            const sellerId = this.selectedSeller;
            axios.get(`http://localhost:8384/api/sales/${sellerId}`)
                .then(response => {
                    this.sales = response.data.sales;
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },
};
</script>

<style scoped>

</style>
