<script type="text/html" id="tmpl-oe-icons-item-field-preview-font"><i class="_icon {{data.type}} {{ data.icon }}"></i></script>

<script type="text/html" id="tmpl-oe-icons-item-field-preview-image"><img src="{{ data.url }}" class="_icon"></script>

<script type="text/html" id="tmpl-oe-icons-item-field-preview-svg"><img src="{{ data.url }}" class="_icon"></script>

<script type="text/html" id="tmpl-oe-icons-item-sidebar-preview-font-before">
	<a href="#">
		<i class="_icon {{ data.type }} {{ data.icon }} _{{ data.position }}"
			style="font-size:{{ data.font_size }}em; vertical-align:{{ data.vertical_align }};"
		></i>
		<span>{{ data.title }}</span>
	</a>
</script>

<script type="text/html" id="tmpl-oe-icons-item-sidebar-preview-font-after">
	<a href="#">
		<span>{{ data.title }}</span>
		<i class="_icon {{ data.type }} {{ data.icon }} _{{ data.position }}"
			style="font-size:{{ data.font_size }}em; vertical-align:{{ data.vertical_align }};"
		></i>
	</a>
</script>

<script type="text/html" id="tmpl-oe-icons-item-sidebar-preview-font-below">
	<a href="#">
		<span class="icon-wrap">
			<i class="_icon {{ data.type }} {{ data.icon }} _{{ data.position }}"
				style="font-size:{{ data.font_size }}em; vertical-align:{{ data.vertical_align }};"
			></i>
			<span class="menu-text">{{ data.title }}</span>
		</span>
	</a>
</script>

<script type="text/html" id="tmpl-oe-icons-item-sidebar-preview-font-hide_label">
	<a href="#">
		<i class="_icon {{ data.type }} {{ data.icon }} _{{ data.position }}"
			style="font-size:{{ data.font_size }}em; vertical-align:{{ data.vertical_align }};"
		></i>
	</a>
</script>

<script type="text/html" id="tmpl-oe-icons-item-sidebar-preview-image-before">
	<a href="#">
		<img src="{{ data.url }}"
			alt="{{ data.alt }}"
			class="_icon {{ data.type }} _{{ data.position }}"
			style="vertical-align:{{ data.vertical_align }};"
		/>
		<span>{{ data.title }}</span>
	</a>
</script>

<script type="text/html" id="tmpl-oe-icons-item-sidebar-preview-image-after">
	<a href="#">
		<span>{{ data.title }}</span>
		<img src="{{ data.url }}"
			alt="{{ data.alt }}"
			class="_icon {{ data.type }} _{{ data.position }}"
			style="vertical-align:{{ data.vertical_align }};"
		/>
	</a>
</script>

<script type="text/html" id="tmpl-oe-icons-item-sidebar-preview-image-below">
	<a href="#">
		<span class="icon-wrap">
			<img src="{{ data.url }}"
				alt="{{ data.alt }}"
				class="_icon {{ data.type }} _{{ data.position }}"
				style="vertical-align:{{ data.vertical_align }};"
			/>
			<span class="menu-text">{{ data.title }}</span>
		</span>
	</a>
</script>

<script type="text/html" id="tmpl-oe-icons-item-sidebar-preview-image-hide_label">
	<a href="#">
		<img src="{{ data.url }}"
			alt="{{ data.alt }}"
			class="_icon {{ data.type }} _{{ data.position }}"
			style="vertical-align:{{ data.vertical_align }};"
		/>
	</a>
</script>

<script type="text/html" id="tmpl-oe-icons-item-sidebar-preview-svg-before">
	<a href="#">
		<img src="{{ data.url }}"
			alt="{{ data.alt }}"
			class="_icon _{{data.type}} _{{ data.position }}"
			style="width:{{data.svg_width}}em;vertical-align:{{ data.vertical_align }}"
			/>
		<span>{{ data.title }}</span>
	</a>
</script>

<script type="text/html" id="tmpl-oe-icons-item-sidebar-preview-svg-after">
	<a href="#">
		<span>{{ data.title }}</span>
		<img src="{{ data.url }}"
			alt="{{ data.alt }}"
			class="_icon _{{data.type}} _{{ data.position }}"
			style="width:{{data.svg_width}}em;vertical-align:{{ data.vertical_align }}"
			/>
	</a>
</script>

<script type="text/html" id="tmpl-oe-icons-item-sidebar-preview-svg-below">
	<a href="#">
		<span class="icon-wrap">
			<img src="{{ data.url }}"
				alt="{{ data.alt }}"
				class="_icon _{{data.type}} _{{ data.position }}"
				style="width:{{data.svg_width}}em;vertical-align:{{ data.vertical_align }}"
				/>
			<span class="menu-text">{{ data.title }}</span>
		</span>
	</a>
</script>

<script type="text/html" id="tmpl-oe-icons-item-sidebar-preview-svg-hide_label">
	<a href="#">
		<img src="{{ data.url }}"
			alt="{{ data.alt }}"
			class="_icon _{{data.type}} _{{ data.position }}"
			style="width:{{data.svg_width}}em;vertical-align:{{ data.vertical_align }}"
			/>
	</a>
</script>

<script type="text/html" id="tmpl-oe-icons-settings-field-text"><span>{{ data.label }}</span>
	<input type="text" data-setting="{{ data.id }}" value="{{ data.value }}">
</script>

<script type="text/html" id="tmpl-oe-icons-settings-field-number">
	<span>{{ data.label }}</span>
	<input type="number" min="{{ data.attributes.min }}" step="{{ data.attributes.step }}" data-setting="{{ data.id }}" value="{{ data.value }}" />
	<# if ( data.description ) { #><em>{{ data.description }} </em><# } #>
</script>

<script type="text/html" id="tmpl-oe-icons-settings-field-select">
	<span>{{ data.label }}</span>
	<select data-setting="{{ data.id }}">
		<# _.each( data.choices, function( choice ) { #>
			<# if ( data.value === choice.value ) { #>
				<option selected="selected" value="{{ choice.value }}">{{ choice.label }}</option>
			<# } else { #>
				<option value="{{ choice.value }}">{{ choice.label }}</option>
			<# } #>
		<# } ); #>
	</select>
</script>



<br>
<font size="1"><table class="xdebug-error xe-uncaught-exception" dir="ltr" border="1" cellspacing="0" cellpadding="1">
<tr><th align="left" bgcolor="#f57900" colspan="5">
<span style="background-color: #cc0000; color: #fce94f; font-size: x-large;">( ! )</span> Fatal error: Uncaught Error: Call to undefined function do_action() in D:\wamp64\www\TestPage\wp-content\plugins\ocean-extra\includes\menu-icons\includes\media-template.php on line <i>164</i>
</th></tr>
<tr><th align="left" bgcolor="#f57900" colspan="5">
<span style="background-color: #cc0000; color: #fce94f; font-size: x-large;">( ! )</span> Error: Call to undefined function do_action() in D:\wamp64\www\TestPage\wp-content\plugins\ocean-extra\includes\menu-icons\includes\media-template.php on line <i>164</i>
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
<td bgcolor="#eeeeec" align="right">360040</td>
<td bgcolor="#eeeeec">{main}(  )</td>
<td title="D:\wamp64\www\TestPage\wp-content\plugins\ocean-extra\includes\menu-icons\includes\media-template.php" bgcolor="#eeeeec">...\media-template.php<b>:</b>0</td>
</tr>
</table></font>