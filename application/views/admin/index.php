		<div id="main">
			<!-- header -->
			<div id="header">
				<ul class="menu right">
					<li><a id="link1" href="#page1" class="active"><span><span>Edit</span></span></a></li>
					<li><a id="link2" href="#page2"><span><span>Manager</span></span></a></li>
					<li><a id="link3" href="#page3"><span><span>Personal</span></span></a></li>
					<li><a id="link4" href="#page4"><span><span>Contacts</span></span></a></li>
					<li><a id="link5" href="#page5"><span><span>Infomation</span></span></a></li>
					<li><?=anchor("admin/logout/", "<span><span>Logout</span></span>") ?></li>
				</ul>
				<a href="index.html"><img src="./img/logo_1.png" alt="" /></a>
			</div>
			<div class="carousel">
				<div class="holder">
					<div class="scroll-pane" id="pane5">
						<ul class="blocks">
							<li class="scroll-interval" id="page1">
								<div class="txt_area">
									<div class="content">
									<div class="wrapper">
										<div class="col1">
											<h1>Profile</h1>
											<div id="ContactForm">
											<p class="last">
												<?=form_open('admin/edit_info') ?>
												<? foreach ($info as $row):?>
												昵称:<?=form_input('name',$row->name)?>
												介绍:<?=form_input('describe',$row->describe) ?>
												<?endforeach;?>
												<?=form_submit('submit', '修改') ?>									
											</p>
											</div>
										</div>
										<div class="col2">
											<h1>Binds</h1>
											<p>
												<?php
													echo '<img src="./img/qq.png" width="40" height="40" alt="qq"></br>';
													if($qq_exit){
														echo '已与您的QQ帐号<span>'.$qq_exit[0]->account.'</span>绑定'.'</br>';
													}else{
														echo anchor($qq, '绑定QQ').'</br>';
													}
												?>
											</p>
											<p>
												<?php 
													echo '<img src="./img/facebook.png" width="40" height="40" alt="fb"></br>';
													if($fb_exit){
														echo '已与您的facebook帐号<span>'.$fb_exit[0]->account.'</span>绑定'.'</br>';
													}else{
														echo anchor('admin/add_fb', '绑定Facebook').'</br>';
													}?>	
											</p>
											<p>		
												<?php echo '<img src="./img/google+.png" width="40" height="40" alt="qq"></br>';
													if($gg_exit){
														echo '已与您的google+帐号<span>'.$gg_exit[0]->account.'</span>绑定'.'</br>';
													}else{
														echo anchor('admin/add_gg', '绑定Google+').'</br>';
													}	
												?>	
											</p>														
										</div>
										<div class="col3">
											<h1>binds</h1>
											<p>
											<?php 
												echo '<img src="./img/twitter.png" width="40" height="40" alt="qq"></br>';
												if($twitter_exit){
													echo '已与您的twitter帐号<span>'.$twitter_exit[0]->account.'</span>绑定'.'</br>';
												}else{
													echo anchor(base_url().'index.php/index/twitter', '绑定Twitter').'</br>';
												}
											?>
											</p>
											<p>
											<?php 											
												echo '<img src="./img/weibo.png" width="40" height="40" alt="qq"></br>';
												if($weibo_exit){
													echo '已与您的微博帐号<span>'.$weibo_exit[0]->account.'</span>绑定'.'</br>';
												}else{
													echo anchor($weibo, '绑定微博').'</br>';
												}	
											?>
											</p>
											<p>
											<?php 											
												echo '<img src="./img/msn.png" width="40" height="40" alt="qq"></br>';
												if($msn_exit){
													echo '已与您的MSN帐号<span>'.$msn_exit[0]->account.'</span>绑定'.'</br>';
												}else{
													echo anchor($msn, '绑定MSN').'</br>';
												}	
											?>
											</p>
											
											</p>	
										</div>
										<div class="col4">
											<h1>Binds</h1>
											<p>
											<?php 												
												echo '<img src="./img/renren.png" width="40" height="40" alt="qq"></br>';
												if($renren_exit){
													echo '已与您的人人帐号<span>'.$renren_exit[0]->account.'</span>绑定'.'</br>';
												}else{
													echo anchor($renren, '绑定人人').'</br>';
												}														
											?>
											</p>			
											<p>
											<?php 						
												echo '<img src="./img/douban.png" width="40" height="40" alt="qq"></br>';
												if($douban_exit){
													echo '已与您的豆瓣帐号<span>'.$douban_exit[0]->account.'</span>绑定'.'</br>';
												}else{
													echo anchor(base_url().'douban/request_token.php', '绑定豆瓣').'</br>';
												}												?>
											</p>
											<p>
											<?php 						
												echo '<img src="./img/txwb.png" width="40" height="40" alt="qq"></br>';
												if($txwb_exit){
													echo '已与您的腾讯微博帐号<span>'.$txwb_exit[0]->account.'</span>绑定'.'</br>';
												}else{
													echo anchor(base_url().'index.php/txwb/index?go_oauth', '绑定腾讯微博').'</br>';
												}												
											?>
											</p>
										</div>
									</div>
									</div>
								</div>					
							</li>
						  <li class="scroll-interval" id="page2">
							<div class="txt_area">
							<div class="content">
								<div class="wrapper">									
									<div class="col1">
										<div class="wrapper">
										<img src="./img/logo.png" alt="" class="imgindent"/>	
										<h1>Edit</h1>
										<div id="ContactForm">
										<p>	
											资料是从你绑定的账户里面直接读取的，一般不用修改。</br>
											<?=form_open('admin/update') ?>
											请选择账户：<select name="account_id">
														<? foreach ($account as $row):?>
															<option value="<?=$row->account_id ?>"><?=$row->name.'-'.$row->account ?></option>
														<?endforeach;?>
														</select></br>
											昵称:<?=form_input('account') ?></br>
											链接:<?=form_input('link') ?></br>
											<?=form_submit('submit', '修改') ?>
											<?=form_close() ?>
										</p>
										</div>
										</div>
									</div>
									<div class="col2">
										<h1>add</h1>
										<div id="ContactForm">
										<p>
											<?=form_open('admin/add_account') ?>
											昵称:<?=form_input('account') ?></br>
											链接:<?=form_input('link') ?></br>
											<?=form_submit('submit', '增加') ?>
											<?=form_close() ?>
										</p>
										</div>
									</div>
								</div>
							</div>
							</div>
							</li>
						  <li class="scroll-interval" id="page3">
							<div class="txt_area">
							<div class="content">
								<div class="wrapper">
									<div class="col1">
										<h1>Link</h1>
										<div id="ContactForm">
										<p>
											<?=form_open('admin/add_links') ?>
											logo:<?=form_input('logo') ?></br>
											昵称:<?=form_input('name') ?></br>
											解释:<?=form_input('ex') ?></br>
											链接:<?=form_input('link') ?></br>
											<?=form_submit('submit', '增加') ?>
											<?=form_close() ?>
										</p>
										</div>
									</div>
									<div class="col2">
										<h1>products list</h1>
									</div>									
									<div class="col3">
										<h1>products overview</h1>
										<p></p>
									</div>
								</div>
							</div>
							</div>
							</li>
						  <li class="scroll-interval" id="page4">
							<div class="txt_area">
							<div class="content">
								<div class="wrapper">
									<div class="col1">
										<h1>Socail Connect</h1>
										<a href="http://wpa.qq.com/msgrd?v=3&uin=C18008116E2AE123E5B004906738E3F7&site=qq&menu=yes" class="btn"><span><span>QQ</span></span></a>
										<a href="https://twitter.com/Chouscorpio" class="btn"><span><span>Twitter</span></span></a>
										<a href="http://www.renren.com/profile.do?id=281135527" class="btn"><span><span>人人</span></span></a>
										<a href="https://www.facebook.com/chouscorpio" class="btn"><span><span>Facebook</span></span></a>
										<a href="http://weibo.com/zswscorpio" class="btn"><span><span>微博</span></span></a>
										<a href="http://www.douban.com/people/zswscorpio/" class="btn"><span><span>豆瓣</span></span></a>
										<a href="https://plus.google.com/104304137380888729289/posts" class="btn"><span><span>Google+</span></span></a>
										<a href="http://profile.live.com/cid-16767ea0c0390121/" class="btn"><span><span>Msn</span></span></a>
										<a href="http://t.qq.com/patapong" class="btn"><span><span>腾讯微博</span></span></a>
										<a href="http://www.zscorpio.com" class="btn"><span><span>个人博客</span></span></a>
									</div>
									<div class="col2">
										<h1>contact info</h1>
										<p></p>
									</div>									
									<div class="colspan">
										<h1>contact form</h1>
										<form id="ContactForm" action="" enctype="multipart/form-data">
											<div class="wrapper">
												<div class="col3">
												<label>
													Enter Your Name:<br/>
													<input type="text" value="" id="name"/>
												</label>
												<label>
													Enter Your Email:<br/>
													<input type="text" value="" id="email"/>
												</label>
												<label>
													Enter Your Fax:<br/>
													<input type="text" value="" id="fax"/>
												</label>
													
												</div>
												<div class="col4">
													Enter Your Message:<br/>
													<textarea id="message" cols="25" rows="7"></textarea>
												</div>				
												<p class="fright">
													<a onclick="document.getElementById('ContactForm').reset()" class="btn"><span><span>Reset</span></span></a>									
													<a onclick="document.getElementById('ContactForm').submit()" href="#" class="btn"><span><span>Submit</span></span></a>
												</p>
											</div>						
										</form>									
										
									</div>
								</div>
							</div>
							</div>
							</li>			
						  <li class="scroll-interval" id="page5">
							<div class="txt_area">
							<div class="content">
										<h1></h1>
										<p>这单纯只是为了玩玩做的一个名片展示...好吧，我承认前后台风格不怎么符合</p>
<p>E-mail: <a href="#">zsw.scorpio@gmail.com</a></p>
							</div>
							</div>
							</li>								
						</ul>
					</div>
				</div>
		  </div>
		  <div class="push"></div>
	    </div>