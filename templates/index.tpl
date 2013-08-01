{include file="$StyleLoc/header.tpl"}
  		{section name=cat loop=$Categories}
			<td class="sections">
						<table class="news">
							<tr>
								<td width="400px" class="header">
									{$Categories[cat].cat_name}
								</td>
								<td width="50px" class="header">
									threads
								</td>
								<td width="50px" class="header">
									posts
								</td>
								<td width="223px" class="header">
									last post
								</td>
							</tr>
{section name=forum loop=$Forums[cat]}
							<tr>
								<td class="news">
									&raquo; <a class="links" href="forum.php?fid={$Forums[cat][forum].forum_id}">{$Forums[cat][forum].forum_name}</a><br />
								<span class="description">{$Forums[cat][forum].forum_desc}</span>
								
								</td>
								<td class="comments">
									{$news[cat][news].num_threads}
								</td>
								<td class="threads">
									<span class="forumdata">{$Forums[cat][forum].num_posts}
								</td>
								<td class="lastpost">
							{if $Forums[cat][forum].lastpost_id == "0"}
								no posts availible
							{else}
									{$news[cat][news.lastpost_date}<br />
									<a class="links" href="thread.php?tid={$news[cat][news].lastpost_threadid}#post{$news[cat][news].lastpost_id}">{$Forums[cat][forum].lastpost_threadname}</a> posted by <a class="links" href="profile.php?uid={$Forums[cat][forum].lastpost_userid}">{$Forums[cat][forum].lastpost_username}</a>
							{/if}	
							</td>
							
							</tr>
{/section}								
						</table>
			</td>
			{sectionelse}
			<td class="sections" align="center">
		No Forums Available.{if $Userdata.user_is_admin}<br /><br />As an Administrator, you may create forums in the <a href="admin/index.php">Administration Control Panel</a>.{/if}
			{/section}
			</td>
{include file="$StyleLoc/footer.tpl"}
