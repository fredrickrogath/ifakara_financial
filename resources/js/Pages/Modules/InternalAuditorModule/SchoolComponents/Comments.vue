<template>
    <div>
        <div class="flex-1 p-2 sm:p-6 justify-between flex flex-col h-screen">
            <div
                class="d-flex justify-content-between pr-2 border-b-2 font-bold border-gray-100"
            >
                <div class="mt-0 pt-0 pb-2">
                    <v-icon
                        class="ml-1 pr-0 mr-0"
                        size="22"
                        @click="setCommentView()"
                    >
                        mdi-keyboard-backspace
                    </v-icon>
                </div>

                <div class=" ">
                    <span v-if="isTyping">I am Typing...</span>
                </div>

                Comments on Notification #{{ getNotificationId }}
            </div>
            <div class="flex sm:items-center justify-between"></div>
            <div
                id="messages"
                class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch"
            >
                <div
                    class="chat-message"
                    ref="messagesContainer"
                    v-for="comment in comments"
                    :key="comment.id"
                >
                    <div
                        v-if="comment.from_role == 4"
                        class="flex items-end justify-end"
                    >
                        <div
                            class="flex flex-col space-y-2 font-bold max-w-xs mx-2 order-1 items-end"
                        >
                            <div>
                                <span
                                    class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white"
                                    >{{ comment.body }}</span
                                >
                            </div>
                        </div>
                        <img
                            src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                            alt="My profile"
                            class="w-6 h-6 rounded-full order-2"
                        />
                    </div>

                    <div v-else="comment.to_role == 3" class="flex items-end">
                        <div
                            class="flex flex-col space-y-2 font-bold max-w-xs mx-2 order-2 items-start"
                        >
                            <div class="d-flex">
                                <span
                                    class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600"
                                    >{{ comment.body }}</span
                                >
                                <h6 class="pl-2 text-gray-500">
                                    {{
                                        comment.from_role == 3
                                            ? "Academic"
                                            : "Head"
                                    }}
                                </h6>
                            </div>
                        </div>
                        <img
                            src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                            alt="My profile"
                            class="w-6 h-6 rounded-full order-1"
                        />
                    </div>
                </div>
            </div>
            <div class="border-t-2 border-gray-200 px-1 pt-1 mb-5 sm:mb-0">
                <div class="relative flex">
                    <input
                        v-model="body"
                        @keyup="onKeyUp"
                        type="text"
                        placeholder="Write your message!"
                        class="w-full font-bold focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-2 bg-gray-200 rounded-md py-2"
                    />

                    <div
                        class="absolute right-0 items-center inset-y-0 hidden sm:flex"
                    >
                        <button
                            @click="sendComment()"
                            type="button"
                            class="inline-flex items-center justify-center rounded-lg px-4 py-2 transition duration-500 ease-in-out text-white bg-blue-600 hover:bg-blue-400 focus:outline-none"
                        >
                            <span class="font-bold">Send</span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                class="h-6 w-6 ml-2 transform rotate-90"
                            >
                                <path
                                    d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"
                                ></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        this.showLoader = true;
        this.getComments();

        // Receiving broadicasting
        window.Echo.channel("secretary-detect-new-comments").listen(
            "Api\\Secretary\\CommentEvent",
            (e) => {
                // console.log('abc');
                this.getComments();
            }
        );

        // scroll to the bottom of messages container
        // this.$nextTick(() => {
        //     const messagesContainer = this.$refs.messagesContainer;
        //     messagesContainer.scrollTo({
        //         top: messagesContainer.scrollHeight,
        //         behavior: "smooth",
        //     });
        // });

        // console.log(this.$refs.messagesContainer);
    },

    data() {
        return {
            echo: null,
            body: "",
            notificationId: null,
            comments: [],
            isTyping: false,
        };
    },
    computed: {
        //Add computed properties
        getNotificationId() {
            this.notificationId =
                this.$store.getters["SecratarySchoolModule/getNotificationId"];
            return this.$store.getters[
                "SecratarySchoolModule/getNotificationId"
            ];
        },

        getMainUrl() {
            return this.$store.getters["SystemConfigurationsModule/getMainUrl"];
        },
    },
    watch: {
        //Add watchers...
        notificationId(newVal, oldVal) {
            if (newVal !== null) {
                this.getComments();
            }
            // console.log(
            //     `The message has changed from "${oldVal}" to "${newVal}"`
            // );
        },
    },
    methods: {
        //Add methods...
        setCommentView() {
            this.$store.dispatch("SecratarySchoolModule/setCommentView");
        },

        scrollToBottom() {
            this.$refs.messagesContainer.scrollTop =
                this.$refs.messagesContainer.scrollHeight;
        },

        async getComments() {
            axios
                .post(this.getMainUrl + "secretary/getComments", {
                    id: this.getNotificationId,
                })
                .then((response) => {
                    this.comments = response.data.data;

                    // scroll to the bottom of messages container
                    // this.$nextTick(() => {
                    //     const messagesContainer = this.$refs.messagesContainer;
                    //     messagesContainer.scrollTo({
                    //         top: messagesContainer.scrollHeight,
                    //         behavior: "smooth",
                    //     });
                    // });
                    // this.amount = "";
                    // this.narration = "";
                    // this.getSchoolPermissions();
                    // console.log(response.data.data);
                });
            // handle response here
        },

        async sendComment() {
            axios
                .post(this.getMainUrl + "secretary/sendComment", {
                    id: this.getNotificationId,
                    body: this.body,
                })
                .then((response) => {
                    // this.students = response.data.data;
                    this.body = "";
                    // this.narration = "";
                    // this.getSchoolPermissions();
                    // console.log(response.data.data);
                });
            // handle response here
        },

        onKeyUp() {
            // window.Echo.channel("secretary-detect-new-comments").dispatch(
            //     "typing",
            //     {
            //         user: this.$page.props.user,
            //     }
            // );

            this.isTyping = true;
            setTimeout(() => {
                this.isTyping = false;
            }, 2000);
        },
    },
};
</script>

<style>
.scrollbar-w-2::-webkit-scrollbar {
    width: 0.25rem;
    height: 0.25rem;
}

.scrollbar-track-blue-lighter::-webkit-scrollbar-track {
    --bg-opacity: 1;
    background-color: #f7fafc;
    background-color: rgba(247, 250, 252, var(--bg-opacity));
}

.scrollbar-thumb-blue::-webkit-scrollbar-thumb {
    --bg-opacity: 1;
    background-color: #edf2f7;
    background-color: rgba(237, 242, 247, var(--bg-opacity));
}

.scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
    border-radius: 0.25rem;
}
</style>
