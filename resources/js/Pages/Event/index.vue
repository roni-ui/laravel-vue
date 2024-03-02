<template>
  <div class="grid grid-cols-1 gap-4 py-4">
    <div v-if="$page.props.flash.notif" class="bg-green-300 p-4 rounded-md">
      {{ $page.props.flash.notif }}
    </div>
    <div class="px-5">
      <a
        href="/events/create"
        class="bg-blue-600 hover:bg-blue-800 p-4 rounded-md text-white sha"
        >Create New Event</a
      >
    </div>
    <ol
      type="1"
      class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5 p-4"
    >
      <li
        v-for="event in events"
        :key="event.id"
        class="bg-green-200 px-8 py-3 rounded-md shadow-lg"
      >
        <h3>{{ event.id }}. {{ event.title }}</h3>
        <p>{{ event.description }}</p>
        <hr />
        <p>{{ event.location }}</p>
        <hr />
        <p>{{ event.datetime }}</p>
        <div class="mt-2">
          <a :href="'/events/'+event.id+'/edit'" class="bg-yellow-300 p-2 h-10">Edit</a>
          <button @click="handleDelete(event.id)" type="button" class="bg-red-300 p-2 h-10">Hapus</button>
        </div>
      </li>
    </ol>
  </div>
</template>

<script setup>
import { router } from "@inertiajs/vue3";

defineProps(["events"]);
function handleDelete(id){
    if(confirm("Yakin Menghapus Data Ini?")){
        router.delete('/events/' + id);
    };
};
</script>
