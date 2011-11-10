		<div id="content">
			<div id="accounts">
					<?foreach ($qq as $row):?>	
					<li><a href="<?=$row->link ?>"><img src="./img/qq.png" width="40" height="40" alt="qq"><strong>QQ</strong><?=$row->account ?></a></li>
					<?endforeach;?>
					<?foreach ($fb as $row):?>						
					<li><a href="<?=$row->link ?>"><img src="./img/facebook.png" width="40" height="40" alt="qq"><strong>Facebook</strong><?=$row->account ?></a></li>
					<?endforeach;?>
					<?foreach ($gg as $row):?>						
					<li><a href="<?=$row->link ?>"><img src="./img/google+.png" width="40" height="40" alt="qq"><strong>Google+</strong><?=$row->account ?></a></li>
					<?endforeach;?>
					<?foreach ($twitter as $row):?>						
					<li><a href="<?=$row->link ?>"><img src="./img/twitter.png" width="40" height="40" alt="qq"><strong>Twitter</strong><?=$row->account ?></a></li>
					<?endforeach;?>
					<?foreach ($weibo as $row):?>						
					<li><a href="<?=$row->link ?>"><img src="./img/weibo.png" width="40" height="40" alt="qq"><strong>微博</strong><?=$row->account ?></a></li>
					<?endforeach;?>
					<?foreach ($douban as $row):?>						
					<li><a href="<?=$row->link ?>"><img src="./img/douban.png" width="40" height="40" alt="qq"><strong>豆瓣</strong><?=$row->account ?></a></li>
					<?endforeach;?>
					<?foreach ($txwb as $row):?>						
					<li><a href="<?=$row->link ?>"><img src="./img/txwb.png" width="40" height="40" alt="qq"><strong>腾讯微博</strong><?=$row->account ?></a></li>
					<?endforeach;?>
					<?foreach ($others as $row):?>						
					<li><a href="<?=$row->link ?>"><img src="./img/blog.png" width="40" height="40" alt="qq"><strong>个人博客</strong><?=$row->account ?></a></li>
					<?endforeach;?>
					<?foreach ($renren as $row):?>						
					<li><a href="<?=$row->link ?>"><img src="./img/renren.png" width="40" height="40" alt="qq"><strong>人人</strong><?=$row->account ?></a></li>
					<?endforeach;?>		
					<?foreach ($msn as $row):?>						
					<li><a href="<?=$row->link ?>"><img src="./img/msn.png" width="40" height="40" alt="qq"><strong>MSN</strong><?=$row->account ?></a></li>
					<?endforeach;?>							
				</ul>
			</div> 
			<div id="about">
				<ul>			
					<li>
						<p id="i">我...</p>
					 	<ul>
							<li>标准天蝎座宅男，昵称蝎紫</li>
							<li>记仇但是善良,不好惹~</li>
							<li>喜欢折腾计算机但是对硬件不怎么感冒</li>
							<li>非标准90后，不脑残不非主流</li>
						</ul>
					</li>	
				</ul>
			</div>
			<div id="links">
				<ul>
					<?foreach ($links as $row):?>
					<li class="node"><h2><a href="<?=$row->link ?>" ><img src="<?=base_url()?>img/link.png"><small><?=$row->ex ?></small><strong><?=$row->name ?></strong><?=$row->link ?></a></h2></li>				
					<?endforeach;?>		
				</ul>
			</div>			
			<div id="contact">
				<ul>
					<li id="personal">
						<h2><strong>个人简历</strong>请QQ或者邮箱联系我来获取</h2>						
						<ul>
							<li class="email"><a href="mailto:zsw.scorpio@gmail.com" rel="me">邮箱:zsw.scorpio@gmail.com</a></li>
							<li><img src="<?=base_url()?>img/touxiang.png"></li>
						</ul>
					</li>
					<li id="other">
						<h2><strong>学历</strong>Student of ZJUT</h2>
						<ul>
							<li>泽国二小</li>
							<li>温岭市实验学校</li>
							<li>温岭中心</li>
							<li>浙江工业大学</li>						
						</ul>
					</li>
				</ul>
			</div>
		</div>