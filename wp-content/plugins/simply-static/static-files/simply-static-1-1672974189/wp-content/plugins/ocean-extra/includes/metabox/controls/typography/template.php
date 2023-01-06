<label>
	<div class="oceanwp-mb-desc">
		
			<span class="butterbean-label">{{ data.label }}</span>
		

		
			<span class="butterbean-description">{{{ data.description }}}</span>
		
	</div>

	<div class="oceanwp-mb-field">
		<ul>

			
				<li class="typography-font-family">

					
						<span class="label">{{ data.family.label }}</span>
					

					<select class="widefat butterbean-select" name="{{ data.family.name }}">

						
							<option value="{{ choice }}" if choice="==" data.family.value> selected="selected" >{{ label }}</option>
						

					</select>
				</li>
			

			
				<li class="typography-font-size">

					
						<span class="label">{{ data.size.label }}</span>
					

					<input type="text" name="{{ data.size.name }}" value="{{ data.size.value }}" placeholder="<br />
<font size='1'><table class='xdebug-error xe-uncaught-exception' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="><span style="background-color: #cc0000; color: #fce94f; font-size: x-large;">( ! )</span> Fatal error: Uncaught Error: Call to undefined function esc_html_e() in D:\wamp64\www\TestPage\wp-content\plugins\ocean-extra\includes\metabox\controls\typography\template.php on line <i>39</i>
<tr><th align="left" bgcolor="#f57900" colspan="5">
<span style="background-color: #cc0000; color: #fce94f; font-size: x-large;">( ! )</span> Error: Call to undefined function esc_html_e() in D:\wamp64\www\TestPage\wp-content\plugins\ocean-extra\includes\metabox\controls\typography\template.php on line <i>39</i>
</th></tr>
<tr><th align="left" bgcolor="#e9b96e" colspan="5">Call Stack</th></tr>
<tr>
<th align="center" bgcolor="#eeeeec">#</th>
<th align="left" bgcolor="#eeeeec">Time</th>
<th align="left" bgcolor="#eeeeec">Memory</th>
<th align="left" bgcolor="#eeeeec">Function</th>
<th align="left" bgcolor="#eeeeec">Location</th>
</tr>
<tr>
<td bgcolor="#eeeeec" align="center">1</td>
<td bgcolor="#eeeeec" align="center">0.0001</td>
<td bgcolor="#eeeeec" align="right">360072</td>
<td bgcolor="#eeeeec">{main}(  )</td>
<td title="D:\wamp64\www\TestPage\wp-content\plugins\ocean-extra\includes\metabox\controls\typography\template.php" bgcolor="#eeeeec">...\template.php<b>:</b>0</td>
</tr>

</li>
</ul>
</div></label>