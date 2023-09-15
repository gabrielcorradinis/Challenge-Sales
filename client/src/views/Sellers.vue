<template>
<div>
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
      </tr>
    </thead>
    <tbody>
      <tr
        v-for="item in sellers"
        :key="item.name"
      >
        <td>{{ item.id }}</td>
        <td>{{ item.name }}</td>
        <td>{{ item.email }}</td>
        <td>R$ {{ item.sales_sum_commission || `0.00`}}</td>
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
      sellers: []
    };
  },
  mounted() {
    this.listSeller();
  },
  methods: {
    listSeller(){
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
