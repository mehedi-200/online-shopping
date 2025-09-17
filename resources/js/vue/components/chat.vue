<template>

    <div class="sidebar">
        <!-- Profile Header -->
        <div class="profile-header">
            <img :src="logoUrl" alt="Profile" class="profile-pic">
            <h5 class="mb-0">{{userDetails.name}}</h5>

        </div>

        <!-- Search Bar -->
        <div class="search-container">
            <div class="search-box d-flex align-items-center">
                <i class="bi bi-search"></i>
                <input type="text" class="form-control border-0 bg-transparent" placeholder="Search Messenger">
            </div>
        </div>

        <!-- Contact List -->
        <div class="contact-list">

            <!-- Contact Item -->
            <div v-for="user in activeUser" :key="user.id">
                <router-link :to="`/message/${userDetails.id}/${user.id}`">
                    <div class="contact-item" >
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Jane Smith" class="contact-avatar">
                        <div class="contact-details">
                            <div class="contact-name">{{user.name}}</div>
                            <div class="message-preview">
                                <span class="preview-text">{{messageCount[user.id]?.last_message || 'no message'}}</span>
                                <span class="message-time">2:35 PM</span>
                            </div>
                        </div>
                    </div>
                </router-link>
            </div>


        </div>
    </div>

</template>

<script>
import axios from "axios";
import Echo from "laravel-echo";
import Pusher from "pusher-js";
export default {
    props: {
        logoUrl: String,
        userDetails: Object
    },
    data(){
        return {
            activeUser: [],
            messageCount:[],
            sender_id : null,
            receiver_id : null
        }
    },
    methods: {
        async GetActiveUser() {
            try {
                const response = await axios.get('/api/user');
                this.activeUser = response.data.users; // এখানে .users হবে
                console.log(response.data.users);
                console.log(response.data.messages);
            } catch (error) {
                console.log(`Active user data error ${error}`);
            }
        },
        formatMessages(messages) {
            messages.forEach((message) => {
                // Store message data in messageCount object based on sender_id
                this.$set(this.messageCount, message.sender_id, {
                    delivered_count: message.delivered_count, // Delivered message count
                    last_message: message.last_message, // Last message content
                    last_message_time: message.last_message_time, // Last message timestamp
                });
            });
        },

    },
    mounted() {
        this.GetActiveUser();
        setInterval(()=>this.GetActiveUser(),5000);
    }


};
</script>
<style>
.sidebar {
    width: 360px;
    height: 100vh;
    border-right: 1px solid #e9ecef;
    background: white;
}

/* Profile Section */
.profile-header {
    padding: 15px;
    display: flex;
    align-items: center;
    border-bottom: 1px solid #e9ecef;
}
.profile-pic {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 12px;
    object-fit: cover;
}

/* Search Bar */
.search-container {
    padding: 12px 15px;
    border-bottom: 1px solid #e9ecef;
}
.search-box {
    background: #f0f2f5;
    border-radius: 20px;
    padding: 8px 15px;
}
.search-box i {
    color: #65676b;
    margin-right: 8px;
}

/* Contact List */
.contact-list {
    overflow-y: auto;
    height: calc(100vh - 126px);
}
.contact-item {
    display: flex;
    align-items: center;
    padding: 12px 15px;
    cursor: pointer;
}
.contact-item:hover {
    background: #f5f6f7;
}
.contact-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 12px;
    object-fit: cover;
}
.contact-details {
    flex: 1;
    min-width: 0;
}
.contact-name {
    font-weight: 600;
    margin-bottom: 2px;
}
.message-preview {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.preview-text {
    color: #65676b;
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin-right: 8px;
}
.message-time {
    color: #65676b;
    font-size: 12px;
    flex-shrink: 0;
}
</style>
