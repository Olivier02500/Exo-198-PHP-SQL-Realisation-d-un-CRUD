<?php

/**create a new user
 * @param $nom
 * @param $prenom
 * @param $age
 * @param $db
 */
function addUser($nom, $prenom, $age, $db) {
    $sql = " INSERT INTO user (nom, prenom, age)
             VALUES ('$nom', '$prenom', $age)";
    $db->exec($sql);
    echo 'student as added !';
}

/**return all data
 * @param $db
 */
function allData($db){
    $stmt = $db->prepare("SELECT * FROM user");
    if ($stmt->execute()){
        foreach ($stmt->fetchAll() as $student){
            echo "<p>". $student['id']   ."</p>".
                "<p>". $student['nom'] ."</p>".
                "<p>". $student['prenom']."</p>".
                "<p>". $student['age'] ."</p>";
        }
    }
}

/**Function for Update a user
 * @param $idStudent
 * @param $name
 * @param $fname
 * @param $year
 * @param $bd
 */

function updateUser($idStudent, $name, $fname, $year,  $bd){
    $stmt = $bd->prepare("UPDATE user SET name = :non, fname = :prenom, year = :age WHERE id = :id");

    $stmt->bindParam(':non', $name);
    $stmt->bindParam(':prenom', $fname);
    $stmt->bindParam(':age', $year);
    $stmt->bindParam(':id', $idStudent);

    $stmt->execute();

    echo 'User as update !';
}

/**Destroy a user
 * @param $idStudent
 * @param $bd
 */
function delete($idStudent, $bd){
    $sql = "DELETE FROM user WHERE id = $idStudent";
    if ($bd->exec($sql)){
        echo "User $idStudent as delete";
    }
}