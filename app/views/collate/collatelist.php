<?php
/**
 * Created by PhpStorm.
 * User: Adeyeni
 * Date: 13/03/14
 * Time: 11:44
 */
?>

<h3>Qualified applicants</h3>

<?php if ( isset( $_error ) && !empty( $_error ) ): ?>
    <div>
        <p><?= $_error ?></p>
    </div>
<?php elseif ( isset( $_success ) && !empty( $_success ) ): ?>
    <div>
        <p><?= $_success ?></p>
    </div>
<?php endif; ?>

 <?php // print_r($results); ?>
     <?php $this->load->helper('url'); ?>
<?php if ( isset( $results ) && empty( $results ) ): ?>
    <p>No results found</p>
<?php endif; ?>

<?php if ( isset( $results ) && !empty( $results ) ): ?>
    <ol>
        <?php foreach ( $results as $key => $result ): ?>
            <li>
                <p><a href="<?=site_url() . '/curriculum/view/' . $result['idUser']?>"><?= $result['forename1'] ?>
                <?=$result['surname']?><a/></p>
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
