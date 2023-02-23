<template>
    <div class="border font-semibold  p-4  flex items-center justify-between">
        List Products
        <!-- <div class="text-gray-600 text-sm font-medium">
            {{verified ? `Verified at : ${ moment(verified).format('MMMM Do YYYY, h:mm a')} ` : 'Not verified !'}}
        </div> -->

    </div>

    <div class="p-4 bg-white">

                    <Success  v-if="success" :content="success" @close="success=null" />

                    <Errors  v-if="errors" :content="errors" @close="errors=null" />
                    <!-- <div v-if="error" class="md:w-10/12 md:p-2 w-full mx-auto text-sm text-red-500 text-white text-center">
                        {{error}}
                    </div> -->

                    <!-- <form class="md:w-10/12 md:p-4 w-full mx-auto" @submit.prevent="update">
                        <div class=" w-full my-1 py-2 sm:flex  sm:items-center sm:justify-between">
                            <label for="name" class="w-4/12 "> Name </label>
                            <input type="text" v-model="name"  name="name" class="border border-gray-300 bg-white sm:w-8/12 w-full p-2 mt-3 sm:mt-0 focus:outline-none rounded-sm ">
                        </div>
                        <div class=" w-full my-1 py-2 sm:flex  sm:items-center sm:justify-between">
                            <label for="Email" class="w-4/12 "> Email </label>
                            <input type="email" v-model="email" name="email" class="border border-gray-300 bg-white sm:w-8/12 w-full p-2 mt-3 sm:mt-0 focus:outline-none rounded-sm">
                        </div>

                        <div class=" w-full my-1 py-2 sm:flex  sm:items-center  sm:justify-end">
                            <div class="sm:w-8/12 w-full  flex justify-between items-center mt-3 sm:mt-0">
                                 <div v-if="busy"  class="flex justify-center items-center p-2 px-6 rounded-sm text-white bg-blue-500 hover:bg-blue-600">
                                   <circle-svg class="w-6 h-6" />
                                </div>
                                <button v-else type="submit" class="p-3 rounded-sm text-white bg-blue-500 hover:bg-blue-600">Update</button>
                            </div>
                        </div>
                    </form> -->

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
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Stock
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr  v-for="(product,i) in products.data" :key="i" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ product.name }}
                </th>
                <td class="px-6 py-4">
                    {{ product.price }}
                </td>
                <td class="px-6 py-4">
                    {{ product.stock }}
                </td>
                <td class="px-6 py-4">
                    {{ product.description}}
                </td>
                <td class="px-6 py-4">
                    <div class="grid gap-2 grid-cols-2">
                        <!-- <a href="#" class="text-indigo-600 hover:text-indigo-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a> -->
                        <router-link :to="{ name: 'update', params: { id: product.id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </router-link>


                        <button @click="deleteData(product.id)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600 hover:text-red-800"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>

                    </div>
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
            email :  '' ,
            name :  '',
            errors : null,
            success : '' ,
            busy : false ,
            products : {},
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
            await axios.get(`/api/product`)
                .then(resp =>{
                    if(resp.data){
                        this.products = resp.data;
                    }
                })
                .catch(error => {
                    console.log(error.response)
                });
        },
        async searchData(){
            await axios.get(`/api/product`, { params: { search: this.search } })
                .then(resp =>{
                    if(resp.data){
                        this.products = resp.data;
                    }
                })
                .catch(error => {
                    console.log(error.response)
                });
        }
    },




}
</script>