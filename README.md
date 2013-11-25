#Pvl Increment v. 1.0

This plugin auto-increment itself on each call.

##Usage:

	{exp:pvl_increment [start="1" step="1"]}
	{exp:pvl_increment random}
	{exp:pvl_increment random}
	{exp:pvl_increment random}
	
## Example:

	{exp:pvl_increment start="0" step="1"}
	{matrix_tag_pair}
		{if matrix_column_name}
			{exp:pvl_increment random}
		{/if}

		{if {exp:pvl_increment increment="no" random} > 9}
			do this...
		{if:else}
			do that...
		{/if}
	{/matrix_tag_pair}
	
See: http://expressionengine.stackexchange.com/questions/698/variables-in-templates-w-o-php-enabled

Thanks to @ginghamsburg for his contribution!

##Parameters:

<table>
  <tr>
    <td>random</td>
    <td>is required in order to avoid tag caching (thanks to @Max_Lazar)</td>
  </tr>
  <tr>
    <td>id</td>
    <td>is optional: it allows you to add many incremental loop in the same template</td>
  </tr>
  <tr>
    <td>start="1"</td>
    <td>is optional: define where to start incrementation (int, can be negative)</td>
  </tr>
  <tr>
    <td>step="1"</td>
    <td>is optional: define the incrementation step (int, can be negative)</td>
  </tr>
  <tr>
    <td>increment="yes/no"</td>
    <td>is optional: returns the current count and does not increment (default: yes)</td>
  </tr>
  <tr>
    <td>silent="yes/no"</td>
    <td>is optional: do not output (default: no)</td>
  </tr>
</table>


------------------------------------------------------
Copyright (c) 2013, Pv Ledoux
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:
    * Redistributions of source code must retain the above copyright
      notice, this list of conditions and the following disclaimer.
    * Redistributions in binary form must reproduce the above copyright
      notice, this list of conditions and the following disclaimer in the
      documentation and/or other materials provided with the distribution.
    * Neither the name of the <organization> nor the
      names of its contributors may be used to endorse or promote products
      derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL <COPYRIGHT HOLDER> BE LIABLE FOR ANY
DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.