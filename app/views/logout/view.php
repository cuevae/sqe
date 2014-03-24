<h1>EmployMe 0.1 <small>&beta;</small></h1>
<h3>You have been logged out. Thanks for using our services.</h3>

<?php if ( isset( $_error ) && !empty( $_error ) ): ?>
    <div>
        <p><?= $_error ?></p>
    </div>
<?php elseif ( isset( $_success ) && !empty( $_success ) ): ?>
    <div>
        <p><?= $_success ?></p>
    </div>
<?php endif; ?>