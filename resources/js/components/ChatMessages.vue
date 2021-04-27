<template>
    <ul class="chat">
        <li class="left clearfix" v-for="message in messages">

            <div class="chat-body clearfix">
                <div class="header" >
                    <strong v-if="message.firstname!==null" class="primary-font">
                        {{ message.firstname}}
                    </strong>
                    <strong v-if="message.firstname==null" class="primary-font">
                        {{  message.user.firstname}}
                    </strong>


                </div>
                <p>

                    {{ message.message }}
                </p>

            </div>
        </li>
    </ul>
</template>

<script>

export default {
    props: ['messages','users']
};


</script>
