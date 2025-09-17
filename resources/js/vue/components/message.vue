

<template>
    <div class="chat-container ">
        <!-- Enhanced Header -->
        <div class="header">
            <div class="header-content">
                <router-link to="/">
                <i class="bi bi-arrow-left back-arrow"></i>
                </router-link>
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="profile-pic" alt="Profile">
                <div class="contact-info">
                    <div class="contact-name">{{user.name}}</div>
                </div>
            </div>
            <div class="header-icons">
                <i class="bi bi-telephone-plus-fill header-icon"></i>
                <i class="bi bi-camera-video-fill header-icon"></i>
                <i class="bi bi-three-dots-vertical header-icon"></i>
            </div>
        </div>

        <!-- Messages -->
        <div class="messages"  style="padding-bottom: 80px;">
            <div v-for="message in messages" :key="message.id" v-if="message !== ''" >
                <div class="message received"  v-if="message.sender_id !== userDetails.id" ref="messageContainer">
                    {{message.message}}
                    <div class="time">{{formatTime(message.created_at)}}</div>
                </div>

                <div class="message sent" v-else ref="messageContainer">
                    {{message.message}}
                    <div class="time">{{formatTime(message.created_at)}}</div>
                    <div class="time text-white">{{message.status}}</div>
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="input-area">
            <div class="input-group">
            <span class="plus-btn">
                <i class="bi bi-plus-circle-fill"></i>
            </span>
                <div class="input-wrapper">
                    <form @submit.prevent="submitForm" ref="submitRefs">
                        <input type="text" v-model="userMessage" class="chat-input" placeholder="Type a message...">
                        <i class="bi bi-emoji-smile input-icon emoji-btn"></i>
                        <i @click="sendMessageSubmitForm"  class="bi bi-send-fill input-icon send-btn"></i>
                    </form>
                </div>
            </div>
        </div>
    </div>

</template>
<script>

import axios from "axios";

export default {
    props: {
        logoUrl: String,
        userDetails: Object
    },
    data(){
        return {
            intervalId:null,
            intervalId2:null,
            messages:[],
            user:[],
            sender_id:null,
            receiver_id:null,
            noTextAlert:'',
            userMessage:null,
        }
    },
    mounted() {
        this.userMessageShow();
        this.intervalId= setInterval(()=>this.userMessageShow(),1000);
        this.updateStatus();
        this.intervalId2 = setInterval(()=> this.updateStatus(),1000);
    },
    beforeUnmount(){
        clearInterval(this.intervalId);
        clearInterval(this.intervalId2);
    },
    watch:
        {
            // $route(to,from)
            // {
            //     this.userMessageShow();
            //
            // }
        },
    methods: {
        async updateStatus()
        {
            try {
               const response = await axios.post('/api/user/update-status',{
                    sender_id : this.$route.params.sender_id,
                    receiver_id : this.$route.params.receiver_id
                });
            } catch (error) {
                if (error.response) {
                    console.log('Error Response:', error.response.data.message);
                } else if (error.request) {
                    console.log('Error Request:', error.request);
                } else {
                    console.log('Error:', error.message);
                }
            }
        },

         async userMessageShow()
        {
            const sender_d = this.$route.params.sender_id;
            const receiver_d = this.$route.params.receiver_id;
            this.sender_id = sender_d;
            this.receiver_id = receiver_d;

            try{
                const response = await axios.get(`/api/user/message/${sender_d}/${receiver_d}`);
                this.messages = response.data.messages;
                this.user = response.data.user;
                console.log(response.data.user);


            } catch (error)
            {
                console.log(error);

            }
        },
        formatTime(timestamp) {
            const date = new Date(timestamp);
            let hours = date.getHours();
            let minutes = date.getMinutes();
            let ampm = hours >= 12 ? 'PM' : 'AM';

            hours = hours % 12;
            hours = hours ? hours : 12; // 12-hour format
            minutes = minutes < 10 ? '0' + minutes : minutes;

            return `${hours}:${minutes} ${ampm}`;
        },
        async submitForm()
        {
            if (!this.sender_id || !this.receiver_id || !this.userMessage)
            {

                this.noTextAlert = 'Write message first then try to sent';
                return
            }
            try{
                const response = await axios.post('/api/user/send-message', {
                    sender_id: this.sender_id,
                    receiver_id: this.receiver_id,
                    message: this.userMessage
                });
                this.noMessageAlert = '';
                this.userMessage='';
                this.scrollToBottom();
            } catch (error)
            {
                console.log(`Send message form ${error}`);
            }
        },
        sendMessageSubmitForm()
        {
            this.$refs.submitRefs.requestSubmit();
        },
        scrollToBottom() {
            this.$nextTick(() => {
                const container = this.$refs.messageContainer;
                if (container) {
                    container.scrollTop = container.scrollHeight;
                }
            });
        }
    }
};
</script>

<style>

.chat-container {
    display: flex;
    flex-direction: column;
    height: 90vh;
}
/* Enhanced Header */
.header {
    padding: 10px 16px;
    background: white;
    border-bottom: 1px solid #ddd;
    display: flex;
    align-items: center;
    gap: 15px;
}
.header-content {
    display: flex;
    align-items: center;
    flex-grow: 1;
}
.back-arrow {
    color: #0084ff;
    font-size: 1.5rem;
    margin-right: 10px;
}
.profile-pic {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
}
.contact-info {
    flex-grow: 1;
}
.contact-name {
    font-weight: 600;
    font-size: 1.1rem;
}
.header-icons {
    display: flex;
    gap: 25px;
    align-items: center;
}
.header-icon {
    color: #65676b;
    font-size: 1.4rem;
    transition: color 0.2s;
}
.header-icon:hover {
    color: #0084ff;
}
/* Chat Messages */
.messages {
    flex: 1;
    padding: 16px 16px 80px;
    overflow-y: auto;
    display: flex;
    flex-direction: column-reverse; /* Important for reverse scrolling */
    gap: 8px;
    background: #f0f2f5;
    box-sizing: border-box;
    scroll-behavior: smooth;
}
.message {
    max-width: 65%;
    padding: 8px 12px;
    border-radius: 18px;
    position: relative;
    word-break: break-word;
    animation: message-appear 0.2s ease-out;
}
.received {
    background: white;
    border-bottom-left-radius: 4px;
}
.sent {
    background: #0084ff;
    color: white;
    margin-left: auto;
    border-bottom-right-radius: 4px;
}
.time {
    font-size: 0.75em;
    color: #666;
    text-align: right;
    margin-top: 4px;
}
/* Improved Input Area */
.input-area {
    padding: 16px;
    background: white;
    border-top: 1px solid #ddd;
}
.input-group {
    display: flex;
    align-items: center;
    gap: 12px;
}
.input-wrapper {
    flex: 1;
    position: relative;
}
.chat-input {
    width: 100%;
    padding: 12px 50px;
    border-radius: 25px;
    border: 1px solid #ced4da;
    font-size: 15px;
}
.input-icon {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 1.3rem;
}
.emoji-btn {
    left: 18px;
    color: #65676b;
}
.send-btn {
    right: 18px;
    color: #0084ff;
}
.plus-btn {
    color: #0084ff;
    font-size: 1.8rem;
    cursor: pointer;
}
</style>

