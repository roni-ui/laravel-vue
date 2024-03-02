<template>
  <div class="p-4">
    <h1>Create New Event</h1>
    <form @submit.prevent="handleSubmit">
      <div class="flex flex-row space-x-8 items-center">
        <label for="">Title</label>
        <input type="text" class="h-6" v-model="form.title" />
      </div>
      <div class="flex flex-row space-x-8 items-center">
        <label for="">Description</label>
        <input type="text" class="h-6" v-model="form.description" />
      </div>
      <div class="flex flex-row space-x-8 items-center">
        <label for="">Location</label>
        <input type="text" class="h-6" v-model="form.location" />
      </div>
      <div class="flex flex-row space-x-8 items-center">
        <label for="">Date Time</label>
        <input type="date" class="h-6" v-model="form.datetime" />
      </div>
      <button type="submit" class="bg-blue-300 hover:bg-blue-600 p-4">Submit</button>
    </form>
  </div>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
  title: "",
  description: "",
  location: "",
  datetime: null,
});

function handleSubmit () {
    form.post("/events/store");
}

</script>
