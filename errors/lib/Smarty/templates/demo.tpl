<div class="row">
	<div id="response">
		<h3 class="status_code"><!--[$config->package]--> Demo</h3>
		<div style="text-align: justify;">
		<!--[foreach from=$config->codes key=k item=v]-->
			<!--[if $k >=300 && $k <= 400]-->
				<p></p><a href="<!--[$base]-->/<!--[$k]-->/google.com" title="<!--[$v->response]-->"><!--[$k|string_format:'%03d']--> - <!--[$v->response]--></a></p>
			<!--[else]-->
				<p></p><a href="<!--[$base]-->/<!--[$k]-->" title="<!--[$v->response]-->"><!--[$k|string_format:'%03d']--> - <!--[$v->response]--></a></p>
			<!--[/if]-->
		<!--[/foreach]-->
		</div>
	</div>
</div>
</div>
<div class="row">
	<div id="reason">
		<a href="<!--[$config->routes->form]-->" class="contact" title="Contact Us">please contact us.</a>
		<!--[include file="package.tpl"]-->
		<!--[include file="translate.tpl"]-->
	</div>
</div>
