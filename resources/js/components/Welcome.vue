<template>
    <ul className="chat">
        <li className="left clearfix" v-for="room in rooms">
            <div className="chat-body clearfix">
                <div className="header">
                    <strong className="primary-font">
                        {{ room.id }}
                    </strong>
                </div>
                <p>
                </p>
            </div>
        </li>
    </ul>
</template>

<script>
export default {
    props: ['rooms']
};
</script>
