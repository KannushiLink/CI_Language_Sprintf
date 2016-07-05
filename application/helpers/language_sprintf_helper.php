<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package     CodeIgniter
 * @author      ExpressionEngine Dev Team
 * @copyright   Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license     http://codeigniter.com/user_guide/license.html
 * @link        http://codeigniter.com
 * @since       Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Language Helpers
 *
 * @package     CodeIgniter
 * @subpackage  Helpers
 * @category    Helpers
 * @author      Link Wang
 * @link        http://codeigniter.com/user_guide/helpers/language_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Lang_with_var
 *
 * Fetches a language variable
 * and replace %(num)$s in line with extra variables
 * 
 * Like sprintf, but first param is CI language line
 *
 * only support string %(num)$s replace!
 *
 * @access  public
 * @param   string  the language line
 * @param   string  the string that will replace %(num)$s
 * @return  string
 */
if ( ! function_exists('lang_with_var'))
{
    function lang_with_var($line)
    {
        $CI =& get_instance();
        $line = $CI->lang->line($line);

        for ($i = 1; $i < func_num_args(); $i+=1) {
            // $line = func_get_arg($i);
            $line = str_replace('%' . $i .'$s', func_get_arg($i), $line);
        }

        return $line;
    }
}

/**
 * Lang_sprintf
 *
 * Fetches a language variable
 * and replace % control word in line with extra variables
 * 
 * Like sprintf, but first param is CI language line
 *
 * @access  public
 * @param   string  the language line
 * @param   string  the string that will replace % control word
 * @return  string
 */
if ( ! function_exists('lang_sprintf'))
{
    function lang_sprintf($line)
    {
        $CI =& get_instance();
        $line = $CI->lang->line($line);

        $args = array();
        $args[] = $line;
        for ($i = 1; $i < func_num_args(); $i+=1) {
            $args[] = func_get_arg($i);
        }
        $line = call_user_func_array("sprintf", $args);

        return $line;
    }
}

// ------------------------------------------------------------------------
/* End of file language_helper.php */
/* Location: ./system/helpers/language_helper.php */