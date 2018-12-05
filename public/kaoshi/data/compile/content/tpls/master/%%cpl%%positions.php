<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main">
			<div class="col-xs-2" style="padding-top:10px;margin-bottom:0px;">
				<?php $this->_compileInclude('menu'); ?>
			</div>
			<div class="col-xs-10" id="datacontent">
<?php } ?>
				<div class="box itembox" style="margin-bottom:0px;border-bottom:1px solid #CCCCCC;">
					<div class="col-xs-12">
						<ol class="breadcrumb">
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master"><?php echo $this->tpl_var['apps'][$this->tpl_var['_app']]['appname']; ?></a></li>
							<li class="active">推荐管理</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						推荐位
						<span class="pull-right">
							<a class="btn btn-primary" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-positions-add">添加推荐位</a>
						</span>
					</h4>
					<table class="table table-hover table-bordered">
						<thead>
							<tr class="info">
								<th width="80">ID</th>
								<th>推荐位名称</th>
								<th width="180">操作</th>
							</tr>
						</thead>
						<tbody>
							<?php $pid = 0;
 foreach($this->tpl_var['poses'] as $key => $pos){ 
 $pid++; ?>
							<tr>
								<td><?php echo $pos['posid']; ?></td>
								<td><span><?php echo $pos['posname']; ?></span></td>
								<td>
									<div class="btn-group">
										<a class="btn" href="index.php?content-master-positions-poscontent&posid=<?php echo $pos['posid']; ?><?php echo $this->tpl_var['u']; ?>"><em class="glyphicon glyphicon-list"></em></a>
										<a class="btn" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-positions-modify&posid=<?php echo $pos['posid']; ?><?php echo $this->tpl_var['u']; ?>"><em class="glyphicon glyphicon-edit"></em></a>
										<a class="btn confirm" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-positions-del&posid=<?php echo $pos['posid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>"><em class="glyphicon glyphicon-remove"></em></a>
									</div>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>
<?php } ?>