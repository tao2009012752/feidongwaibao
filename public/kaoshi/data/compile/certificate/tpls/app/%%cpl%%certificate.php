<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main">
			<div class="col-xs-2" style="margin-top:10px;">
				<ul class="list-group">
					<li class="list-group-item">
						<a href="index.php?certificate-app">我的证书</a>
					</li>
					<li class="list-group-item active">
						申请证书
					</li>
				</ul>
			</div>
			<div class="col-xs-10">
				<div class="box itembox" style="margin-bottom:0px;">
					<div class="col-xs-12">
						<ol class="breadcrumb">
							<li><a href="index.php">首页</a></li>
							<li><a href="index.php?certificate">办理证书</a></li>
							<li class="active">申请证书</li>
						</ol>
					</div>
				</div>
				<?php $cid = 0;
 foreach($this->tpl_var['certificates']['data'] as $key => $certificate){ 
 $cid++; ?>
				<div class="box itembox" style="padding-top:20px;">
					<div class="col-xs-3">
						<a href="index.php?certificate-app-certificate-apply&ceid=<?php echo $certificate['ceid']; ?>" class="thumbnail pull-left">
							<img src="<?php echo $certificate['cethumb']; ?>" alt="" width="100%">
						</a>
					</div>
					<div class="col-xs-9">
						<a href="index.php?certificate-app-certificate-apply&ceid=<?php echo $certificate['ceid']; ?>"><h4 class="title"><?php echo $certificate['cetitle']; ?></h4></a>
						<p><?php echo $this->G->make('strings')->subString(strip_tags(html_entity_decode($this->ev->stripSlashes($certificate['cedescribe']))),240); ?></p>
						<hr/>
						<p>
							<span>
								<a class="btn btn-primary" href="index.php?certificate-app-certificate-apply&ceid=<?php echo $certificate['ceid']; ?>">申请 （<?php echo $certificate['ceprice']; ?>积分）</a>
							</span>
							<span class="pull-right">
								<a href="index.php?certificate-app-certificate-apply&ceid=<?php echo $certificate['ceid']; ?>"><span class="glyphicon glyphicon-time"></span> <span><?php echo date('Y-m-d H:i:s',$certificate['cetime']); ?></span></a>&nbsp;&nbsp;
							</span>
						</p>
					</div>
				</div>
				<?php } ?>
				<ul class="pagination pull-right">
					<?php echo $this->tpl_var['certificates']['pages']; ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>