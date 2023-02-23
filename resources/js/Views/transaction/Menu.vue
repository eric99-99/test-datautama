<template>
  <div class="max-w-screen-lg mx-auto text-gray-900 md:flex md:flex-row md:justify-between md:items-start">

            <div class="border w-full md:w-4/12 mr-0 mb-6 md:mb-0 md:mr-6 ">
                <div  class="border p-4 font-semibold ">Transaction</div>

                <div class="flex flex-col  bg-white">

                    <router-link :to="{name : 'transaction.index'}" class="p-4 flex items-center" active-class="text-white bg-blue-500">
                        <!-- <DatabaseIcon class="h-5 w-5 mr-3"  /> -->
                        <div class="h-5 w-5 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><rect x="0" y="0" width="24" height="24" fill="none" stroke="none" /><path fill="currentColor" d="M9 19v-2h12v2H9Zm0-6v-2h12v2H9Zm0-6V5h12v2H9ZM5 20q-.825 0-1.413-.588T3 18q0-.825.588-1.413T5 16q.825 0 1.413.588T7 18q0 .825-.588 1.413T5 20Zm0-6q-.825 0-1.413-.588T3 12q0-.825.588-1.413T5 10q.825 0 1.413.588T7 12q0 .825-.588 1.413T5 14Zm0-6q-.825 0-1.413-.588T3 6q0-.825.588-1.413T5 4q.825 0 1.413.588T7 6q0 .825-.588 1.413T5 8Z"/></svg>
                        </div>
                        List Transaction
                    </router-link>


                </div>
            </div>


            <div class="border w-full none ">
                <router-view />
            </div>

  </div>
</template>


<script>
import {DatabaseIcon , KeyIcon} from '@heroicons/vue/outline'
export default {
    components : {
        DatabaseIcon , KeyIcon
    }
}
</script>
