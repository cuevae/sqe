<?php
/**
 * Created by PhpStorm.
 * User: Adeyeni
 * Date: 13/03/14
 * Time: 11:44
 */
?>

Qualified Applicants

<?php print_r($result) ?>

<?php
echo "<br/>";
foreach ( $result as $row ){
echo $row->Persons_idUser;
echo "<br/>";
}

?>
