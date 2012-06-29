<!-- BEGIN: MAIN -->
<div class="col3-2 first">
	<div class="block">
		<h2 class="plugin">{PHP.L.testing_title}</h2>
		<!-- BEGIN: TESTING_INTRO -->
		<p class="paddingbottom10">{PHP.L.testing_intro}</p>
		<p class="paddingbottom10">{PHP.L.testing_intro_part2}</p>
		<p class="paddingbottom10">{PHP.L.testing_intro_part3}</p>
		<p class="paddingbottom10">{PHP.L.testing_intro_sample}:</p>
		<div style="line-height:1em;font-size:10pt">
			{TESTING_INTRO_EXAMPLE}
		</div>
		<!-- END: TESTING_INTRO -->

		<!-- BEGIN: TESTING_NOTESTS -->
		<div class="error">
			{PHP.L.testing_notfound}
		</div>
		<!-- END: TESTING_NOTESTS -->

		<!-- BEGIN: TESTING_RUN -->
		<h3>{PHP.L.testing_log}</h3>
		<table class="cells">
			<tr>
				<td class="coltop">{PHP.L.testing_filefunc}</td>
				<td class="coltop">{PHP.L.Status}</td>
			</tr>
			<!-- BEGIN: TESTING_RUN_FILE -->
			<tr class="odd">
				<td><strong>{TESTING_RUN_FILE_PATH}</strong></td>
				<td>
					<strong style="color:<!-- IF {TESTING_RUN_FILE_PASS} -->green<!-- ELSE -->red<!-- ENDIF -->">
						{TESTING_RUN_FILE_STATUS}
					</strong>
				</td>
			</tr>
				<!-- BEGIN: TESTING_RUN_FILE_FUNC -->
				<tr class="even">
					<td>{TESTING_RUN_FILE_FUNC_NAME}()</td>
					<td>
						<span  style="color:<!-- IF {TESTING_RUN_FILE_FUNC_PASS} -->green<!-- ELSE -->red<!-- ENDIF -->">
							{TESTING_RUN_FILE_FUNC_STATUS}
						</span>
					</td>
				</tr>
				<!-- IF {TESTING_RUN_FILE_FUNC_MESSAGE} -->
				<tr class="even">
					<td colspan="2">
						<div class="error">
							{TESTING_RUN_FILE_FUNC_MESSAGE}
						</div>
					</td>
				</tr>
				<!-- ENDIF -->
				<!-- END: TESTING_RUN_FILE_FUNC -->
			<!-- END: TESTING_RUN_FILE -->
		</table>

		<!-- IF {PHP.cot_error} -->
		<h3>{PHP.L.Messages}</h3>
		{FILE "{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/warnings.tpl"}
		<!-- ENDIF -->

		<hr />
		<p>
			{TESTING_RUN_COUNT} {PHP.L.testing_tests_run_in} {TESTING_RUN_SECONDS} {PHP.L.testing_seconds}
		</p>
		<!-- END: TESTING_RUN -->
	</div>
</div>

<div class="col3-1">
	<div class="block">
		<h2 class="admin">{PHP.L.testing_modes}</h2>
		<ul class="bullets">
			<li><a href="{TESTING_FULL_URL}" title="{PHP.L.testing_full_hint}">{PHP.L.testing_full}</a></li>
			<li><a href="{TESTING_SYSTEM_URL}" title="{PHP.L.testing_system_hint}">{PHP.L.testing_system}</a></li>
			<li>
				<h4>{PHP.L.Extensions}:</h4>
				<ul class="bullets">
					<!-- BEGIN: TESTING_EXT -->
					<li><a href="{TESTING_EXT_URL}">{TESTING_EXT_NAME}</a></li>
					<!-- END: TESTING_EXT -->
				</ul>
			</li>
		</ul>
	</div>
</div>
<!-- END: MAIN -->