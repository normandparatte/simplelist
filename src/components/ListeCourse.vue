<template>
  <div>
    <h1>Liste des courses</h1>
    <div v-for="(course , index) in listeCourses" v-bind:key="course">
      <h2>{{course.qte_courses}} - {{course.nom_courses}}</h2>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  created () {
    axios.get(`/api.php?requete=SELECT_COURSES`).then((response) => {
      this.listeCourses = response.data.courses;
    }).catch(function (error) {
      console.log(error);
    });
  },
  data () {
    return {
      listeCourses: []
    };
  }
};
</script>

<style>
</style>
