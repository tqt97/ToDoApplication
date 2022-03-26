<template>
    <!-- <div class="flex justify-center items-center min-h-screen bg-[#cbd7e3]">
        <div class="h-auto w-96 bg-white rounded-lg p-4">
            <div
                class="mt-3 text-sm text-[#8ea6c8] flex justify-between items-center"
            >
                <p class="set_date">Thursday 28 May</p>
                <p class="set_time">8:00 AM</p>
            </div>
            <p class="text-xl font-semibold mt-2 text-[#063c76]">To-do List</p>

            <add-item-form v-on:reloadlist="getList()" />

            <div
                class="w-full mt-4 flex text-sm flex-col text-center justify-center"
            >
                <div
                    class="px-[15px] flex justify-between text-center items-center"
                >
                    <p>s</p>
                    <p>m</p>
                    <p>t</p>
                    <p>w</p>
                    <p>t</p>
                    <p>f</p>
                    <p>s</p>
                </div>
                <div
                    class="w-full pl-1 flex justify-between text-center items-center"
                >
                    <span
                        class="h-7 w-7 rounded-full cursor-pointer transition-all hover:bg-[#063c76] hover:text-white bg-[#fff] flex justify-center items-center"
                    >
                        <p>24</p>
                    </span>
                    <span
                        class="h-7 w-7 rounded-full cursor-pointer transition-all hover:bg-[#063c76] hover:text-white bg-[#fff] flex justify-center items-center"
                    >
                        <p>25</p>
                    </span>
                    <span
                        class="h-7 w-7 rounded-full cursor-pointer transition-all hover:bg-[#063c76] hover:text-white bg-[#fff] flex justify-center items-center"
                    >
                        <p>26</p>
                    </span>
                    <span
                        class="h-7 w-7 rounded-full cursor-pointer transition-all hover:bg-[#063c76] hover:text-white bg-[#fff] flex justify-center items-center"
                    >
                        <p>27</p>
                    </span>
                    <span
                        class="h-7 w-7 rounded-full cursor-pointer transition-all hover:bg-[#063c76] hover:text-white bg-[#fff] flex justify-center items-center"
                    >
                        <p>28</p>
                    </span>
                    <span
                        class="h-7 w-7 rounded-full cursor-pointer transition-all hover:bg-[#063c76] hover:text-white bg-[#fff] flex justify-center items-center"
                    >
                        <p>29</p>
                    </span>
                    <span
                        class="h-7 w-7 rounded-full cursor-pointer transition-all hover:bg-[#063c76] hover:text-white bg-[#fff] flex justify-center items-center"
                    >
                        <p>30</p>
                    </span>
                </div>
            </div>
            <list-view :items="items" v-on:reloadlist="getList()" />
        </div>
        <notifications
            animation-type="velocity"
            position="top right"
            :speed="500"
            reverse
        />
    </div> -->
    <div
        class="bg-gradient-to-b from-indigo-100 via-purple-50 to-pink-50"
    >
        <notifications
            animation-type="velocity"
            position="top right"
            :speed="500"
        />
        <div class="container m-auto">
            <div class="flex justify-center items-center min-h-screen">
                <div
                    class="h-auto w-9/12 bg-gradient-to-l  from-purple-300 via-blue-200 to-blue-300 transition duration-300 rounded-lg p-4 shadow-lg"
                >
                    <h1
                        class="text-5xl text-center font-extrabold font font-mono text-black mb-10"
                    >
                        Todo List
                    </h1>
                    <add-item-form v-on:reloadlist="getList()" />
                    <list-view :items="items" v-on:reloadlist="getList()" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import addItemForm from "./addItemForm";
import listView from "./listView";

export default {
    components: {
        addItemForm,
        listView,
    },
    data: function () {
        return {
            items: [],
        };
    },
    methods: {
        getList() {
            axios
                .get("/api/items")
                .then((response) => {
                    this.items = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
    created() {
        this.getList();
    },
};
</script>
<style scoped>
/* .todoListContainer {
    width: 400px;
    margin: 0 auto;
} */
/* .heading {
    background-color: #e6e6e6;
    padding: 5px;
}
#title {
    font-size: 60px;
    text-align: center;
    color: green;
    text-shadow: 2px 4px 2px rgb(92, 92, 92);
} */
</style>
