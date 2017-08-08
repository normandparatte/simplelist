<template>
  <div>
    <h1>Liste des courses</h1>
    <div v-for="(course , index) in listeCourses" v-bind:key="course">
      <h2>{{course.nom}}</h2>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    /* eslint-disable */
    let listeCourses=[];
    listeCourses.push({
      pk: 1,
      nom: "Lait",
      qte: 2       
    });
    listeCourses.push({
      pk: 3,
      nom: "Oeufs",
      qte: 6       
    });
    this.listeCourses=listeCourses;
  }
};
</script>

<style>
</style>
