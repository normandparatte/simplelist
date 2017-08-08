<template>
  <div>
    <h1>Liste des courses</h1>
    <div v-for="(course , index) in listeCourses" v-bind:key="course">
      <h2>{{course.qte}} - {{course.nom}}</h2>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  created () {
    /* eslint-disable */
    let listeCourses=[];
      axios.get(`http://localhost:80/api.php?requete=SELECT_COURSES`).then((response) => {
        let listeNomCourses=response.data.courses.map(item => item.nom_courses);     
        let listeQteCourses=response.data.courses.map(item => item.qte_courses);  
        listeNomCourses.forEach((nom, index) => {
          listeCourses.push({
            nom: listeNomCourses[index],
            qte: listeQteCourses[index],
          });
        });
      }).catch(function (error) {
        console.log(error);
      });      
    this.listeCourses=listeCourses;    
  },
  data(){
    return {
      listeCourses: []
    };
  }
};
</script>

<style>
</style>
