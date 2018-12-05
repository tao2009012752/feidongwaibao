<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main">
			<div class="box itembox" style="margin-bottom:0px;">
				<div class="col-xs-12">
					<ol class="breadcrumb">
					  <li><a href="index.php">首页</a></li>
					  <li><a href="index.php?certificate">办理证书</a></li>
					  <li class="active"><?php echo $this->tpl_var['ce']['cetitle']; ?></li>
					</ol>
				</div>
			</div>
			<div class="box itembox" style="padding-top:20px;">
				<form class="form-horizontal" style="padding:20px;">
					<fieldset>
						<div class="col-xs-12">
							<h3 class="text-center"><?php echo $this->tpl_var['ce']['cetitle']; ?></h3>
							<hr/>
						</div>
						<div>
							<div class="col-xs-12">
								<table class="table table-bordered">
									<tr>
										<td width="25%">证书名称：</td>
										<td width="25%"><?php echo $this->tpl_var['ce']['cetitle']; ?></td>
										<td width="25%">申请费用：</td>
										<td width="25%"><?php echo $this->tpl_var['ce']['ceprice']; ?>积分</td>
									</tr>
									<tr>
										<td>需过考试：</td>
										<td><?php echo $this->tpl_var['basic']['basic']; ?></td>
										<td>加入时间：</td>
										<td><?php echo date('Y-m-d',$this->tpl_var['ce']['cetime']); ?></td>
									</tr>
									<tr>
										<td>身份证号：</td>
										<td><?php echo $this->tpl_var['_user']['userpassport']; ?></td>
										<td>姓名：</td>
										<td><?php echo $this->tpl_var['_user']['usertruename']; ?></td>
									</tr>
									<tr>
										<td>性别：</td>
										<td><?php echo $this->tpl_var['_user']['usergender']; ?></td>
										<td>文化程度：</td>
										<td><?php echo $this->tpl_var['_user']['userdegree']; ?></td>
									</tr>
									<tr>
										<td>地址：</td>
										<td><?php echo $this->tpl_var['_user']['useraddress']; ?></td>
										<td>联系电话：</td>
										<td><?php echo $this->tpl_var['_user']['userphone']; ?></td>
									</tr>
								</table>
								<div class="form-group">
									<div class="col-sm-12 text-center">
										<a class="btn btn-primary confirm" msg="申请证书将扣除余额<?php echo $this->tpl_var['ce']['ceprice']; ?>积分，确定支付吗？" href="index.php?certificate-app-certificate-apply&apply=1&ceid=<?php echo $this->tpl_var['ce']['ceid']; ?>">资料无误 申请证书</a>
										<a class="btn btn-danger" href="index.php?user-center-privatement">修改资料</a>
										<a class="btn btn-info" href="index.php?user-center-payfor">充值</a>
										<input type="hidden" name="modifyuserinfo" value="1"/>
										<input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
                                        <?php $aid = 0;
 foreach($this->tpl_var['search'] as $key => $arg){ 
 $aid++; ?>
										<input type="hidden" name="search[<?php echo $key; ?>]" value="<?php echo $arg; ?>"/>
                                        <?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12" id="content">
							<?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['ce']['cedescribe'])); ?>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>