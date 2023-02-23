<template>
    <div class="border font-semibold  p-4  flex items-center justify-between">
        List Transaction
    </div>

    <div class="p-4 bg-white">
            <Success  v-if="success" :content="success" @close="success=null" />
            <Errors  v-if="errors" :content="errors" @close="errors=null" />
            <div class=" w-full my-1 py-2 sm:flex  sm:items-center sm:justify-between">
                <label for="name" class="w-4/12 "> Search </label>
                <input type="text" v-model="search"  name="search" @change="searchData"
                        class="border border-gray-300 bg-white sm:w-8/12 w-full p-2 mt-3 sm:mt-0 focus:outline-none rounded-sm ">
            </div>

            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                               Reference Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Quantity
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Payment Amount
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Product
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  v-for="(transaction,i) in transactions.data" :key="i" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ transaction.reference_number }}
                            </th>
                            <td class="px-6 py-4">
                                {{ transaction.price }}
                            </td>
                            <td class="px-6 py-4">
                                {{ transaction.quantity }}
                            </td>
                            <td class="px-6 py-4">
                                {{ transaction.payment_amount}}
                            </td>
                            <td class="px-6 py-4">
                                {{ transaction.products.name }}
                            </td>

                        </tr>

                    </tbody>
                    <!-- <TailwindPagination :data="products.data" @pagination-change-page="getData" /> -->
                </table>
            </div>

    </div>
</template>


<script>
import axios from 'axios';
import { TailwindPagination } from 'laravel-vue-pagination'
import { XIcon, LogoutIcon } from '@heroicons/vue/solid';
import Errors from '../../components/Errors.vue';
import Success from '../../components/Success.vue';
import moment from 'moment'
import CircleSvg from '../../components/CircleSvg.vue';
export default {
    components : {
        XIcon,
       Errors,
       Success,
        CircleSvg,
        TailwindPagination,
        LogoutIcon
    },
    data() {
        return {
            errors : null,
            success : '' ,
            busy : false ,
            transactions : {},
            search:'',
        }
    },
    mounted(){
        this.getData();
    },

    methods : {
        async deleteData($id){
            this.busy = true ;
            this.errors = null
            this.success = ''
            try {
                if (confirm('Are you sure ?')) {
                    await axios.delete(`/api/product/${$id}`)
                    this.success = 'product deleted successfully !'
                    this.getData();
                }
            }
            catch (e){
                this.errors = e.data
            };
            this.busy = false ;

        },
        moment: function () {
            return moment();
        },
        async getData(){
            await axios.get(`/api/transaction`)
                .then(resp =>{
                    console.log(resp);
                    if(resp.data){
                        this.transactions = resp.data;
                    }
                })
                .catch(error => {
                    console.log(error.response)
                });
        },
        async searchData(){
            await axios.get(`/api/transaction`, { params: { search: this.search } })
                .then(resp =>{
                    if(resp.data){
                        this.transactions = resp.data;
                    }
                })
                .catch(error => {
                    console.log(error.response)
                });
        },
    },




}
</script>