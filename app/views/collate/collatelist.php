<?php
/**
 * Created by PhpStorm.
 * User: Adeyeni
 * Date: 13/03/14
 * Time: 11:44
 */
?>

Qualified Applicants

<?php //print_r($results); ?>

<?php if ( isset( $results ) && empty( $results ) ): ?>
    <h3>No results found</h3>
<?php endif; ?>

<?php if ( isset( $results ) && !empty( $results ) ): ?>
    <ol>
        <?php foreach ( $results as $key => $result ): ?>
            <li>
                <h3><?= $result['forename1'] ?></h3>
                <p><?=$result['courseName']?></p>
            </li>
        <?php endforeach; ?>
    </ol>
<?php endif; ?>

<?php
/*echo "<br/>";
foreach ( $result as $row ) {
    echo $row->Persons_idUser;
    echo "<br/>";
}

*/?>
