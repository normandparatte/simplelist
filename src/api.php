<?php
// -----------------------------------------------------------------------
// ----- Connexion via PDO -----------------------------------------------
// -----------------------------------------------------------------------
try {
  $db = new PDO("mysql:host=XXX;dbname=XXX;charset=utf8", "XXX", "XXX");
}catch( PDOException $Exception ) {
    echo $Exception->getMessage();
}

// -----------------------------------------------------------------------
// ----- Diverses méthodes -----------------------------------------------
// -----------------------------------------------------------------------
// Permet de sécuriser une chaine
function safeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}

// --------------------------------------------------------------------------
// ----- Controle du souhait de l'utilisateur et execution de la requete ----
// --------------------------------------------------------------------------
$json = ['status' => 'ok'];

if($_GET['requete']=='SELECT_COURSES'){
  // ----- SELECT des courses
  $query = $db->query("SELECT * FROM courses");

  if ($query->rowCount() > 0) {

    $courses = $query->fetchAll(PDO::FETCH_OBJ);

    foreach ($courses as $course) {
      $json['courses'][] = [
        'pk_courses' => $course->pk_courses,
        'nom_courses' => $course->nom_courses,
        'qte_courses' => $course->qte_courses
      ];
    }

  }
}else if($_GET['requete']=='INSERT_COURSES'){
  // ----- INSERT d'une course
  $course = safeInput($_GET['course']);
  $qte = safeInput($_GET['qte']);

  // Test les champs obligatoires
  if ($course) {

    $query = $db->prepare("INSERT INTO courses (nom_course, qte_courses)
      VALUES (:course, :qte)");
    $query->execute(['course' => $course, 'qte' => $qte]);

    $json['course'] = [
      'pk_courses' => $db->lastInsertId(),
      'nom_courses' => $nom_courses,
      'qte_courses' => $qte_courses
    ];

  }else{
    $json['status'] = 'fail';
  }
}else{
  $json['status'] = 'fail';
}

// Renvoi de l'objet json
echo json_encode($json);