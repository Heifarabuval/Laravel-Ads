<template>
    <div class="input-group">
        <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage">
        <input hidden id="room"  name="room"   v-model="newMessage" @keyup.enter="sendMessage">
        <input hidden id="ad"  name="ad"   v-model="newMessage" @keyup.enter="sendMessage">
        <span class="input-group-btn">
            <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
                Send
            </button>
        </span>
    </div>
</template>

<script>
export default {
    props: ['user','room','ad'],

    data() {
        return {
            newMessage: ''
        }
    },

    methods: {
        sendMessage() {

            this.$emit('messagesent', {
                user: this.user,
                ad: this.ad,
                message: this.newMessage,
                room: this.room
            });

            this.newMessage = ''
        }
    }
}
</script>
