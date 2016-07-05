<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2016, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2016, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Language Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/helpers/language_helper.html
 */

// ------------------------------------------------------------------------
//          above comment/license is from CodeIgniter 3 base file
// ------------------------------------------------------------------------

/**
 * CodeIgniter Language Sprintf Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Application/Helpers
 * @category	Application/Helpers
 * @author		Link Wang (Kannushi Link)
 * @link		https://github.com/KannushiLink/CI_Language_Sprintf/
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
 * the rest is as same as sprintf() or printf()
 * http://php.net/manual/en/function.sprintf.php
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
/* End of file language_sprintf_helper.php */
/* Location: ./application/helpers/language_sprintf_helper.php */