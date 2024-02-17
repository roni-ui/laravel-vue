<template>
    <ol type="1">
        <li v-for="post in posts" :key="post.id">
            <h3>{{post.id}}. {{post.title}}</h3>
            <p>{{post.description}}</p>
            <hr>
        </li>
    </ol>
</template>

<script setup>
defineProps(["posts"]);
</script>
