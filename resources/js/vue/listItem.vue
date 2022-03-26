<template>
    <div>
        <li class="mt-1 w-full relative">
            <!-- <span class="flex h-5 w-5 absolute" v-if="item.completed">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 relative inline-flex rounded-full text-green-500 opacity-40"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                </svg>
            </span> -->

            <div class="flex gap-2 justify-center">
                <div
                    :class="[
                        item.completed
                            ? 'bg-gradient-to-r from-indigo-200 via-pink-100 to-purple-100 shadow-none'
                            : '',
                    ]"
                    class="transition ease-in-out duration-300 w-full h-12 border shadow-sm bg-gray-50 rounded-lg flex justify-start items-center px-3 shadow-white"
                >
                    <input
                        type="checkbox"
                        @change="updateCheck()"
                        v-model="item.completed"
                        class="w-6 h-6 flex justify-center items-center"
                    />
                    <span
                        :class="[
                            item.completed ? 'line-through text-black' : '',
                        ]"
                        class="ml-4 text-black font-semibold text-lg w-full capitalize"
                    >
                        {{ item.name }}
                    </span>
                    <span
                        v-if="item.completed"
                        class="ml-4 text-black text-sm font-bold w-full flex justify-center items-center transition-all duration-1000"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 mr-2"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                        {{ item.completed_at }}
                    </span>
                    <button
                        @click="removeItem()"
                        class="trashcan flex justify-center items-center"
                        v-if="!item.completed"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                            />
                        </svg>
                    </button>
                </div>
                <span
                    v-if="!item.completed"
                    :class="[
                        item.completed
                            ? 'bg-gradient-to-l from-indigo-200 via-pink-100 to-purple-100'
                            : '',
                    ]"
                    class="w-1/4 h-12 border shadow-sm bg-white rounded-lg flex justify-center text-sm font-semibold items-center px-1"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 mr-2"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>
                    {{ new Date(item.created_at).toLocaleString("VI-vi") }}
                </span>
                <span
                    v-else
                    class="relative w-1/4 h-12 font-mono uppercase text-green-600 font-bold text-xl border shadow-sm bg-gradient-to-l from-indigo-200 via-pink-100 to-purple-100 rounded-lg flex justify-center items-center px-1"
                >
                    Completed
                </span>
            </div>
        </li>
    </div>
</template>

<script>
export default {
    props: ["item"],
    methods: {
        updateCheck() {
            axios
                .put("/api/item/" + this.item.id, {
                    item: this.item,
                })
                .then((response) => {
                    if (response.status == 200) {
                        this.$emit("itemchanged");
                        if (response.data.completed) {
                            this.$notify({
                                title: "Success",
                                text: `${this.item.name} is completed`,
                                type: "success",
                            });
                        } else {
                            this.$notify({
                                title: "Success",
                                text: `${this.item.name} is uncompleted`,
                                type: "success",
                            });
                        }
                    }
                })
                .catch((error) => {
                    console.log(error);
                    this.$notify({
                        type: "error",
                        title: `Error`,
                        text: "Ops, Something went wrong !",
                    });
                });
        },
        removeItem() {
            if (confirm("Do you really want to delete this job ?")) {
                axios
                    .delete("/api/item/" + this.item.id)
                    .then((response) => {
                        if (response.status == 200) {
                            this.$emit("itemchanged");
                            this.$notify({
                                type: "error",
                                title: `Success`,
                                text: "Job remove successfully !",
                            });
                        }
                    })
                    .catch((error) => {
                        console.log(error);
                        this.$notify({
                            type: "error",
                            title: `Error`,
                            text: "Ops, Something went wrong !",
                        });
                    });
            }
        },
    },
};
</script>
<style scoped>
.completed {
    text-decoration: line-through;
    color: #ffffff;
}
.trashcan {
    border: none;
    color: #ff0000;
    outline: none;
    cursor: pointer;
}
.bg-completed {
    background-color: rgb(38, 231, 38);
    /* opacity: 0.8; */
}
</style>
