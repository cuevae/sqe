<?php
/**
 * Created by PhpStorm.
 * User: manei
 * Date: 04/03/14
 * Time: 11:22
 */


/**
 * Formats a numbers as bytes, based on size, and adds the appropriate suffix
 *
 * @access	public
 * @param	mixed	// will be cast as int
 * @return	string
 */
if ( ! function_exists('is_positive_int'))
{
    function is_positive_int( $int )
    {
        return ( is_numeric( $int ) && $int > 0 && $int == round( $int ) );
    }
}
