<html>
<head>
    <?php
    echo "\n" . link_tag( 'assets/css/bootstrap.min.css' );
    if ( isset( $theme ) ) {
        echo "\n" . link_tag( 'assets/css/' . $theme . '.min.css' );
    } else {
        echo "\n" . link_tag( 'assets/css/bootstrap-theme.min.css' );
    }
    echo "\n" . link_tag( 'assets/js/bootstrap.min.js' );
    ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <title>
        <?php $__element = 'title'; ?>
        <?php if ( isset( $$__element ) ): ?>
            <?php echo $__element; ?>
        <?php else: ?>
            <?php if ( ENVIRONMENT != 'production' ): ?>
                <?php echo 'Missing' . $__element . ', please check the variables you are passing to the view'; ?>
            <?php endif; ?>
        <?php endif; ?>
    </title>
</head>

<body>

<?php
?>

<div id="div_everything_wrapper">

    <div id="div_topbar_wrapper">
        <?php $__element = 'top_bar_view'; ?>
        <?php if ( isset( $$__element ) ): ?>
            <?php echo $$__element; ?>
        <?php else: ?>
            <?php if ( ENVIRONMENT != 'production' ): ?>
                <?php echo 'Missing ' . $__element . ', please check the variables you are passing to the view'; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <div class="break">
    </div>

    <div id="div_torso_wrapper">

        <div id="div_navigation_menu">
            <?php $__element = 'main_menu_view'; ?>
            <?php if ( isset( $$__element ) ): ?>
                <?php echo $$__element; ?>
            <?php else: ?>
                <?php if ( ENVIRONMENT != 'production' ): ?>
                    <?php echo 'Missing ' . $__element . ', please check the variables you are passing to the view'; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <div id="div_main_content">
            <?php $__element = 'main_content_view'; ?>
            <?php if ( isset( $$__element ) ): ?>
                <?php echo $$__element; ?>
            <?php else: ?>
                <?php if ( ENVIRONMENT != 'production' ): ?>
                    <?php echo 'Missing ' . $__element . ', please check the variables you are passing to the view'; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>

    </div>

    <div class="break">
    </div>

    <div id="div_footer_wrapper">
        <table width="100%">
            <tr width="100%">
                <td width="25%" align="left">
                    <b>
                        <!-- Can't pre-render this, as it'll throw the reported results -->
                        Rendered in {elapsed_time}s, and {memory_usage}.
                    </b>
                </td>
            </tr>
        </table>
    </div>
</div>


</body>
</html>