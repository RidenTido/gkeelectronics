<?php
$title='Products'; require 'includes/header.php';
$q=trim($_GET['q']??''); $cat=(int)($_GET['category']??0);
$where=['p.active=1']; $args=[];
if($q!==''){ $where[]='(p.product_name LIKE ? OR p.description LIKE ? OR c.name LIKE ?)'; $args=array_fill(0,3,"%$q%");}
if($cat){$where[]='p.category_id=?';$args[]=$cat;}
$sql="SELECT p.*,c.name category FROM products p JOIN categories c ON c.id=p.category_id WHERE ".implode(' AND ',$where)." ORDER BY p.id DESC";
$st=$pdo->prepare($sql);$st->execute($args);$products=$st->fetchAll();$cats=$pdo->query("SELECT * FROM categories WHERE active=1 ORDER BY name")->fetchAll();
?>
<section class="page-head"><div class="container"><h1>Our Products</h1><p class="mb-0">Browse power backup, solar and lighting solutions.</p></div></section>
<div class="container py-5"><form class="row g-2 mb-4"><div class="col-md-6"><input name="q" class="form-control" placeholder="Search products..." value="<?=e($q)?>"></div><div class="col-md-4"><select name="category" class="form-select"><option value="0">All Categories</option><?php foreach($cats as $c):?><option value="<?=$c['id']?>" <?=$cat==$c['id']?'selected':''?>><?=e($c['name'])?></option><?php endforeach;?></select></div><div class="col-md-2"><button class="btn btn-primary w-100">Search</button></div></form><div class="row g-4"><?php if(!$products):?><div class="col-12"><div class="alert alert-info">No products found.</div></div><?php endif; ?><?php foreach($products as $p): include 'includes/product-card.php'; endforeach;?></div></div>
<?php require 'includes/footer.php'; ?>