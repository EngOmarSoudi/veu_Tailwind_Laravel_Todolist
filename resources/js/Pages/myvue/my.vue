<template>


    <div class="h-screen-1/2 w-screen relative bg-white flex ">

        <div class="ml-[5vw] mr-[5vh] h-[10vh] w-[90vw] p-2 bg-black flex items-center justify-between">
            <div class="h-full min-w-[7vw] flex items-center ml-[1vw]  text-white">
                <h5 class=" text-gray-50 text-light ">{{nameTAsk}}  </h5>
            </div>
            <div class="h-full w-[5vw] flex items-center justify-center mr-[1vw] py-2 px-4 bg-green-300 hover:bg-green-700 cursor-pointer rounded-lg" @click="toggleIsShow" >
                <p class="text-3xl ">+</p>
            </div>


        </div>




    </div>
    <div class="h-screen w-screen relative bg-white flex ">
        <div class="ml-[5vw] mr-[5vh] h-fit w-[90vw] p-2 bg-gray-200 flex items-center justify-center">
        <div class="w-full h-full overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    #
                </th>
                <th scope="col" class="py-3 px-6">
                    Completed
                </th>
                <th scope="col" class="py-3 px-6">
                     title
                </th>
                <th scope="col" class="py-3 px-6">
                    Time
                </th>
                <th scope="col" class="py-3 px-6">
                    Date
                </th>
                <th scope="col" class="py-3 px-6">
                    Created at
                </th>
                <th scope="col" class="py-3 px-6">
                    Details
                </th>
                <th scope="col" colspan="2" class="py-3 px-6">

                </th>

            </tr>
                 </thead>
                    <tbody>
                <tr v-for="(task,index) in data1" :key="index" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" >
                <!-- <tr v-for="item in task" :key="item.id+1" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" > -->
                    <td class="py-4 px-12">
                       {{ index+1 }}
                    </td>
                    <td class="py-4 px-12">
                        <input type="checkbox">
                    </td>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ task.title.length <= 10 ? task.title:task.title.substr(0,10) + "..." }}
                    </th>
                    <td class="py-4 px-6">
                       {{ task.time }}
                    </td>
                    <td class="py-4 px-6">
                        {{ task.date }}
                    </td>
                    <td class="py-4 px-6">
                        {{ task.Created_at }}
                    </td>
                    <td class="py-4 px-6">
                        {{ task.details.length <= 10 ? task.details:task.details.substr(0,10) + "..." }}
                    </td>
                    <td class="py-4 px-2">
                        <button class="h-full w-[5vw] text-white flex items-center justify-center mr-[1vw] py-2 px-4 bg-green-600 hover:bg-green-700 cursor-pointer rounded-lg" @click="toggleIsShowEdit(task)" >
                            Edit
                        </button>
                    </td>
                    <td class="py-4 px-2">
                        <button class="h-full w-[5vw] text-white flex items-center justify-center mr-[1vw] py-2 px-4 bg-red-600 hover:bg-red-700 cursor-pointer rounded-lg" @click="toggleIsShowDelete(task.id)" >
                            Delete
                        </button>
                    </td>

                </tr>
                <!-- </tr> -->

                    </tbody>
            </table>
        </div>
        </div>

    </div>
<MyModel :is-show="isShowEdit" :toggle-is-show="toggleIsShowEdit">
    <template #header>
                <div  class="">Edit {{ this.idp }}</div>
    </template>
    <div class="mr-10 mb-5 h-full w-[40vw] xl:flex items-center justify-center ">
                <div class="w-full max-w-xs">

                    <div class="w-full max-w-lg ml-5">


                    <div class="flex w-full flex-wrap -mx-3 mb-6 ">
                        <div class="w-full md:w px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Title
                        </label>
                        <input  v-model="title" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Mohammed">
                        <p v-show="taskErorrs.title" class="text-red-500 text-xs italic">Please fill out this field.</p>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Time
                        </label>
                        <input v-model="time" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="time" placeholder="Doe">
                        <p v-show="taskErorrs.time" class="text-red-500 text-xs italic">Please fill out this field.</p>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Date
                        </label>
                        <input v-model="date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="date" placeholder="Doe">
                        <p v-show="taskErorrs.date" class="text-red-500 text-xs italic">Please fill out this field.</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            Details
                        </label>
                        <input v-model="details" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Details">
                        <!-- </textarea> -->
                            <p v-show="taskErorrs.details" class="text-red-600 text-xs italic">Please fill out this field.</p>
                        </div>
                        <!-- <div class="flex items-center justify-center"> -->

                                                <div class="w-full ml-3 flex items-center self-center">
                                                    <button @click="edit(this.idp)" class="bg-green-400 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                                                        Edit Task
                                                    </button>
                                                </div>
                                            <!-- </div> -->
                    </div>

                    </div>

                </div>

            </div>
</MyModel>
<MyModel :is-show="isShowDelete" :toggle-is-show="toggleIsShowDelete">
    <template #header>
                <div class="">Are You Sure  {{ this.idp }}</div>
    </template>

    <div class="flex justify-center items-end py-9 ml-3">

  <button @click="deleteTask(this.idp)" class="bg-red-300 hover:bg-red-400 text-gray-800 font-bold py-2 px-4 mr-5 rounded-l">
    Delete {{this.idp}}
  </button>
  <button @click="Cancle" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 mr-5 rounded-r">
    Cancle
  </button>
</div>
    <!-- <div class="mr-10 mb-5 h-full w-fit xl:flex items-center justify-center mt-3 ">
                <div class="w-full max-w-xs flex justify-center items-center">

                    <div class="w-full max-w-lg ml-5 flex justify-between">
    <div class="w-full flex  justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
  Button
</button>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
  Button
</button>
        <button @click="Delete" class="bg-green-400 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
            Delete
        </button>
        <button @click="cancle" class="bg-green-400 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
            Cancle
        </button>
    </div>
    </div>
    </div>
    </div> -->
</MyModel>
<MyModel :is-show="isShow" :toggle-is-show="toggleIsShow">
            <template #header>
                <div class="">Hi Omer </div>
            </template>
            <div class="mr-10 mb-5 h-full w-[40vw] xl:flex items-center justify-center ">
                <div class="w-full max-w-xs">

                    <div class="w-full max-w-lg ml-5">


                    <div class="flex w-full flex-wrap -mx-3 mb-6 ">
                        <div class="w-full md:w px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Title
                        </label>
                        <input  v-model="title" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Mohammed">
                        <p v-show="taskErorrs.title" class="text-red-500 text-xs italic">Please fill out this field.</p>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Time
                        </label>
                        <input v-model="time" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="time" placeholder="Doe">
                        <p v-show="taskErorrs.time" class="text-red-500 text-xs italic">Please fill out this field.</p>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Date
                        </label>
                        <input v-model="date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="date" placeholder="Doe">
                        <p v-show="taskErorrs.date" class="text-red-500 text-xs italic">Please fill out this field.</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            Details
                        </label>
                        <input v-model="details" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Details">
                        <!-- </textarea> -->
                            <p v-show="taskErorrs.details" class="text-red-600 text-xs italic">Please fill out this field.</p>
                        </div>
                        <!-- <div class="flex items-center justify-center"> -->

                                                <div class="w-full ml-3 flex items-center self-center">
                                                    <button @click="submit" class="bg-green-400 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                                                        Add Task
                                                    </button>
                                                </div>
                                            <!-- </div> -->
                    </div>

                    </div>

                </div>

            </div>
        </MyModel>

</template>
<script>
import MyModel from "@/Pages/myvue/MyModel.vue";
import MyModelEdit from "@/Pages/myvue/MyModelEdit.vue";
import MyModelDelete from "@/Pages/myvue/MyModelDelete.vue";
import axios from 'axios';
// import { Head, Link } from '@inertiajs/inertia-vue3';



export default {
    name: "my",
    components: {MyModel,MyModelEdit,MyModelDelete},

    props: {
        // date: new Date.now(),
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
        namep:{
            type: String,
            default: "omar"
        },
        nameTAsk: {
            type: String,
            default: "Add a New Task"
        },
        // idp: {
        //     type: Number,
        //     default: 0
        // },
//         title:{
//             type: String,
//             default:"a"
//         },
//         date:{
//             type: Date,
//             default:'Sun Dec 04 2022 '
// },
//         time:{
//             type: Date,
//             default:'13:41:40'
//         },
        completed:{
            type: Boolean,
            default: false,
        },
//         details:{
//             type: String,
//             default: "safasv",
//         },
        completed_at:{
            type: String,
            default: "",
        },
        data1:{
            type: Array,
            default:()=>[]
        },
    },
    data(){
        return {
            data1:{},
            isShow:false,
            isShowEdit:false,
            isShowDelete:false,
            name:this.namep,
            idp:0,
            title:this.title,
            date:this.date,
            time:this.time,
            completed_at:this.completed_at,
            details:this.details,
            completed: this.completed,
            taskErorrs: {
              title:false,
              date:false,
              time:false,
              details:false,
            },
            tasks: {
            },

        }
    },
    mounted ()
        {
            this.getTasks()
    },
    methods: {

        // hideModel(){
        //     this.isShow = false
        // },

        getTasks ()
        {
            axios.get( this.route( 'getTasks' ) ).then( response =>
            {
                this.data1 = response.data
            } ).catch( errors => { console.log( errors ) } );
        },
        toggleIsShowEdit (task) {
            this.isShowEdit = !this.isShowEdit
            this.title= task.title;
            this.time= task.time;
            this.date= task.date;
            this.details = task.details;
            this.idp = task.id;
        },

        toggleIsShowDelete (id) {
            this.isShowDelete = !this.isShowDelete
            // this.title= task.title;
            // this.time= task.time;
            // this.date= task.date;
            // this.details = task.details;
            this.idp = id;
         },
        toggleIsShow(){
            this.isShow = !this.isShow
            this.taskErorrs= {
              title:false,
              date:false,
              time:false,
              details:false,
            }
        },
            Cancle(){
                this.toggleIsShowDelete()
        },
        deleteTask(id){
            axios.delete( this.route( 'delete' ,{id:id} ) ).then( response =>
            {
                // this.getTasks()
                this.toggleIsShowDelete()
            } ).catch( errors => { console.log( errors ) } );
        },
        submit(){
            // this.$inertia.visit(this.route('test',{name:this.name,id:this.id}))
            this.title == '' ? this.taskErorrs.title = false : this.taskErorrs.title = true
            this.date == '' ? this.taskErorrs.date = false : this.taskErorrs.date = true
            this.time == '' ? this.taskErorrs.time = false : this.taskErorrs.time = true
            this.details == '' ? this.taskErorrs.details = false : this.taskErorrs.details = true
            if (this.taskErorrs.title && this.taskErorrs.date && this.taskErorrs.time && this.taskErorrs.details)
            {
                axios.post( this.route( 'store' ), {

                    title: this.title,
                    date: this.date,
                    time: this.time,
                    completed_at: this.completed_at,
                    details: this.details,
                    completed: this.completed,

                } ).then( response =>
                {
                    this.title = response.data.title;
                    this.date = response.data.date;
                    this.time = response.data.time;
                    this.details = response.data.details;
                    this.completed_at = response.data.completed_at;
                    this.completed = response.data.completed;



                    // this.name=response.data.name;
                    // this.id=response.data.id;.catch( errors => console.log( errors ) )
                    // this.toggleIsShow();
                } ).catch( errors => { console.log( errors ) } ).finally( () => { this.toggleIsShow() } );
            }

        },
        edit(id){
            // this.$inertia.visit(this.route('test',{name:this.name,id:this.id}))
            // this.title == '' ? this.taskErorrs.title = false : this.taskErorrs.title = true
            // this.date == '' ? this.taskErorrs.date = false : this.taskErorrs.date = true
            // this.time == '' ? this.taskErorrs.time = false : this.taskErorrs.time = true
            // this.details == '' ? this.taskErorrs.details = false : this.taskErorrs.details = true
            // this.taskErorrs.title && this.taskErorrs.date && this.taskErorrs.time && this.taskErorrs.details
            // if (true)
            // {
                axios.put( this.route( 'edit',{id:id} ), {

                    title: this.title,
                    date: this.date,
                    time: this.time,
                    completed_at: this.completed_at,
                    details: this.details,
                    completed: this.completed,

                } ).then( response =>
                {
                    this.title = response.data.title;
                    this.date = response.data.date;
                    this.time = response.data.time;
                    this.details = response.data.details;
                    this.completed_at = response.data.completed_at;
                    this.completed = response.data.completed;



                    // this.name=response.data.name;
                    // this.id=response.data.id;.catch( errors => console.log( errors ) )
                    // this.toggleIsShow();
                } ).catch( errors => { console.log( errors ) } ).finally( () => { this.toggleIsShowEdit() } );
            // }

        }
    }
}
</script>
<!-- <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">-->
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
<!--                    </p> -->
  <!-- <div class="w-full max-w-sm"> -->
                        <!-- <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-title">
                                    Task title
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input id="inline-title" v-model="title" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"  type="text" >
                            </div>
                            <span class="text-red-600" v-show="taskErorrs.title">
                                Title is required
                            </span>
                        </div> -->
                        <!-- <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-date">
                                    Task date
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input id="inline-date"  v-model="date" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"  type="date" >
                            </div>
                            <span class="text-red-600"  v-show="taskErorrs.date">
                                Date is required
                            </span>
                        </div> -->
                        <!-- <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-time">
                                    Task time
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input id="inline-time" v-model="time" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"  type="time" >
                            </div>
                            <span class="text-red-600"  v-show="taskErorrs.time">
                                Time is required
                            </span>
                        </div> -->
                        <!-- <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-details">
                                    Task details
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input id="inline-details" v-model="details" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"  type="textarea" >

                                </div>
                            <span class="text-red-600"  v-show="taskErorrs.details">
                                details is required
                            </span>
                        </div> -->


                    <!-- </div> -->
  <!-- <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</Link>

                <template v-else>
                    <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</Link>

                    <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</Link>
                </template>
            </div> -->
