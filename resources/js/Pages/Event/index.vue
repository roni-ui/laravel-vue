<template>
    <ol type="1">
        <li v-for="event in events" :key="event.id">
            <h3>{{event.id}}. {{event.title}}</h3>
            <p>{{event.description}}</p>
            <hr>
            <p>{{event.location}}</p>
            <hr>
            <p>{{event.datetime}}</p>
        </li>
    </ol>
</template>

<script setup>
defineProps(["events"]);
</script>
