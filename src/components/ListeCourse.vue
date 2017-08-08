<template>
  <div>
    <h1>Liste des courses</h1>
    <div v-for="(course , index) in listeCourses" v-bind:key="course">
      <h2>{{course.nom}}</h2>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  data () {
    /* eslint-disable */
    let listeCourses=[];
    /* listeCourses.push({
      pk: 1,
      nom: "Lait",
      qte: 2       
    });
    listeCourses.push({
      pk: 3,
      nom: "Oeufs",
      qte: 6       
    }); */
    axios.post(`./api.php`, {
        requete: 'INSERT_COURSES',
        course: 'Lait',
        qte: 2
      }).then((response) => {
        // let ListeIds = response.data.results.map(item => item.id);
        listeCourses=response.data.results;  
      }).catch(function (error) {
        console.log(error);
      });
    this.listeCourses=listeCourses;
    return {
      listeCourses: []
    };
  }
};
</script>

<style>
</style>
