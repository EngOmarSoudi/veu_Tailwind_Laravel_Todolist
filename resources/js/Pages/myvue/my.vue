<template>


    <div class="h-screen w-screen relative bg-white flex ">
        <div class="ml-[5vw] mr-[5vh] h-[10vh] w-[90vw] bg-black flex items-center justify-between">
            <div class="min-h-[5vh] min-w-[7vw] ml-[1vw]  text-white">
                <h5 class=" text-gray-50 text-light ">{{nameTAsk}} {{title}}</h5>
            </div>
            <div class="min-h-[5vh] min-w-[7vw]  justify-center mr-[1vw] py-2 px-4 bg-green-300 hover:bg-green-700 cursor-pointer rounded-lg" @click="toggleIsShow" >
                <p class="min-ml-[1.5vw] max-ml-[3vw] self-center font-size-20 ">+</p>
            </div>

        </div>

        <MyModel :is-show="isShow" :toggle-is-show="toggleIsShow">
            <template #header>
                <div class="">Hi Omer </div>
            </template>
            <div class="mr-10 mb-5 h-full w-full xl: flex items-center justify-center ">
                <div class="w-full max-w-xs">
<!--                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">-->
<!--                        <div class="mb-4">-->
<!--                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">-->
<!--                                Task title-->
<!--                            </label>-->
<!--                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="title"  id="title" type="text" placeholder="Task Name">-->
<!--                        </div>-->
<!--                        <div class="mb-4">-->
<!--                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">-->
<!--                                Task title-->
<!--                            </label>-->
<!--                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="title"  id="title" type="text" placeholder="Task Name">-->
<!--                        </div>-->
<!--                        <div class="mb-4">-->
<!--                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">-->
<!--                                Task title-->
<!--                            </label>-->
<!--                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="title"  id="title" type="text" placeholder="Task Name">-->
<!--                        </div>-->
<!--                        <div class="mb-4">-->
<!--                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">-->
<!--                                Task title-->
<!--                            </label>-->
<!--                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="title"  id="title" type="text" placeholder="Task Name">-->
<!--                        </div>-->
<!--                        <div class="mb-4">-->
<!--                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">-->
<!--                                Task title-->
<!--                            </label>-->
<!--                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="title"  id="title" type="text" placeholder="Task Name">-->
<!--                        </div>-->
<!--                        <div class="mb-4">-->
<!--                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">-->
<!--                                Task title-->
<!--                            </label>-->
<!--                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="title"  id="title" type="text" placeholder="Task Name">-->
<!--                        </div>-->

<!--                        <div class="flex items-center justify-center">-->
<!--                            <button @click="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">-->
<!--                                Add-->
<!--                            </button>-->
<!--                            &lt;!&ndash;                            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">&ndash;&gt;-->
<!--                            &lt;!&ndash;                                Forgot Password?&ndash;&gt;-->
<!--                            &lt;!&ndash;                            </a>&ndash;&gt;-->
<!--                        </div>-->
<!--                    </form>-->
<!--                    <p class="text-center text-gray-500 text-xs">-->
<!--                        &copy;2020 Acme Corp. All rights reserved.-->
<!--                    </p>-->
                    <div class="w-full max-w-sm">
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-title">
                                    Task title
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input id="inline-title" v-model="title" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"  type="text" >
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-date">
                                    Task date
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input id="inline-date"  v-model="date" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"  type="date" >
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-time">
                                    Task time
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input id="inline-time" v-model="time" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"  type="time" >
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-details">
                                    Task details
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input id="inline-details" v-model="details" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"  type="textarea" >
                            </div>
                        </div>

                        <div class="md:flex md:items-center">
                            <div class="md:w-1/3"></div>
                            <div class="md:w-2/3">
                                <button @click="submit" class="bg-green-400 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                                    Add Task
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </MyModel>
    </div>
</template>
<script>
import MyModel from "@/Pages/myvue/MyModel.vue";

export default {
    name: "my",
    components: {MyModel},
    props: {
        namep:{
            type: String,
            default: "omar"
        },
        nameTAsk: {
            type: String,
            default: "Add a New Task"
        },
        idp: {
            type: Number,
            default: 1
        },
        title:{
            type: String,
            default:"a"
        },
        date:{
            type: Date,
            default:'Sun Dec 04 2022 '
},
        time:{
            type: Date,
            default:'13:41:40'
        },
        completed:{
            type: Boolean,
            default: false,
        },
        details:{
            type: String,
            default: "safasv",
        },
        completed_at:{
            type: Date,
            default: Date,
        },
    },
    data(){
        return {
            isShow:false,
            name:this.namep,
            id:this.idp,
            title:this.title,
            date:this.date,
            time:this.time,
            completed_at:this.completed_at,
            details:this.details,
            completed:this.completed,

        }
    },
    methods:{
        // hideModel(){
        //     this.isShow = false
        // },
        toggleIsShow(){
            this.isShow = !this.isShow
        },
        submit(){
            // this.$inertia.visit(this.route('test',{name:this.name,id:this.id}))
            axios.post(this.route('store'),{
                title:this.title,
                date:this.date,
                time:this.time,
                completed_at:this.completed_at,
                details:this.details,
                completed:this.completed,

            }).then(response=>{
                this.title = response.data.title;
                this.date = response.data.date;
                this.time = response.data.time;
                this.details = response.data.details;
                this.completed_at = response.data.completed_at;
                this.completed = response.data.completed;



                // this.name=response.data.name;
                // this.id=response.data.id;
                this.toggleIsShow();
            })
        }
    }
}
</script>
