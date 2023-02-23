<template>
    <div class="border font-semibold  p-4 ">
        Add Product

    </div>

    <div class="p-4 bg-white">


                    <Success  v-if="success" :content="success" @close="success=null" />

                    <Errors v-if="errors" :content="errors" @close="errors=null" />

                    <form class="md:w-10/12 md:p-4 w-full mx-auto" @submit.prevent="savedata">
                        <div class=" w-full my-1 py-2 sm:flex  sm:items-center sm:justify-between">
                            <label for="name" class="w-4/12 "> Name </label>
                            <input type="test" v-model="name"  name="name" class="border border-gray-300 bg-white sm:w-8/12 w-full p-2 mt-3 sm:mt-0 focus:outline-none rounded-sm ">
                        </div>
                        <div class=" w-full my-1 py-2 sm:flex  sm:items-center sm:justify-between">
                            <label for="description" class="w-4/12 "> Description </label>
                            <input type="text" v-model="description" name="description" class="border border-gray-300 bg-white sm:w-8/12 w-full p-2 mt-3 sm:mt-0 focus:outline-none rounded-sm">
                        </div>

                        <div class=" w-full my-1 py-2 sm:flex  sm:items-center sm:justify-between">
                            <label for="price" class="w-4/12 "> Price </label>
                            <input type="number" v-model="price" name="price" class="border border-gray-300 bg-white sm:w-8/12 w-full p-2 mt-3 sm:mt-0 focus:outline-none rounded-sm">
                        </div>

                        <div class=" w-full my-1 py-2 sm:flex  sm:items-center sm:justify-between">
                            <label for="stock" class="w-4/12 "> Stock </label>
                            <input type="number" v-model="stock" name="stock" class="border border-gray-300 bg-white sm:w-8/12 w-full p-2 mt-3 sm:mt-0 focus:outline-none rounded-sm">
                        </div>

                        <div class=" w-full my-1 py-2 sm:flex  sm:items-center  sm:justify-end">
                            <div class="sm:w-8/12 w-full  flex justify-between items-center mt-3 sm:mt-0">
                                 <div v-if="busy"  class="flex justify-center items-center p-2 px-6 rounded-sm text-white bg-blue-500 hover:bg-blue-600">
                                   <circle-svg class="w-6 h-6" />
                                </div>
                                <button  type="submit" class="p-3 rounded-sm text-white bg-blue-500 hover:bg-blue-600">Save Data</button>
                            </div>
                        </div>
                    </form>


    </div>
</template>


<script>
import axios from 'axios';
import { XIcon } from '@heroicons/vue/solid';
import Errors from '../../components/Errors.vue';
import Success from '../../components/Success.vue';
import CircleSvg from '../../components/CircleSvg.vue';
export default {
    components : {
        XIcon,
       Errors,
       Success,
        CircleSvg
    },
    data() {
        return {
            name :  '' ,
            description :  '',
            stock :  0 ,
            price :  0 ,
            errors : null,
            success : '',
            busy : false ,
        }
    },
    computed : {
        user() {
            return this.$store.getters.user
        },
    },

    methods : {
        async savedata(){
            this.busy = true ;
            this.errors = null
            this.success = ''
            let form = {};

            try {

                form.name = this.name;
                form.description = this.description;
                form.stock = this.stock;
                form.price = this.price;
                form.user_id =  this.user.id;
                await axios.post('/api/product', form);

                this.success = 'save data successfully !'
                this.name = ''
                this.description = ''
                this.stock = 0
                this.price = 0
            }
            catch (e){
                this.errors = e.data
            };
            this.busy = false ;

        }
    },


}
</script>