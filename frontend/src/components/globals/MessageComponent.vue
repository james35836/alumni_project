<template>
    <div class="message self">
        <strong class="user">{{ message.user.name }}</strong>
        <p class="body">{{ message.body }}</p>
    </div>
</template>

<script>
    export default {
        props: ['message']
    }
</script>