<div class="row">
	<div id="response">
		<h1><!--[$config->credits->response]--></h1>
		<p style="text-align: justify;"><!--[$config->credits->details]--></p>
		<img src="<!--[$base]-->/assets/img/<!--[$config->credits->image]-->" alt="<!--[$config->credits->imagetext]-->" />
	</div>
</div>
<div class="row">
	<div id="reason">
		<!--[include file="url.tpl"]-->
		<!--[$config->credits->reason]--><br />
		<a href="<!--[$config->credits->link]-->" class="contact" title="Contact <!--[$config->package]-->">Learn more about <!--[$config->package]--></a>
		<!--[include file="package.tpl"]-->
		<!--[include file="translate.tpl"]-->
	</div>
</div>