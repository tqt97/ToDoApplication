<template>
    <div>
        <div
            class="w-full m-auto flex items-center justify-center content-center mb-10"
        >
            <div class="relative w-full">
                <div
                    class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none"
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
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"
                        />
                    </svg>
                </div>
                <input
                    type="text"
                    v-model="item.name"
                    v-on:reloadlist="getList()"
                    class="w-full bg-white border text-gray-800 focus:text-black text-md rounded-l-lg focus:outline-none block pl-10 p-3"
                    placeholder="Type your todo ..."
                />
            </div>
            <button
                :class="[item.name ? 'active' : 'inactive', 'plus']"
                @click="addItem()"
                class="opacity-50 rounded-r-lg bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:outline-none focus:ring-purple-300 text-center p-2 transition ease-in-out duration-100"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-8 w-8 text-white font-bold"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                    />
                </svg>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            item: {
                name: "",
            },
        };
    },
    methods: {
        addItem() {
            if (this.item.name == "") {
                return;
            }
            axios
                .post("/api/item/store", {
                    item: this.item,
                })
                .then((response) => {
                    if (response.status == 201) {
                        this.item.name = "";
                        this.$emit("reloadlist");
                        this.$notify({
                            type: "success",
                            title: `Success`,
                            text: "Add todo item successfully !",
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
        },
    },
};
</script>
<style scoped>
.active {
    color: #00ce25;
    opacity: 1;
}
.inactive {
    color: #999999;
}
</style>
