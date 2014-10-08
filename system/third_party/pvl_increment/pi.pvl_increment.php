<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
	'pi_name' => 'Pvl Increment',
	'pi_version' => '1.0',
	'pi_author' =>'Pierre-Vincent Ledoux',
	'pi_author_email' =>'ee-addons@pvledoux.be',
	'pi_author_url' => 'http://twitter.com/pvledoux/',
	'pi_author_url' => 'http://www.twitter.com/pvledoux',
	'pi_description' => 'Auto-increment on each call in the same template',
	'pi_usage' => Pvl_increment::usage()
  );

/**
 * Copyright (c) 2013, Pv Ledoux
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *	* Redistributions of source code must retain the above copyright
 *	   notice, this list of conditions and the following disclaimer.
 *	* Redistributions in binary form must reproduce the above copyright
 *	   notice, this list of conditions and the following disclaimer in the
 *	   documentation and/or other materials provided with the distribution.
 *	* Neither the name of the <organization> nor the
 *	   names of its contributors may be used to endorse or promote products
 *	   derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL <COPYRIGHT HOLDER> BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

/**
 * Pvl_increment
 *
 * @copyright	Pv Ledoux 2013
 * @since		20 Dec 2011
 * @author		Pierre-Vincent Ledoux <ee-addons@pvledoux.be>
 * @link		http://www.twitter.com/pvledoux/
 *
 */
class Pvl_increment
{
	/**
 	 * Data returned from the plugin.
	 *
	 * @access	public
	 * @var		array
	 */
	public $return_data	= null;

	/**
	* Constructor.
	*
	* @access	public
	* @return	void
	*/
	public function __construct()
	{
		static $step;
		static $increment;

		$ee				=& get_instance();
		$start			= $ee->TMPL->fetch_param('start', 1);
		$increment_id	= $ee->TMPL->fetch_param('id', 'default_increment');
		$no_increment	= $ee->TMPL->fetch_param('increment', TRUE);
		$silent			= $ee->TMPL->fetch_param('silent', 'no');

		// Init step
		if (strtolower($no_increment) !== 'no') {
			if ( ! isset($step[$increment_id]) ) {
				$step[$increment_id] = $ee->TMPL->fetch_param('step', 1);
			}

			if ( ! isset($increment[$increment_id]) ) {
				$increment[$increment_id] = $start;
			} else {
				$increment[$increment_id] += $step[$increment_id];
			}
		}

		if ($silent !== 'no') {
			$this->return_data = NULL;
		} else {
			$this->return_data = $increment[$increment_id];
		}

	}

	/**
	* Annoyingly, the supposedly PHP5-only EE2 still requires this PHP4
	* constructor in order to function.
	*
	* @access public
	* @return void
	* method first seen used by Stephen Lewis (https://github.com/experience/you_are_here.ee2_addon)
	*/
	function Pvl_increment()
	{
		$this->__construct();
	}


	/**
	 * Usage
	 *
	 * @return string
	 */
	public static function usage()
	{
			ob_start();

	?>


Pvl Increment v. 1.0

This plugin auto-increment itself on each call.

Usage:

<p>1: {exp:pvl_increment id="my_id" start="1" step="1"}</p>
<p>2: {exp:pvl_increment id="my_id" random}</p>
<p>3: {exp:pvl_increment id="my_id" random}</p>
<p>4: {exp:pvl_increment id="my_id" random}</p>

{if {exp:pvl_increment increment="no" random} > 10}
	do something...
{/if}

Parameters:

random			is required in order to avoid tag caching (thanks to @Max_Lazar)
id 				is optional: it allows you to add many incremental loop in the same template
start="1"		is optional: define where to start incrementation (int, can be negative)
step="1"		is optional: define the incrementation step (int, can be negative)
increment="no"	is optional: returns the current count and does not increment
silent="yes"	is optional: do not output anything


	 <?php

			$buffer = ob_get_contents();
			ob_end_clean();
			return $buffer;
	}
	// --------------------------------------------------------------------

}
/* End of file pi.increment.php */
/* Location: ./system/expressionengine/third_party/increment/pi.increment.php */
